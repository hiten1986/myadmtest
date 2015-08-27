<?php
namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Auth;
use Theme;

use App\Kopassus\Libraries\UserInterface\AdminNavigation;

// Load modules
use App\Kopassus\Modules\Dashboard;
use App\Kopassus\Models\SellerUserModel as SellerUser;

class HomeController extends Controller
{
    
	public function index()
	{
		// Load UI plugin
		Theme::asset()->serve('morris-chart');
		
		// Theming
		$theme = Theme::uses('default');
		$theme->partialComposer('left-side', function($view) {
			$view->with('menu', AdminNavigation::genMainMenu());
		});

		$view = array(
            'name' => 'Teepluss',
        );
        return $theme->scope('home.index', $view)->render();
	}

}
