<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{   
    public function wantsJson()
    {
        return true;
    }
    public function authorize()
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function message() 
    {
        return [
            'required' => 'Um :field é necessário',
            'in' => 'O :field não esta entre :values'
        ];
    }
    public function rules()
    {
        return [
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
