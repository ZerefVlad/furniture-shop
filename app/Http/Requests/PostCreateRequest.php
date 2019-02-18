<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 07.02.19
 * Time: 21:12
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostCreateRequest extends FormRequest
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
            'title' => 'required|max:255',

        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'заполни поле title'
        ];
    }
}