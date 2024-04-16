<?php

namespace App\Interfaces\Http\Api\V1\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountGetRequest extends FormRequest
{
    public function all($keys = null)
    {
        $data = parent::all();
        $data['id'] = $this->query('id');
        return $data;
    }

    public function rules(): array
    {
        return [
            'id' => 'required|integer',
        ];
    }
}
