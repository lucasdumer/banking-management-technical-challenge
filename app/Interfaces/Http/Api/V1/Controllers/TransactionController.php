<?php

namespace App\Interfaces\Http\Api\V1\Controllers;

use App\Application\Services\TransactionService;
use App\Domain\ValueObject\PaymentMethod;
use App\Interfaces\Http\Api\V1\Requests\TransactionCreateRequest;
use Illuminate\Http\Response;

class TransactionController extends Controller
{
    public function __construct(
        private TransactionService $transactionService
    ) {}

    public function create(TransactionCreateRequest $request): Response
    {
        return $this->successCreated($this->transactionService->create(
            PaymentMethod::from($request->payment_method),
            $request->account_id,
            $request->value,
        ));
    }
}
