<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function games(){

        $games = Game::all();
        
        return view('games.index')->with(compact('games'));
    }
}
