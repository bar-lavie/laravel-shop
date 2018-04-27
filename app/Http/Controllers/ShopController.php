<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Cart;
use Wishlist;
use Session;
use App\Order;

class ShopController extends MainController {

    public function search(Request $request) {
        return Product::search($request);
    }

    public function searchResults(Request $request) {
        self::$data['title'] .= 'חיפוש מוצרים';
        Product::searchResults($request, self::$data);
        //dd(self::$data);
        return view('content.results', self::$data);
    }

    public function categories() {
        self::$data['title'] .= 'חנות';
        self::$data['categories'] = Category::all()->toArray();
        return view('content.categories', self::$data);
    }

    public function products($category_url) {
        Product::getProducts($category_url, self::$data);
        return view('content.products', self::$data);
    }

    public function item($category_url, $product_url) {
        Product::getItem($product_url, self::$data);
        return view('content.item', self::$data);
    }

    public function addToCart(Request $request) {
        Product::addToCart($request['id']);
    }

    public function addToWishlist(Request $request) {
        Product::addToWishlist($request['id']);
    }

    public function checkout() {
        $cartCollection = Cart::getContent();
        $cart = $cartCollection->toArray();
        sort($cart);
        self::$data['cart'] = $cart;
        self::$data['title'] .= 'עגלה';
        return view('content.checkout', self::$data);
    }

    public function wishlist() {
        $cartCollection = Wishlist::getContent();
        Product::getWishlistProducts($cartCollection, self::$data);
        self::$data['title'] .= 'Wishlist';
        return view('content.wishlist', self::$data);
    }

    public function clearCart() {
        Cart::clear();
        return redirect('shop/checkout');
    }
    public function clearWishlist() {
        Wishlist::clear();
        return redirect('shop/wishlist');
    }
    public function removeItem(Request $request) {
        Cart::remove($request['id']);
        return redirect('shop/checkout');
    }

    public function updateCart(Request $request) {
        Product::updateCart($request);
        return redirect('shop/checkout');
    }

    public function order() {
        if (Cart::isEmpty()) {
            return redirect('shop/checkout');
        } else {
            if (!Session::has('user_id')) {
                Session::flash('sm-info', 'על מנת לבצע הזמנה יש להתחבר/להירשם לאתר');
                return redirect()->back();
            } else {
                Order::save_new();
                return redirect('shop');
            }
        }
    }

}