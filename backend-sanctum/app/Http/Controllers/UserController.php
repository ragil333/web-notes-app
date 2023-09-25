<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $_model;

    function __construct(User $model)
    {
        $this->_model = $model;
    }
    public function index()
    {
        $data = $this->_model->with('role')->get();
        return $this->FetchData($data);
    }
}
