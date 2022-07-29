<?php

namespace App\Service;

use App\Repository\BalanceRepository;

class BalanceService {

    protected $balanceRepository;

    public function __construct(
        BalanceRepository $balanceRepository
    ){
        $this->balanceRepository = $balanceRepository;
    }

    public function deposit($balance):void
    {
        $this->balanceRepository->deposit($balance);
    }

    public function payment($transaction):void
    {
        $balanceRepository=$this->balanceRepository->payment($transaction);
    }
}