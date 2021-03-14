<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'article_title' => ['required', 'min:10'],
            'article_content' => ['required', 'min:250'],
            'article_thumbnail' => ['required', 'mimes:jpeg,jpg,png', 'max:5000'],
            'article_category' => ['required'],
            'article_tag' => ['required', 'max:5'],
        ];
    }
}
