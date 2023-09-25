<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;

trait ApiRequest
{
    public function PostRequest($uri, $data = null)
    {
        $response = Http::acceptJson()->withToken(session()->get('token'))->post($uri, $data);
        return $response;
    }
    public function PutRequest($uri, $data)
    {
        $response = Http::acceptJson()->withToken(session()->get('token'))->put($uri, $data);
        return $response;
    }
    public function DeleteRequest($uri)
    {
        $response = Http::acceptJson()->withToken(session()->get('token'))->delete($uri);
        return $response;
    }
    public function GetRequst($uri)
    {
        $response = Http::acceptJson()->withToken(session()->get('token'))->get($uri);
        return $response;
    }
}
