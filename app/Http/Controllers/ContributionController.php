<?php

namespace App\Http\Controllers;

use App\Models\Contribution;
use App\Models\Log;
use App\Models\User;
use App\Models\PaySchedule;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ContributionController extends Controller
{
    //
    private function generateRandomCode($length = 12)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomPassword = '';

        for ($i = 0; $i < $length; $i++) {
            $randomPassword .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomPassword;
    }

    private function the_sum($contribution){
        if ($contribution->contribution_type == 'recurring') {
            $cont = Contribution::with(['schedules.users' => function ($query) {
                $query->where('user_schedules.status', 1);
            }])->findOrFail($contribution->id);

            $sum = $cont->schedules->flatMap(function ($schedule) {
                return $schedule->users->map(function ($user) use ($schedule) {
                    return $schedule->amount; // Return amount for each schedule where status is paid
                });
            })->sum();

        } else {
            $sum = $contribution->pay_schedules->sum('amount');
        }
        return $sum;
    }

    public function index()
    {
        $data = [
            'contributions' => Contribution::all()
        ];
        return view('backend.contribution.index', $data);
    }

    public function create()
    {
        return view('backend.contribution.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'contribution_type' => 'required',
            'starts' => 'required',
            'ends' => 'required|date|after_or_equal:starts',
        ]);
        $invite = $this->generateRandomCode();
        $request->merge(['contribution_address' => $invite]);
        $contribution = Contribution::create($request->all());

        $startDate = Carbon::parse($request->starts);
        $endDate = Carbon::parse($request->ends);
        $frequency = $request->frequency;
        $schedules = [];
        $currentDate = $startDate;


        if ($request->contribution_type == 'recurring') {
            while ($currentDate->lte($endDate)) {
                $schedules[] = [
                    'contribution_id' => $contribution->id,
                    'paid_on' => $currentDate->toDateString(),
                    'amount' => $request->amount,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                switch ($frequency) {
                    case 'daily':
                        $currentDate->addDay();
                        break;
                    case 'weekly':
                        $currentDate->addWeek();
                        break;
                    case 'monthly':
                        $currentDate->addMonth();
                        break;
                    case 'quarterly':
                        $currentDate->addMonths(3);
                        break;
                    case 'annually':
                        $currentDate->addYear();
                        break;
                }
            }
            Schedule::insert($schedules);
        }
        return redirect(route('contribution.index'))->with('success', 'Project/Contribution created successfully');
    }

    public function show(string $id)
    {
        $contribution = Contribution::with('users', 'pay_schedules')->findOrFail($id);
        $logs = Log::where('contribution_id', $contribution->id)->orderBy('created_at', 'desc')->get();

        $sum=$this->the_sum($contribution);
        
        $data = [
            'contribution' => $contribution,
            'users' => User::with('schedules', 'invitations')->get(),
            'sum' => $sum,
            'logs' => $logs
        ];

        return view('backend.contribution.show', $data);
    }



    public function repayments(string $id)
    {
        $contribution = Contribution::with('users', 'pay_schedules')->findOrFail($id);

        $dates = [];
        $raw_dates = [];
        $startOfWeek = Carbon::now()->startOfWeek();
        if ($contribution->contribution_type == 'recurring') {
            $dates = $contribution->schedules->pluck('paid_on')->unique()->sort();
            $raw_dates = $dates->map(function ($date) {
                return Carbon::parse($date);
            });
        } else {
            for ($i = 0; $i < 7; $i++) {
                $date = $startOfWeek->copy()->addDays($i);
                $day = $date->day;
                $month = $date->format('F');
                $suffix = $this->getDaySuffix($day);

                $dates[] = "{$day}<sup>{$suffix}</sup> {$month}";
                $raw_dates[] = $date;
            }
        }

        $sum=$this->the_sum($contribution);
        // $logs = Log::where('contribution_id', $contribution->id)->orderBy('created_at', 'desc')->get();
        $data = [
            'contribution' => $contribution,
            'dates' => $dates,
            'raw_dates' => $raw_dates,
            'users' => User::with('schedules', 'invitations')->get(),
            'sum' => $sum,
        ];

        return view('backend.contribution.repayments', $data);
    }


    private function getDaySuffix($day)
    {
        if (!in_array(($day % 100), [11, 12, 13])) {
            switch ($day % 10) {
                case 1:
                    return 'st';
                case 2:
                    return 'nd';
                case 3:
                    return 'rd';
            }
        }
        return 'th';
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'contribution_type' => 'required',
            'starts' => 'required',
            'ends' => 'required',
        ]);
        $cont = Contribution::find($id);
        $cont->update($request->all());
        return redirect()->back()->with('success', 'Project/Contribution details updated successfully');
    }

    public function update_pay(Request $request)
    {
        $reply = $this->update_payments($request->all());
        if ($reply == true) {
            return redirect()->back()->with('success', 'Payment updated successfully');
        } else {
            return redirect()->back()->with('error', 'Payment Update Error');
        }
    }

    private function update_payments($data)
    {
        PaySchedule::create([
            'user_id' => $data['user_id'],
            'contribution_id' => $data['contribution_id'],
            'amount' => $data['amount'],
            'paid_on' => $data['paid-on'],
        ]);
        $user = User::find($data['user_id']);
        Log::create([
            'user_id' => Auth::id(),
            'contribution_id' => $data['contribution_id'],
            'event' => $user->name . "'s payment of ₦ " . number_format($data['amount']) . " was confirmed by " . Auth::user()->name
        ]);

        return true;
    }

    public function settings(string $id)
    {
        $data = [
            'contribution' => Contribution::find($id)
        ];
        return view('backend.contribution.settings', $data);
    }
}
