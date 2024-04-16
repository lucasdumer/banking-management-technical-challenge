<?php

namespace App\Domain\Entity;

use App\Domain\ValueObject\PaymentMethod;

class Transaction
{
    private int $id;

    public function __construct(
        private Account $account,
        private PaymentMethod $paymentMethod,
        private float $rate,
        private float $value,
        private float $amount,
    ) {}

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getAccount(): Account
    {
        return $this->account;
    }

    public function getPaymentMethod(): PaymentMethod
    {
        return $this->paymentMethod;
    }

    public function getRate(): float
    {
        return $this->rate;
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function toArray(): array
    {
        return [
            'account_id' => $this->account->getId(),
            'payment_method' => $this->paymentMethod->name,
            'rate' => $this->rate,
            'value' => $this->value,
            'amount' => $this->amount,
        ];
    }
}
