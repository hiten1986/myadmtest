<?php

namespace App\Http\Controllers;

use Theme;
use App\Kopassus\Libraries\UserInterface\AdminNavigation;

// Load modules
use App\Kopassus\Modules\Dashboard;

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

		// Dashboard

		$view = array(
            'name' => 'Teepluss',
        );
        return $theme->scope('home.index', $view)->render();
	}

}
