<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Menu;

class MainController extends Controller
{
    public static $data = ['title' => 'Epic | '];

    public function __construct()
    {
        self::$data['categories'] = Category::all()->toArray();
        self::$data['menu'] = Menu::all()->toArray();
    }
}
