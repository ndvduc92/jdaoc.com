<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function callIdApi($method, $path, $params)
    {
        $client = new \GuzzleHttp\Client();
        $gameApi = "https://id.trutienhonthe.com/api";
        $response = $client->request($method, $gameApi . $path."?api_token=".env("AOC_API_KEY"), ["form_params" => $params]);
        $response = json_decode($response->getBody()->getContents(), true);
        return $response;
    }
}
