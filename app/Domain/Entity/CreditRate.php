<?php

namespace App\Domain\Entity;

class CreditRate extends Rate
{
    public function __construct()
    {
        parent::__construct(0.05);
    }
}
