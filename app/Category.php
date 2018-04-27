<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

class Category extends Model
{
    public function Products()
    {
        return $this->hasMany('App\Product');
    }

    public static function save_new($request)
    {
        $image_name = 'no-image.png';


        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $image_name = date('Y.m.d.h.i.s') . '-' . $file->getClientOriginalName();
            $request->file('image')->move(public_path() . '/images/categories', $image_name);
        }

        $category = new self();
        $category->title = $request['title'];
        $category->article = $request['article'];
        $category->image = $image_name;
        $category->url = $request['url'];
        $category->save();
        Session::flash('sm', 'הקטגוריה התווספה בהצלחה');
    }

    public static function update_item($request, $id)
    {
        $image_name = '';


        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $image_name = date('Y.m.d.h.i.s') . '-' . $file->getClientOriginalName();
            $request->file('image')->move(public_path() . '/images/categories', $image_name);
        }

        $category = self::find($id);
        $category->title = $request['title'];
        $category->article = $request['article'];

        if ($image_name) {
            $category->image = $image_name;
        }

        $category->url = $request['url'];
        $category->save();
        Session::flash('sm', 'הקטגוריה התעדכנה בהצלחה');
    }
}
