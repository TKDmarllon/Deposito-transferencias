<?php

namespace App\Http\Requests;

class BalanceRequest extends AbstractRequest
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
            'deposit'=> 'gt:0',
        ];
    }

    public function messages()
    {
        return[
            'deposit.gt'=>'O valor do deposito precisa ser positivo.'
        ];
    }
}
