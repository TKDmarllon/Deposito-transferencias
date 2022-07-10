<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Validation\Rules\Password;


class AccountRequest extends AbstractRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */


    public function rules()
    {
        return [
            'class'=>['required', Rule::in('pf','pj')],
            'cpf'=>Rule::requiredIf($this->request->get('class')=='pf'),
            'cnpj'=>Rule::requiredIf($this->request->get('class')=='pj'),
            'fullname'=>'required',
            'email' => 'required|email',
            'balance'=>'required',
            'password'=>Password::min(8)->numbers(),
        ];
    }
}
