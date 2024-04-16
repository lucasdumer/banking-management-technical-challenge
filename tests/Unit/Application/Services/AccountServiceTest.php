<?php

namespace Tests\Unit\Application\Services;

use App\Application\Services\AccountService;
use App\Domain\Error\BadRequestException;
use App\Domain\Repository\AccountRepositoryInterface;
use PHPUnit\Framework\TestCase;

class AccountServiceTest extends TestCase
{
    public function testAccountServiceGet(): void
    {
        $accountRepositoryStub = $this->createStub(AccountRepositoryInterface::class);
        $accountRepositoryStub->method('get')->willReturn(null);
        $accountService = new AccountService($accountRepositoryStub);
        $accountService->get(1);
        $this->expectException(BadRequestException::class);
        $this->expectExceptionMessage("The account does not exist.");
    }
}
