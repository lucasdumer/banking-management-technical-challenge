<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Account;

interface AccountRepositoryInterface
{
    public function get(int $id): ?Account;
    public function save(Account $account): Account;
    public function update(Account $account): Account;
}
