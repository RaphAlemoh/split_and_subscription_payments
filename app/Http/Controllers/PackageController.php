<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class PackageController extends Controller
{
    public function packages(){
        $packages = Package::all();
        return view('packages.index')->with(compact('packages'));
    }
}
