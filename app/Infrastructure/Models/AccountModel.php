<?php

namespace App\Infrastructure\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountModel extends Model
{
    use HasFactory;

    protected $table = "accounts";

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'value',
    ];
}
