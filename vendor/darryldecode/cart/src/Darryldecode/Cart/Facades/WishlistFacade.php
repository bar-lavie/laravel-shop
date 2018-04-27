<?php namespace Darryldecode\Cart\Facades;

use Illuminate\Support\Facades\Facade;

class WishlistFacade extends Facade {

    protected static function getFacadeAccessor()
    {
        return 'wishlist';
    }
}