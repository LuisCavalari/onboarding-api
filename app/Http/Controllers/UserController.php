<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class User extends Controller
{
    function store(Request $request) {
        $rules = [
            'name' => 'required',
            'phone' => 'required',
            'zipCode' => 'required,max:9',
            'email' => 'email|required',
            'address' => 'required',
            'number' => 'required|numeric',
            'neighborhood' => 'required',
            'province' => 'required',
            'civilState' => 'required',
            'gender' => ['required',Rule::in(['Masculino','Feminino','Outro'])]
        ];
    }
}
