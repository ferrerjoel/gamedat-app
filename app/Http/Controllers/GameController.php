<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function show($title)
    {
        $game = Game::getGame($title);
        return view('games.show', ['game' => $game]);
    }
}
