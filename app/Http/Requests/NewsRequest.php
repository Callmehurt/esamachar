<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => ['required', 'string'],
            'tag' => ['required', 'string'],
            'thumbnail' => ['required'],
            'news_content' => ['required', 'string'],
            'video' => '',
            'category_id' => '',
            'user_id' => '',
            'status' => '',
        ];

    }
}