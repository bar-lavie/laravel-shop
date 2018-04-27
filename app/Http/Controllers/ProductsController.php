<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Category;
use App\Product;
use Session;

class ProductsController extends MainController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('adminverify');
    }

    public function index()
    {
        self::$data['product'] = Product::all()->toArray();
        return view('cms.products', self::$data);
    }

    public function create()
    {
        return view('cms.add_product', self::$data);
    }

    public function store(ProductRequest $request)
    {
        Product::save_new($request);
        return redirect('cms/products');
    }

    public function show($id)
    {
        self::$data['id'] = $id;
        return view('cms.delete_product', self::$data);
    }

    public function edit($id)
    {
        self::$data['product'] = Product::find($id)->toArray();
        return view('cms.edit_product', self::$data);
    }

    public function update(ProductRequest $request, $id)
    {
        Product::update_item($request, $id);
        return redirect('cms/products');
    }

    public function destroy($id)
    {
        Product::destroy($id);
        Session::flash('sm', 'המוצר נמחק בהצלחה');
        return redirect('cms/products');
    }
}
