<?php

namespace App\Application\Services;

use App\Domain\Entity\Account;
use App\Domain\Entity\Transaction;
use App\Domain\Repository\AccountRepositoryInterface;
use App\Domain\Repository\TransactionRepositoryInterface;
use App\Domain\Strategy\RateStrategy;
use App\Domain\ValueObject\PaymentMethod;
use App\Domain\Error\NotFoundException;

class TransactionService
{
    public function __construct(
        private AccountRepositoryInterface $accountRepository,
        private TransactionRepositoryInterface $transactionRepository,
        private RateStrategy $rateStrategy
    ) {}

    public function create(
        PaymentMethod $paymentMethod,
        int $accountId,
        float $value,
    ): array {
        $account = $this->getAccount($accountId);
        $account = $this->createTransaction($account, $paymentMethod, $value);
        return $account->toArray();
    }

    private function getAccount(int $accountId): Account
    {
        $account = $this->accountRepository->get($accountId);
        if (empty($account)) {
            throw new NotFoundException("Not found account.");
        }
        if ($account->noBalance()) {
            throw new NotFoundException("AccountModel without balance.");
        }
        return $account;
    }

    private function createTransaction(Account $account, PaymentMethod $paymentMethod, float $value): Account
    {
        $rate = $this->rateStrategy->get($paymentMethod);
        $amount = $rate->calculate($value);
        $account->removeBalance($amount);
        $this->transactionRepository->save(new Transaction(
            $account,
            $paymentMethod,
            $rate->getFee(),
            $value,
            $amount
        ));
        $this->accountRepository->update($account);
        return $account;
    }
}
