<?php

namespace App\Domain\Entity;

class DebitRate extends Rate
{
    public function __construct()
    {
        parent::__construct(0.03);
    }
}
