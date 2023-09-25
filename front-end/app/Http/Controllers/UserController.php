<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $response = $this->GetRequst($this->uri . 'user');
        $data = $response['data'];
        return view('pages.user.index')->with('data', $data);
    }
}
