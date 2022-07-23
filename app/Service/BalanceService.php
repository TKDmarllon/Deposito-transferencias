<?php

namespace App\Service;

use App\Repository\BalanceRepository;
use Illuminate\Http\JsonResponse;

class BalanceService {

    protected $balanceRepository;

    public function __construct(
        BalanceRepository $balanceRepository
    ){
        $this->balanceRepository = $balanceRepository;
    }

    public function deposit($balance)
    {
        $this->balanceRepository->deposit($balance);
    }

    public function payment($transaction)
    {
        $balanceRepository=$this->balanceRepository->payment($transaction);
        return new JsonResponse($balanceRepository);
    }
}