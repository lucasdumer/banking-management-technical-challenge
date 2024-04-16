<?php

namespace App\Application\Services;

use App\Domain\Entity\Account;
use App\Domain\Error\BadRequestException;
use App\Domain\Repository\AccountRepositoryInterface;

class AccountService
{
    public function __construct(
        private AccountRepositoryInterface $accountRepository
    ) {}

    public function create(int $id, float $value): array
    {
        $account = $this->accountRepository->get($id);
        if (!empty($account)) {
            throw new BadRequestException("Account already exists.");
        }
        $account = new Account($value);
        $account->setId($id);
        $account = $this->accountRepository->save($account);
        return $account->toArray();
    }

    public function get(int $id): array
    {
        $account = $this->accountRepository->get($id);
        if (empty($account)) {
            throw new BadRequestException("The account does not exist.");
        }
        return $account->toArray();
    }
}
