<?php

namespace App\Http\Controllers;

use Auth;
use Paystack;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{

    public function redirect_to_gateway(Request $request)
    {
        $user = Auth::user();
        $this->validate($request, [
            'reference' => 'string',
        ]);
        $data['plan_id'] =  $request->plan_id;
        $data['user_id'] =  $user->id;
        $data['reference'] =  $request->reference;
        $initiate_subscription = Subscription::create($data);
        if ($initiate_subscription) {
            return Paystack::getAuthorizationUrl()->redirectNow();
        }
    }

    public function handle_gateway_callback()
    {
        $user = Auth::user();
        $subscriptionResponse = Paystack::getPaymentData();
        if ($subscriptionResponse['data']['status'] == "true") {

            return $subscriptionResponse;
            // $user = Subscription::findOrFail($user_id)
            //     ->where([
            //         'email' => $paymentDetails['data']['customer']['email'],
            //         'id' => $user_id
            //     ])
            //     ->update(['transaction' => 'PAID']);
            // if ($studentDetails) {
            //     return redirect()->route('games');
            // } else {
            //     return 'Please contact the administrator! Please dont attempt paying again if your bank has charged';
            // }
        }
    }


    public function handleWebHook(Request $request)
    {
        $data = json_encode($request->all());
        $event = json_decode($data, true);
        if ($event['event'] === "charge.success") {
            $reference  = $event['data']['reference'];
            $updateSubscriber =  Subscription::where(['reference' => $reference])->update([
                'authorization_code' => $event['data']['authorization']['authorization_code'],
                'signature' => $event['data']['authorization']['signature'],
                'customer_code' => $event['data']['customer']['customer_code'],
                'createdAt' => date("Y-m-d H:i:s", strtotime($event['data']['created_at'])),
                'paidAt' => date("Y-m-d H:i:s", strtotime($event['data']['paidAt'])),
                'transaction' => 'PAID',
                'status' => 1
            ]);
            if ($updateSubscriber) {
                return response()->json(200);
            }
        } elseif ($event['event'] === "subscription.create") {
            $reference  = $event['data']['reference'];
            $updateSubscriber =  Subscription::where(['reference' => $reference])->update([
                'authorization_code' => $event['data']['authorization']['authorization_code'],
                'signature' => $event['data']['authorization']['signature'],
                'customer_code' => $event['data']['customer']['customer_code'],
                'next_payment_date' => $event['data']['next_payment_date'],
                'subscriptionCode' => $event['data']['subscription_code'],
                'createdAt' => date("Y-m-d H:i:s", strtotime($event['data']['created_at'])),
                'paidAt' => date("Y-m-d H:i:s", strtotime($event['data']['paidAt'])),
                'transaction' => 'PAID',
                'status' => 1
            ]);
            if ($updateSubscriber) {
                return response()->json(200);
            }
        } elseif ($event['event'] === "invoice.update") {
            Log::info($event);
        } else {
            Log::info($event);
        }
    }
}
