<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class NewsCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'type' => ['required', 'string', 'unique:news_categories'],
            'user_id' => '',
            'status' => '',
        ];

    }
}