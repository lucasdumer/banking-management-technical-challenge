<?php

namespace App\Interfaces\Http\Api\V1\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'payment_method' => 'required|string|in:P,C,D',
            'account_id' => 'required|integer',
            'value' => 'required|numeric',
        ];
    }
}
