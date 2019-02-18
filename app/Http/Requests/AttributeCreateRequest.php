<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 08.02.19
 * Time: 17:43
 */

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class AttributeCreateRequest extends FormRequest
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