<?php

namespace App\Http\Controllers;

use App\Events\NewUserRegistred;
use App\Http\Requests\UserRequest;
use App\User;

class UserController extends Controller
{
    public function store(UserRequest $request) {
        $validatedData = $request->validated();
        $user = User::create($validatedData);
        event(new NewUserRegistred($user));
        $token = auth('api')->login($user);
        return response()->json(['user' => $user , 'access_token' => $token]);
    }
}
