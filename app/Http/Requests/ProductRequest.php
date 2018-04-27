<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProductRequest extends FormRequest {

    public function authorize() {
        return true;
    }

    public function rules(Request $request) {
        $item_id = !empty($request['item_id']) ? ',' . $request['item_id'] : '';
        return [
            'category_id' => 'required',
            'title' => 'required',
            'price' => 'required|numeric',
            'url' => 'required|unique:products,url' . $item_id,
            'article' => 'required',
            'image' => 'image',
        ];
    }

    public function messages() {
        return [
            'category_id.required' => 'יש לקשר את המוצר לקטגוריה מסויימת',
            'title.required' => 'יש להזין שם מוצר',
            'price.required' => 'יש להזין מחיר מוצר',
            'price.numeric' => 'המחיר חייב להכיל ספרות בלבד',
            'url.required' => 'יש להזין כותרת עמוד',
            'url.unique' => 'הקישור כבר נמצא בשימוש',
            'article.required' => 'יש להזין מידע על הקטגוריה',
            'image.image' => 'הקובץ תמונה אינו תקין',
        ];
    }

}
