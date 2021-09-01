<?php

namespace App\Http\Controllers;

use Auth;
use Paystack;
use App\Models\User;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class PaymentController extends Controller
{

    public function redirect_to_gateway(Request $request)
    {
        try {
            $user = Auth::user();
            $check_if_subscriber_exist  = Subscription::where(['user_id' => $user->id])->get();
            if(count($check_if_subscriber_exist) == 0){
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
            }else{
                return Redirect::back()->withMessage(['msg' => 'This subscriber already exist. Check mail for new invoice', 'type' => 'error']);
            }
        } catch (\Exception $e) {
            return Redirect::back()->withMessage(['msg' => 'The paystack token has expired. Please refresh the page and try again.', 'type' => 'error']);
        }
    }

    public function handle_gateway_callback()
    {
        $paymentDetails = Paystack::getPaymentData();
        if ($paymentDetails['data']['status'] == "success") {
            $updateSubscriber = Subscription::where([
                'user_id' => Auth::user()->id,
                'reference' => $paymentDetails['data']['reference']
            ])->update(['transaction' => 'PAID']);
            if ($updateSubscriber) {
                return redirect()->route('games');
            } else {
                return 'Please contact the administrator! Please dont attempt paying again if your bank has charged';
            }
        }
    }


    public function handle_web_hook(Request $request)
    {
        $data = json_encode($request->all());
        $webhook_response = json_decode($data, true);
        $user  = User::where('email', $webhook_response['data']['customer']['email'])->get();
        if ($webhook_response['event'] === "charge.success") {
            $updateSubscriber =  Subscription::where(['user_id' => $user->id])->update([
                'authorization_code' => $webhook_response['data']['authorization']['authorization_code'],
                'signature' => $webhook_response['data']['authorization']['signature'],
                'customer_code' => $webhook_response['data']['customer']['customer_code'],
                'createdAt' => date("Y-m-d H:i:s", strtotime($webhook_response['data']['created_at'])),
                'paidAt' => date("Y-m-d H:i:s", strtotime($webhook_response['data']['paidAt'])),
                'transaction' => 'PAID',
                'next_payment_date' => date("Y-m-d H:i:s", strtotime($webhook_response['data']['next_payment_date'])),
                'status' => 1
            ]);
            if ($updateSubscriber) {
                return response()->json(200);
            }
        } elseif ($webhook_response['event'] === "subscription.create") {
            $updateSubscriber =  Subscription::where(['user_id' => $user->id])->update([
                'authorization_code' => $webhook_response['data']['authorization']['authorization_code'],
                'signature' => $webhook_response['data']['authorization']['signature'],
                'customer_code' => $webhook_response['data']['customer']['customer_code'],
                'next_payment_date' => $webhook_response['data']['next_payment_date'],
                'subscriptionCode' => $webhook_response['data']['subscription_code'],
                'createdAt' => date("Y-m-d H:i:s", strtotime($webhook_response['data']['created_at'])),
                'paidAt' => date("Y-m-d H:i:s", strtotime($webhook_response['data']['paidAt'])),
                'transaction' => 'PAID',
                'status' => 1
            ]);
            if ($updateSubscriber) {
                return response()->json(200);
            }
        } elseif ($webhook_response['event'] === "invoice.update") {
            Log::info($webhook_response);
        } else {
            return response()->json(404);

        }
    }
}
