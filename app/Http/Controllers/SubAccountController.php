<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Account;
use App\Models\Bank;
use Paystack;
use Exception;

class SubAccountController extends Controller
{
    public function subaccount(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'settlement_bank' => ['required', 'numeric'],
                'account_number' => ['required', 'numeric'],
            ]);

            try {

                $reference = Paystack::genTranxRef();

                Account::create([
                    'user_id' => auth()->user()->id,
                    'reference' => $reference,
                ]);

                $request->merge([
                    'percentage_charge' => 10.5,
                    'business_name' => ucwords(Auth::user()->name),
                    'settlement_bank' => $request->settlement_bank,
                    'metadata' => ['reference' => $reference],
                ]);

                $create_subaccount = Paystack::createSubAccount();

                if ($create_subaccount['status']) {
                    if ($create_subaccount['data']['subaccount_code'] != null) {
                        Account::where(['reference' => $create_subaccount['data']['metadata']['reference']])
                            ->update([
                                'subaccount_code' => $create_subaccount['data']['subaccount_code'],
                                'is_verified' =>  $create_subaccount['data']['is_verified'] ? 0 : 1,
                            ]);

                        return redirect()->back()->with('notice', 'Subaccount created successfully!!!');
                    }
                }

                return redirect()->back()->with('notice', 'Subaccount not created!!!');


            } catch (Exception $e) {
                return $e;
            }
        }


        //retrieve the list of banks seed into the database
        $banks = Bank::select('name', 'code')->get();

        //alternatively  we can get the list of banks from paystack, store it and pass it into the view
        //https://api.paystack.co/bank complete list of the banks are available on this link

        return view('payments.subaccount')->with(compact('banks'));
    }
}
