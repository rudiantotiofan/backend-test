<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditorRequest extends FormRequest
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
        $route = \Route::current();
        if ($route->getName() != 'editor' && $route->getName() != 'editor.store') {
            return [
                'email'      => 'required|unique:users,email,'.(int)$this->segment(4),
                //'username'   => 'required|unique:users,username,'.(int)$this->segment(4),
                'first_name' => 'required'
            ];
        }
        return [
            'email'      => 'required|unique:users,email',
            //'username'   => 'required|unique:users,username',
            'first_name' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'email'      => 'Email',
            'username'   => 'Username',
            'first_name' => 'First Name'
        ];
    }
}
