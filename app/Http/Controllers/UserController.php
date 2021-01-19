<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function store(UserRequest $request) {
        $validatedData = $request->validated();
        return response()->json(['data' => User::create($validatedData)]);
    }
}
