<?php

namespace App\Domain\ValueObject;

enum PaymentMethod: string
{
    case P = 'P';
    case C = 'C';
    case D = 'D';
}
