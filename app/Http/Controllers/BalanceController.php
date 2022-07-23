<?php

namespace App\Http\Controllers;

use App\Http\Requests\BalanceRequest;
use App\Service\BalanceService;
use Illuminate\Http\JsonResponse;

class BalanceController extends Controller
{
    private $balanceService;

    public function __construct(
        BalanceService $balanceService
    ){
        $this->balanceService = $balanceService;
    }
    public function deposit(BalanceRequest $request)
    {
        $balance= new BalanceRequest($request->all());
        $balance=$this->balanceService->deposit($balance);
        return new JsonResponse($request);

    }

    public function payment(BalanceRequest $request)
    {
        $transaction=new BalanceRequest($request->all());
        $balanceService=$this->balanceService->payment($transaction);
        return new JsonResponse($balanceService);
    }
}