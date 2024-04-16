<?php

namespace App\Infrastructure\Repository;

use App\Domain\Entity\Account;
use App\Domain\Repository\AccountRepositoryInterface;
use App\Infrastructure\Models\AccountModel;

class AccountRepository implements AccountRepositoryInterface
{
    public function get(int $id): ?Account
    {
        try {
            $accountModel = AccountModel::where('id', $id)->first();
            if (empty($accountModel)) {
                return null;
            }
            $account = new Account($accountModel->value);
            $account->setId($accountModel->id);
            return $account;
        } catch (\Throwable $throwable) {
            throw new \Exception("Database error on find account. ".$throwable->getMessage());
        }
    }

    public function save(Account $account): Account
    {
        try {
            $accountModel = new AccountModel();
            $accountModel->id = $account->getId();
            $accountModel->value = $account->getValue();
            $accountModel->save();
            return $account;
        } catch (\Throwable $throwable) {
            throw new \Exception("Database error on save account. ".$throwable->getMessage());
        }
    }

    public function update(Account $account): Account
    {
        try {
            $accountModel = AccountModel::where('id', $account->getId())->first();
            $accountModel->id = $account->getId();
            $accountModel->value = $account->getValue();
            $accountModel->save();
            return $account;
        } catch (\Throwable $throwable) {
            throw new \Exception("Database error on find account. ".$throwable->getMessage());
        }
    }
}
