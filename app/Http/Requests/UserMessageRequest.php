<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserMessageRequest extends FormRequest
{
    /**
     * @return mixed[]
     */
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'message'  => ['required'],
        ];
    }

}
