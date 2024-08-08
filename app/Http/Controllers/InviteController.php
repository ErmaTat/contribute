<?php

namespace App\Http\Controllers;

use App\Models\{Invite,Schedule,Contribution,User};
use Illuminate\Http\Request;

class InviteController extends Controller
{
    //

    public function invite(Request $request){
        $request->validate([
            'user_id' => 'required',
            'contribution_id' => 'required',
        ], [
            'user_id.required' => 'field_error',
            'contribution_id.required' => 'field_error',
        ]);
        
        try {
            $invite = Invite::create($request->all());
            return response()->json([
                'success' => true,
                'message' => 'Invite created successfully!',
                'data' => $invite
            ], 201); 
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create invite.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function decision($decision, $invite){
        $invite=Invite::find($invite);
        if($decision=='accept'){
            $invite->status=1;
            $contribution = Contribution::find($invite->contribution_id);
            $schedules = Schedule::where('contribution_id', $contribution->id)->get();
            $user = User::find($invite->user_id);
            $user->contributions()->syncWithoutDetaching([$contribution->id]);
            if($contribution->contribution_type=='recurring'){
                foreach ($schedules as $schedule) {
                    if (!$user->schedules()->where('schedule_id', $schedule->id)->exists()) {
                        $user->schedules()->attach($schedule->id);
                    }
                }
            }else{
                $contribution->payments()->syncWithoutDetaching([$invite->user_id]);
            }
            $reply="Invitation accepted!";
        }else{
            $invite->status=2;
            $reply="Invitation declined!";
        }
        $invite->save();
        return redirect()->back()->with('success',$reply);
    }
}
