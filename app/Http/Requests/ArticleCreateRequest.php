<?php

namespace App\Http\Requests;

use App\Rules\StringLengthNoHTML;
use Illuminate\Foundation\Http\FormRequest;

class ArticleCreateRequest extends FormRequest
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
            'title' => 'required|string|min:5|max:30',
            'image' => 'required',
            'summary' => [
                'required',
                new StringLengthNoHTML($this->request, 10, 100)
            ],
            'text' => 'required',
        ];
    }


}
