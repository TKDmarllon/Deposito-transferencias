<?php

namespace App\Http\Controllers;

use App\Http\Requests\BalanceRequest;
use App\Models\Account;
use Illuminate\Http\JsonResponse;

class BalanceController extends Controller
{
    public function deposit(BalanceRequest $request)
    {
        $balance=$request->all();
        $account=Account::findorfail($balance['id']);
        $account->update([
            'balance'=>$balance['deposit']+$account->balance
        ]);
        return new JsonResponse($account);
    }

    public function payment(BalanceRequest $request)
    {
        $transaction=$request->all();
        $payer=$transaction['payer'];
        $payee=$transaction['payee'];
        $value=$transaction['value'];
        
        $payerObject=Account::findorfail($payer);
        $payeeObject=Account::findorfail($payee);
        if ($payerObject['type'] == 'cnpj') {
            return new JsonResponse("Transferencias só para CPF.");
        }

        if ($value<=0) {
            return new JsonResponse("O valor da transferência precisa ser positivo");
        }

        if ($payerObject->balance < $value) {
            return new JsonResponse("saldo insuficiente.");
        } 
        $payerObject->update([
            'balance'=>$payerObject->balance-$value
        ]);
        $payeeObject->update([
            'balance'=>$payeeObject->balance+$value
        ]);
        return new JsonResponse("transaçao efetuada.");
    }
}