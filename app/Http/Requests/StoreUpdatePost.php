<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/* NOTA: para gerar a classe de validação:

 php artisan make:request StoreUpdatePost 
 
*/

class StoreUpdatePost extends FormRequest
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
            'title' => 'required|min:3|max:160',
            'content' => ['nullable', 'min:5', 'max:10000'],
            'image' => ['required', 'image']
        ];
    }
}
