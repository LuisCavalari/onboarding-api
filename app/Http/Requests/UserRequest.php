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
    public function validationData()
    {
        return $this->json()->all();
    }
    public function messages() 
    {
        return [
            'required' => 'Um :attribute  é necessário',
            'in' => 'O :attribute  não esta entre :values',
            'email.unique' => 'Este email ja foi registrado'
        ];
    }
    public function rules()
    {
        return [
            'name' => 'required',
            'phone' => 'required',
            'zipCode' => 'required|max:9',
            'email' => 'email|required|email|unique:users,email',
            'address' => 'required',
            'number' => 'required|numeric',
            'neighborhood' => 'required',
            'province' => 'required',
            'civilState' => 'required',
            'city' => 'required',
            'password' => 'required',
            'gender' => ['required',Rule::in(['Masculino','Feminino','Outro'])]
        ];
    }
}
