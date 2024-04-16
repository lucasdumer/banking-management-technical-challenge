<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Transaction;

interface TransactionRepositoryInterface
{
    public function save(Transaction $transaction): Transaction;
}
