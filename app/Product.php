<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cart;
use Wishlist;
use Session;

class Product extends Model {

    public static function search($request) {
        $search = Product::where('title', 'LIKE', '%' . $request['search'] . '%')->get(); // limit 15
        return response()->json($search);
    }

    public static function searchResults($request, &$data) {

        $get_search = Product::where('products.title', 'LIKE', '%' . $request['search'] . '%')
                ->leftjoin('categories', 'categories.id', '=', 'products.category_id')
                ->select('products.*', 'categories.title as c_title')
                ->get();
        $data['search'] = $get_search->toArray();
    }

    public static function getProducts($category_url, &$data) {
        $data['products'] = [];
        if ($category = Category::where('url', '=', $category_url)->first()) {
            $category = $category->toArray();
            $data['title'] .= $category['title'] . ' | ' . 'חנות';
            $data['category_url'] = $category_url;

            if ($products = Category::find($category['id'])->products) {
                $data['products'] = $products->toArray();
            }
        }
    }

    public static function getWishlistProducts($cartCollection, &$data) {
        $data['products'] = [];
        if ($cartCollection) {
            $cartCollection = array_keys($cartCollection->toArray());
            $products = Product::whereIn('products.id', $cartCollection)
                    ->leftjoin('categories', 'categories.id', '=', 'products.category_id')
                    ->select('products.*', 'categories.url as c_url')
                    ->get();
            $data['products'] = $products->toArray();

        }
    }

    public static function getItem($product_url, &$data) {
        $data['product'] = [];
        if ($product = Product::where('url', '=', $product_url)->first()) {
            $data['product'] = $product->toArray();
            $data['title'] .= $data['product']['title'];
        }
    }

    public static function addToCart($product_id) {
        if ($product_id && is_numeric($product_id)) {
            if ($product = self::find($product_id)) {

                $product = $product->toArray();
                if (!Cart::get($product_id)) {
                    Cart::add($product_id, $product['title'], $product['price'], 1, []); //update sizes
                    Session::flash('sm', 'נוסף לסל ' . $product['title']);
                }
            }
        }
    }

    public static function addToWishlist($product_id) {
        if ($product_id && is_numeric($product_id)) {
            if ($product = self::find($product_id)) {
                $product = $product->toArray();
                if (!Wishlist::get($product_id)) {
                    Wishlist::add($product_id, $product['title'], $product['price'], 1, []); //update sizes
                    Session::flash('sm', 'נוסף ל-Wishlist ' . $product['title']);
                }
            }
        }
    }

    public static function updateCart($request) {
        if (!empty($request['op']) && !empty($request['id'])) {
            if (is_numeric($request['id'])) {
                if ($product = Cart::get($request['id'])) {
                    if ($request['op'] == 'plus') {
                        Cart::update($request['id'], ['quantity' => 1]);
                    } elseif ($request['op'] == 'minus') {
                        $product = $product->toArray();
                        if ($product['quantity'] - 1 == 0) {
                            Cart::remove($request['id']);
                        } else {
                            Cart::update($request['id'], ['quantity' => -1]);
                        }
                    }
                }
            }
        }
    }

    public static function save_new($request) {
        $image_name = 'no-image.png';


        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $image_name = date('Y.m.d.h.i.s') . '-' . $file->getClientOriginalName();
            $request->file('image')->move(public_path() . '/images/products', $image_name);
        }

        $product = new self();
        $product->category_id = $request['category_id'];
        $product->title = $request['title'];
        $product->article = $request['article'];
        $product->price = $request['price'];
        $product->image = $image_name;
        $product->url = $request['url'];
        $product->save();
        Session::flash('sm', 'המוצר התווסף בהצלחה');
    }

    public static function update_item($request, $id) {
        $image_name = '';


        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $image_name = date('Y.m.d.h.i.s') . '-' . $file->getClientOriginalName();
            $request->file('image')->move(public_path() . '/images/products', $image_name);
        }

        $product = self::find($id);
        $product->category_id = $request['category_id'];
        $product->title = $request['title'];
        $product->article = $request['article'];
        $product->price = $request['price'];

        if ($image_name) {
            $product->image = $image_name;
        }

        $product->url = $request['url'];
        $product->save();
        Session::flash('sm', 'המוצר התעדכן בהצלחה');
    }

}