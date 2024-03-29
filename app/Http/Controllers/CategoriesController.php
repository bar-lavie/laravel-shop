<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Category;
use Session;

class CategoriesController extends MainController {

    function __construct() {
        parent::__construct();
        $this->middleware('adminverify');
    }

    public function index() {
        self::$data['categories'] = Category::all()->toArray();
        return view('cms.categories', self::$data);
    }

    public function create() {
        return view('cms.add_category', self::$data);
    }

    public function store(CategoryRequest $request) {
        Category::save_new($request);
        return redirect('cms/categories');
    }

    public function show($id) {
        self::$data['id'] = $id;
        return view('cms.delete_category', self::$data);
    }

    public function edit($id) {
        self::$data['category'] = Category::find($id)->toArray();
        return view('cms.edit_category', self::$data);
    }

    public function update(CategoryRequest $request, $id) {
        Category::update_item($request, $id);
        return redirect('cms/categories');
    }

    public function destroy($id) {
        Category::destroy($id);
        Session::flash('sm', 'הקטגוריה נמחקה בהצלחה');
        return redirect('cms/categories');
    }

}
