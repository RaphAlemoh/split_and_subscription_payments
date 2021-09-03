<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class PackageController extends Controller
{
    public function packages(){
        $user = Auth::user();
        $payment_status = Payment::where(['user_id' => $user->id, 'status' => 1])->get();
        $packages = count($payment_status) > 0 ? Package::all() : Package::where('amount', '0')->get();
        return view('packages.index')->with(compact('packages'));
    }
}
