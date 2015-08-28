<?php
namespace App\Kopassus\Modules\AdminSeller\Providers;

use App;
use Config;
use Lang;
use View;
use Illuminate\Support\ServiceProvider;

class AdminSellerServiceProvider extends ServiceProvider
{
	/**
	 * Register the AdminSeller module service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// This service provider is a convenient place to register your modules
		// services in the IoC container. If you wish, you may make additional
		// methods or service providers to keep the code more focused and granular.
		App::register('App\Kopassus\Modules\AdminSeller\Providers\RouteServiceProvider');

		$this->registerNamespaces();
	}

	/**
	 * Register the AdminSeller module resource namespaces.
	 *
	 * @return void
	 */
	protected function registerNamespaces()
	{
		Lang::addNamespace('admin_seller', realpath(__DIR__.'/../Resources/Lang'));

		View::addNamespace('admin_seller', realpath(__DIR__.'/../Resources/Views'));
	}
}
