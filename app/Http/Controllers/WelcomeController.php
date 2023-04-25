<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function show()
    {
        $titles = Game::getGameTitles();
        $randomGame = count($titles) > 0 ? $titles[rand(0, count($titles) - 1)]["name"] : '';
        return view('welcome', compact('randomGame'));
    }

    public function getSuggestions(Request $request) {
        $games = Game::getGameTitles();
        return $games;
    }
}
