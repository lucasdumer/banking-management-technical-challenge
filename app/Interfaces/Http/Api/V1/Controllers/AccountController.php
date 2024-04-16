<?php

namespace App\Interfaces\Http\Api\V1\Controllers;

use App\Application\Services\AccountService;
use App\Interfaces\Http\Api\V1\Requests\AccountCreateRequest;
use App\Interfaces\Http\Api\V1\Requests\AccountGetRequest;
use Illuminate\Http\Response;

class AccountController extends Controller
{
    public function __construct(
        private AccountService $accountService
    ) {}

    public function create(AccountCreateRequest $accountCreateRequest): Response
    {
        return $this->successCreated($this->accountService->create(
            $accountCreateRequest->id,
            $accountCreateRequest->value,
        ));
    }

    public function get(AccountGetRequest $accountGetRequest): Response
    {
        return $this->successGet($this->accountService->get($accountGetRequest->id));
    }
}
