<?php

namespace App\Domain\Entity;

use App\Domain\Error\BusinessException;

class Account
{
    private int $id;

    public function __construct(private float $value) {}

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function noBalance(): bool
    {
        return $this->value <= 0;
    }

    public function removeBalance(float $amount): void
    {
        if ($this->value - $amount < 0) {
            throw new BusinessException("No balance available.");
        }
        $this->value -= $amount;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'value' => $this->value,
        ];
    }
}
