<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    private $_model;
    function __construct(User $model)
    {
        $this->_model = $model;
    }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            $token = auth()->user()->createToken('auth_token')->plainTextToken;
            return response()->json([
                'message' => 'user authenticated',
                'user' => auth()->user()->load('role'),
                'access_token' => $token,
            ], Response::HTTP_ACCEPTED);
        }
        return $this->Unauthorized();
    }
    public function register(RegisterUserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);
        $this->_model->create($data);
        return $this->StoreData($data);
    }
    public function me(Request $request)
    {
        $data = auth()->user()->load('role');
        return $this->FetchData($data);
    }
    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json([
            'message' => 'user logout',
        ], Response::HTTP_OK);
    }
}
