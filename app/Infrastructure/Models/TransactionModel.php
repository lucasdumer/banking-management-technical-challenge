<?php

namespace App\Infrastructure\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionModel extends Model
{
    use HasFactory;

    protected $table = "transactions";

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'account_id',
        'payment_method',
        'rate',
        'value',
        'amount',
    ];
}
