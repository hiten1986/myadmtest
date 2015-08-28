<?php
namespace App\Kopassus\Modules\AdminBuyer\Providers;

use App;
use Config;
use Lang;
use View;
use Illuminate\Support\ServiceProvider;

class AdminBuyerServiceProvider extends ServiceProvider
{
	/**
	 * Register the AdminBuyer module service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// This service provider is a convenient place to register your modules
		// services in the IoC container. If you wish, you may make additional
		// methods or service providers to keep the code more focused and granular.
		App::register('App\Kopassus\Modules\AdminBuyer\Providers\RouteServiceProvider');

		$this->registerNamespaces();
	}

	/**
	 * Register the AdminBuyer module resource namespaces.
	 *
	 * @return void
	 */
	protected function registerNamespaces()
	{
		Lang::addNamespace('admin_buyer', realpath(__DIR__.'/../Resources/Lang'));

		View::addNamespace('admin_buyer', realpath(__DIR__.'/../Resources/Views'));
	}
}
