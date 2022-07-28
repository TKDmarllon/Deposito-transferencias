<?php

namespace App\Service;

use App\Http\Requests\AccountUpdateRequest;
use App\Models\Account;
use App\Repository\AccountRepository;
use Illuminate\Http\JsonResponse;

class AccountService {

    protected $accountService;

    public function __construct(
        AccountRepository $accountRepository
    ){
        $this->accountRepository = $accountRepository;
    }

    public function index()
    {
        return $this->accountRepository->index();
    }

    public function store(Account $account)
    {
        $this->accountRepository->store($account);
        return $account;
    }

    public function show($id)
    {
        return $this->accountRepository->show($id); 
    }

    public function update( $newAccount)
    {
        $this->accountRepository->update($newAccount);
        return $newAccount;
    }

    public function destroy($id)
    {
        return $this->accountRepository->destroy($id); 
    }
}