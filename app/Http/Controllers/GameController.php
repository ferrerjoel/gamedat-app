<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function show($title)
    {
        $game = Game::getGame($title);
        return view('game.show', ['game' => $game]);
    }

    public function getSuggestions(Request $request) {
        $games = Game::getGameTitles();
        return $games;
    }
}
