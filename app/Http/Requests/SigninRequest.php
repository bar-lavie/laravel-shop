<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SigninRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'email' => 'required|email',
            'password' => 'required|min:6|max:10',
        ];
    }

    public function messages() {
        return [
            'email.required' => 'יש להזין אימייל',
            'email.email' => 'האימייל שהוזן אינו תקין',
            'password.required' => 'יש להזין סיסמא',
            'password.min' => 'הסיסמה קצרה מידי',
            'password.max' => 'הסיסמה ארוכה מדי',
        ];
    }

}
