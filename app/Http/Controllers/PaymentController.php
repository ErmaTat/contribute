<?php

namespace App\Http\Controllers;

use App\Models\Contribution;
use App\Models\PaySchedule;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Unicodeveloper\Paystack\Facades\Paystack;

class PaymentController extends Controller
{
    //

    public function paymentGateway(Request $request)
    {
        $transaction = Transaction::create(['user_id'=>Auth::id()]);
        $metadata = json_decode($request->metadata, true);
        if (is_array($metadata)) {
            $metadata['contribution_id'] = $request->contribution_id;
            $metadata['trans_id'] = $transaction->id;
        } else {
            $metadata = ['contribution_id' => $request->contribution_id];
            $metadata = ['trans_id' => $transaction->id];
        }
        $updatedMetadata = json_encode($metadata);
        $request->merge(['metadata' => $updatedMetadata]);
        try {
            return Paystack::getAuthorizationUrl()->redirectNow();
        } catch (\Exception $e) {
            //All these are in return URL
            $transaction->update(['status'=>'2']);
            PaySchedule::create([
                'user_id'=>Auth::id(),
                'contribution_id'=>$request->contribution_id,
                'amount'=>$request->amount,
                'paid_on' => Carbon::today(),
            ]);

            return back()->withError('The paystack token has expired. Please refresh the page and try again.');
        }
    }
}
