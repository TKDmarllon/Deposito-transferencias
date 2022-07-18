<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountRequest;
use App\Models\Account;
use App\Service\AccountService;
use Illuminate\Http\JsonResponse;

class AccountController extends Controller
{
    private $accountService;

    public function __construct(
        AccountService $accountService
    ){
        $this->accountService = $accountService;
    }

    public function index()
    {
        return $this->accountService->index();
    }

    public function store(AccountRequest $request):JsonResponse
    {
        $account = new Account($request->all());
        $accountService=$this->accountService->store($account);
        return new JsonResponse($accountService);
    }   

    public function show($id)
    {
        return $this->accountService->show($id);
        
    }

    public function update(AccountRequest $request):JsonResponse
    {
        $account= new Account($request->all());
        $account=$this->accountService->
        $this->accountService->update($account);
        return new JsonResponse($account);

    }

    public function destroy($id)
    {
        $this->accountService->destroy($id);
        return new JsonResponse("conta deletada.");
    }
}