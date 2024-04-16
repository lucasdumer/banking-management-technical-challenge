<?php

namespace App\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'value',
    ];
}
