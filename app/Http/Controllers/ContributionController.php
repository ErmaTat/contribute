<?php

namespace App\Http\Controllers;

use App\Models\Contribution;
use App\Models\Log;
use App\Models\User;
use App\Models\PaySchedule;
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
        // dd('request');
        $data = $request->validate([
            'name' => 'required',
            'contribution_type' => 'required',
            'starts' => 'required',
            'ends' => 'required',
        ]);
        $invite = $this->generateRandomCode();
        $request->merge(['contribution_address' => $invite]);
        Contribution::create($request->all());
        return redirect(route('contribution.index'))->with('success', 'Project/Contribution created successfully');
    }

    public function show(string $id)
    {
        $dates = [];
        $raw_dates = [];
        $startOfWeek = Carbon::now()->startOfWeek();
    
        for ($i = 0; $i < 7; $i++) {
            $date = $startOfWeek->copy()->addDays($i);
            $day = $date->day;
            $month = $date->format('F');
            $suffix = $this->getDaySuffix($day);
    
            $dates[] = "{$day}<sup>{$suffix}</sup> {$month}";
            $raw_dates[] = $date->format('Y-m-d');
        }
    
        $contribution = Contribution::with('users', 'pay_schedules')->findOrFail($id);
        $user = Auth::user();
        $logs = Log::where('contribution_id', $contribution->id)->orderBy('created_at', 'desc')->get();
    
        $data = [
            'contribution' => $contribution,
            'dates' => $dates,
            'raw_dates' => $raw_dates,
            'users' => User::all(),
            'sum' => $contribution->pay_schedules->sum('amount'),
            'logs' => $logs
        ];
    
        return view('backend.contribution.show', $data);
    }
    
    
    private function getDaySuffix($day)
    {
        if ($day % 10 == 1 && $day != 11) {
            return 'st';
        } elseif ($day % 10 == 2 && $day != 12) {
            return 'nd';
        } elseif ($day % 10 == 3 && $day != 13) {
            return 'rd';
        } else {
            return 'th';
        }
    }
    

    public function update(Request $request,string $id)
    {
        $request->validate([
            'name' => 'required',
            'contribution_type' => 'required',
            'starts' => 'required',
            'ends' => 'required',
        ]);
        $cont=Contribution::find($id);
        $cont->update($request->all());
        return redirect()->back()->with('success', 'Project/Contribution details updated successfully');
    }

    public function update_pay(Request $request)
    {
       $reply=$this->update_payments($request->all());
       if($reply==true){
        return redirect()->back()->with('success','Payment updated successfully');
       }else{
        return redirect()->back()->with('error','Payment Update Error');
       }
    }

    private function update_payments($data)
    {   
        PaySchedule::create([
            'user_id'=>$data['user_id'],
            'contribution_id'=>$data['contribution_id'],
            'amount'=>$data['amount'],
            'paid_on' => $data['paid-on'],
        ]);
        $user=User::find($data['user_id']);
        Log::create([
            'user_id'=>Auth::id(),
            'contribution_id'=>$data['contribution_id'],
            'event'=> $user->name."'s payment of ₦ ".number_format($data['amount'])." was confirmed by ".Auth::user()->name
        ]);

        return true;
        
    }

    
}
