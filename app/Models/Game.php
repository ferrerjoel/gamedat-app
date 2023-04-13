<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Game extends Model
{
    public static function getGame($title)
    {
        $response = Http::get("http://192.168.56.1:5000/api/games/{$title}"); // Using localhost doesn't work
        return $response->json();
    }
}

