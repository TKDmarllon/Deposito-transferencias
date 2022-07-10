<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountRequest;
use App\Models\Account;
use Illuminate\Http\JsonResponse;

class AccountController extends Controller
{

    public function index()
    {
        return Account::all();
    }

    public function store(AccountRequest $request)
    {
        Account::create($request->validated());
        return $request->all();

    }

    public function show($id)
    {
        $account=Account::findorfail($id);
        return new JsonResponse($account);
        
    }

    public function update(AccountRequest $request, $id)
    {
        $account=Account::findorfail($id);

        $account-> update([
            'balance'=>$request->saldo,
        ]);
    }

    public function destroy($id)
    {
        $account=Account::destroy($id);
        return new JsonResponse("conta exluída");
    }
}
