<?php

namespace Tests\Unit\Domain\Entity;

use App\Domain\Entity\Account;
use App\Domain\Error\BusinessException;
use PHPUnit\Framework\TestCase;

class AccountTest extends TestCase
{
    public function testAccountNoBalanceTrue(): void
    {
        $account = new Account(0);
        $this->assertTrue($account->noBalance());
    }

    public function testAccountNoBalanceFalse(): void
    {
        $account = new Account(100);
        $this->assertFalse($account->noBalance());
    }

    public function testAccountRemoveBalance(): void
    {
        $account = new Account(100);
        $account->removeBalance(100);
        $this->assertFalse($account->noBalance());
    }

    public function testAccountRemoveBalanceException(): void
    {
        $account = new Account(100);
        $account->removeBalance(101);
        $this->expectException(BusinessException::class);
        $this->expectExceptionMessage("No balance available.");
    }

    public function testAccountToArray(): void
    {
        $account = new Account(100);
        $account->setId(1);
        $array = $account->toArray();
        $this->assertEquals($array['id'], 1);
        $this->assertEquals($array['value'], 100);
    }
}
