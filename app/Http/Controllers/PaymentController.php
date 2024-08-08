<?php

namespace App\Http\Controllers;

use App\Models\Contribution;
use App\Models\Log;
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
        dd($request);

        if (Auth::user()->contributions->contains($request->contribution_id)) {
            $transaction = Transaction::create(['user_id' => Auth::id()]);
            $metadata = json_decode($request->metadata, true);
            if (is_array($metadata)) {
                $metadata['contribution_id'] = $request->contribution_id;
                $metadata['trans_id'] = $transaction->id;
            } else {
                $metadata = ['contribution_id' => $request->contribution_id];
                $metadata = ['trans_id' => $transaction->id];
            }
            //remember to add the 0's to the amount to covert to naira from kobo
            $updatedMetadata = json_encode($metadata);
            $request->merge(['metadata' => $updatedMetadata]);
        } else {
            return redirect()->back()->with('error', 'You are not eligible to make this contribution');
        }
        try {
            return Paystack::getAuthorizationUrl()->redirectNow();
        } catch (\Exception $e) {
            //All these are in return URL,check status codes to update transaction accordingly
            
            $transaction->update(['status' => '2']);

            PaySchedule::create([
                'user_id' => Auth::id(),
                'contribution_id' => $request->contribution_id,
                'amount' => $request->amount,
                'paid_on' => Carbon::today(),
            ]);

            Log::create([
                'user_id' => Auth::id(),
                'contribution_id' => $request->contribution_id,
                'event' => Auth::user()->name . " made a payment of ₦ " . number_format($request->amount)
            ]);

            return back()->withError('The paystack token has expired. Please refresh the page and try again.');
        }
    }

    public function receipt(string $id)
    {
        $data = [
            'payments' => PaySchedule::find($id)
        ];
        return view('backend.contribution.receipt', $data);
    }
}
