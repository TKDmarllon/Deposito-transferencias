<?php

namespace App\Repository;

use App\Models\Account;
use Illuminate\Http\JsonResponse;

class BalanceRepository{ 

    public function deposit($balance)
    {
        $account=Account::findorfail($balance['id']);
        $account->update([
            'balance'=>$balance['deposit']+$account->balance
        ]);
    }

    public function payment($transaction)
    {
        $payer=$transaction['payer'];
        $payee=$transaction['payee'];
        $value=$transaction['value'];

        $payerObject=Account::findorfail($payer);
        $payeeObject=Account::findorfail($payee);

        if ($payerObject->balance < $value) {
            return new JsonResponse("saldo insuficiente.");
        } 
        if ($value<=0) {
            return new JsonResponse("O valor da transferência precisa ser positivo");
        }
        if ($payerObject['type'] == 'cnpj') {
            return new JsonResponse("Transferencias só para CPF.");
        }

        $payerObject->update([
            'balance'=>$payerObject->balance-$value
        ]);
        $payeeObject->update([
            'balance'=>$payeeObject->balance+$value
        ]);
        return new JsonResponse("Transação efetuada.");
    }
}