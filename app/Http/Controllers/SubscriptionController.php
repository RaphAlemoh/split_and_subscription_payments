<?php

namespace App\Http\Controllers;

use App\Models\Plan;


class SubscriptionController extends Controller
{
    public function display_subscription(){
        $plans = Plan::all();
        return view('subscriptions.available_subscriptions')->with(compact('plans'));
    }
}
