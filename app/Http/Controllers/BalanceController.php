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
        if ($payerObject->cnpj) {
            return new JsonResponse("Transferencias só para pf.");
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