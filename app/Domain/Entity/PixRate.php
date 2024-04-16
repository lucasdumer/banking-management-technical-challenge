<?php

namespace App\Domain\Entity;

class PixRate extends Rate
{
    public function __construct()
    {
        parent::__construct(0);
    }
}
