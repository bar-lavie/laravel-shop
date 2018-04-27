<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest {

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
            'name' => 'required|regex:/^[א-תa-z]+(\s[א-תa-z]+)*$/i',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:10|confirmed'
        ];
    }

    public function messages() {
        return [
            'name.required' => 'יש להזין שם',
            'name.regex' => 'השם שהוזן אינו תקין | השם צריך להכיל אותיות ורווחים בלבד',
            'email.required' => 'יש להזין אימייל',
            'email.email' => 'האימייל שהוזן אינו תקין',
            'email.unique' => 'האימייל שהוזן כבר נמצא בשימוש',
            'password.required' => 'יש להזין סיסמא',
            'password.min' => 'הסיסמה קצרה מידי',
            'password.max' => 'הסיסמה ארוכה מדי',
            'password.confirmed' => 'הסיסמאות אינן תואמות',
        ];
    }

}
