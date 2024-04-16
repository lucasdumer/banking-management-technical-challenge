<?php

namespace App\Interfaces\Http\Api\V1\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|integer',
            'value' => 'required|numeric',
        ];
    }
}
