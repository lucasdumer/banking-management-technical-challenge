<?php

namespace App\Domain\Strategy;

use App\Domain\Entity\CreditRate;
use App\Domain\Entity\DebitRate;
use App\Domain\Entity\PixRate;
use App\Domain\Entity\Rate;
use App\Domain\ValueObject\PaymentMethod;

class RateStrategy
{
    public function get(PaymentMethod $paymentMethod): Rate
    {
        return match($paymentMethod) {
            PaymentMethod::P => new PixRate(),
            PaymentMethod::C => new CreditRate(),
            PaymentMethod::D => new DebitRate(),
        };
    }
}
