<?php

namespace App\Http\Controllers;

use App\Models\Contribution;
use App\Models\User;
use App\Models\PaySchedule;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
        $startOfWeek = Carbon::now()->startOfWeek(); // Assuming the week starts on Monday

        for ($i = 0; $i < 30; $i++) {
            $date = $startOfWeek->copy()->addDays($i);
            $day = $date->day;
            $month = $date->format('F');

            if ($day % 10 == 1 && $day != 11) {
                $suffix = 'st';
            } elseif ($day % 10 == 2 && $day != 12) {
                $suffix = 'nd';
            } elseif ($day % 10 == 3 && $day != 13) {
                $suffix = 'rd';
            } else {
                $suffix = 'th';
            }

            $dates[] = "{$day}<sup>{$suffix}</sup> {$month}";
        }
        $contribution=Contribution::find($id);
        $data = [
            'contribution' => $contribution,
            'dates'=>$dates,
            'users'=>User::all(),
            'sum'=>$contribution->pay_schedules->sum('amount')
        ];
        return view('backend.contribution.show', $data);
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
        $contribution=Contribution::find($data['contribution_id']);
        try {
            if($contribution->contribution_type =='one-time'){
                $pay=PaySchedule::where('user_id',$data['user_id'])->where('contribution_id',$data['contribution_id'])->first();
                $pay->update([
                    'amount' => $data['amount']+$pay->amount,
                    'paid_on' => $data['paid-on'],
                ]);
            }else{
              
            }
            return true;
        } catch (\Throwable $th) {
            //throw $th;
            return false;
        }
        
    }

    
}
