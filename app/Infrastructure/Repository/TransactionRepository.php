<?php

namespace App\Infrastructure\Repository;

use App\Domain\Entity\Transaction;
use App\Domain\Repository\TransactionRepositoryInterface;
use App\Infrastructure\Models\TransactionModel;

class TransactionRepository implements TransactionRepositoryInterface
{
    public function save(Transaction $transaction): Transaction
    {
        try {
            $transactionModel = new TransactionModel();
            $transactionModel->account_id = $transaction->getAccount()->getId();
            $transactionModel->payment_method = $transaction->getPaymentMethod()->name;
            $transactionModel->rate = $transaction->getRate();
            $transactionModel->value = $transaction->getValue();
            $transactionModel->amount = $transaction->getAmount();
            $transactionModel->save();
            $transaction->setId($transactionModel->id);
            return $transaction;
        } catch (\Throwable $throwable) {
            throw new \Exception("Database error on save transaction. ".$throwable->getMessage());
        }
    }
}
