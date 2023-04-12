<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Game extends Model
{
    public static function getGame($title)
    {
        $response = Http::get("http://127.0.0.1:5000/api/games/{$title}");
        return $response->json();
    }
}

