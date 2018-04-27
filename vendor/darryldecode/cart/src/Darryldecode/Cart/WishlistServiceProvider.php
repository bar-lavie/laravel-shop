<?php namespace Darryldecode\Cart;

use Illuminate\Support\ServiceProvider;

class WishlistServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Boot the service provider.
	 */
	public function boot()
	{
		if (function_exists('config_path')) {
			$this->publishes([
				__DIR__.'/config/config.php' => config_path('shopping_cart.php'),
			], 'config');
		}
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->mergeConfigFrom(__DIR__.'/config/config.php', 'shopping_cart');

		$this->app->singleton('wishlist', function($app)
		{
			$storage = $app['session'];
			$events = $app['events'];
			$instanceName = 'wishlist';
			$session_key = '88uuiioo99888';

			return new Wishlist(
				$storage,
				$events,
				$instanceName,
				$session_key,
				config('shopping_cart')
			);
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}
}
