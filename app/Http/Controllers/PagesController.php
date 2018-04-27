<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use App\Category;

class PagesController extends MainController {

    public function home() {
        self::$data['title'] .= 'דף הבית';
        self::$data['categories'] = Category::all()->toArray();
        return view('content.home', self::$data);
    }

    public function dynamicMenu($url) {
        Content::getContent($url, self::$data);
        return view('content.dyncontent', self::$data);
    }

}
