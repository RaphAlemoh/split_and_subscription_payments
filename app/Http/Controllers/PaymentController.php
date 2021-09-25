<?php

namespace App\Http\Controllers;

use Auth;
use Paystack;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PaymentController extends Controller
{

    public function redirect_split_payment_to_gateway(Request $request)
    {
        try {
                $data['reference'] =  $request->reference;
                $data['user_id'] =  auth()->user()->id;
                $data['package_id'] =  $request->package_id;
                $initiate_sale = Sale::create($data);
                if ($initiate_sale) {
                    return Paystack::getAuthorizationUrl()->redirectNow();
                }

        } catch (\Exception $e) {
            return Redirect::back()->withMessage(['msg' => 'The paystack token has expired. Please refresh the page and try again.', 'type' => 'error']);
        }
    }

    public function handle_split_payment_gateway_callback()
    {
        $paymentDetails = Paystack::getPaymentData();
        if ($paymentDetails['data']['status'] == "success") {
            $updateSubscriber = Sale::where([
                'reference' => $paymentDetails['data']['reference']
            ])->update(['transaction' => 'PAID']);
            if ($updateSubscriber) {
                return redirect()->route('packages');
            } else {
                return 'Please contact the administrator! Please dont attempt paying again if your bank has charged';
            }
        }
    }



}
