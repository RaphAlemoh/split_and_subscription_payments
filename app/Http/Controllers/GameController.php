<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public function games(){
        $user = Auth::user();
        $subscribtion_status = Subscription::where(['user_id' => $user->id, 'status' => 1])->get();
        $games = count($subscribtion_status) > 0 ? Game::all() : Game::where('amount', '0')->get();
        return view('games.index')->with(compact('games'));
    }
}
