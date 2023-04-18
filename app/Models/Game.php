<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Game extends Model
{
    private static function makeRequest($url)
    {
        $ip_address = env('API_IP');
        $port = env('API_PORT');

        $response = Http::get("http://$ip_address:$port/$url");
        return $response->json();
    }

    public static function getGame($title)
    {
        return self::makeRequest("api/games/{$title}");
    }

    public static function getGameTitles()
    {
        return self::makeRequest("api/games");
    }
}
