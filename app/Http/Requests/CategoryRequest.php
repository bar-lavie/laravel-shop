<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CategoryRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules(Request $request) {
        $item_id = !empty($request['item_id']) ? ',' . $request['item_id'] : '';
        return [
            'title' => 'required',
            'url' => 'required|unique:categories,url' . $item_id,
            'article' => 'required',
            'image' => 'image',
        ];
    }

    public function messages() {
        return [
            'title.required' => 'יש להזין שם קישור',
            'url.required' => 'יש להזין כותרת עמוד',
            'url.unique' => 'הקישור כבר נמצא בשימוש',
            'article.required' => 'יש להזין מידע על הקטגוריה',
            'image.image' => 'הקובץ תמונה אינו תקין',
        ];
    }

}
