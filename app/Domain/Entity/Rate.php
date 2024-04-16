<?php

namespace App\Domain\Entity;

abstract class Rate
{
    public function __construct(
        private float $fee
    ) {}

    public function getFee(): float
    {
        return $this->fee;
    }

    public function calculate(float $value): float
    {
        return $value + ($value * $this->fee);
    }
}
