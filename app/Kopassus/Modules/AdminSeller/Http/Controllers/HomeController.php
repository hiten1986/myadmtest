<?php
namespace App\Kopassus\Modules\AdminSeller\Http\Controllers;

use Auth;
use Theme;
use App\Http\Controllers\Controller;

use App\Kopassus\Libraries\UserInterface\AdminNavigation;


class HomeController extends Controller
{
    protected $confName = 'modules_seller';
    protected $aryConfig;
    protected $baseUrl;
    protected $appTitle;
    protected $appDescription;
    protected $appTheme;
    protected $appMainMenu;

	public function __construct()
	{	
		// load own config
		$this->aryConfig = config($this->confName);
		$this->baseUrl = $this->aryConfig['baseUrl'];
        $this->appTitle = $this->aryConfig['appTitle'];
        $this->appDescription = $this->aryConfig['appDescription'];
        $this->appTheme = $this->aryConfig['appTheme'];
        $this->appMainMenu = $this->aryConfig['appMainMenu'];
	}

	public function index()
	{

		// Load UI plugin
		Theme::asset()->serve('morris-chart');
		
		// Theming
		$theme = Theme::uses($this->appTheme);
		$theme->partialComposer('left-side', function($view) {
			$view->with('menu', AdminNavigation::genMainMenu($this->appMainMenu));
		});

		$view = array(
            'name' => 'Teepluss',
        );
        return $theme->scope('home.index', $view)->render();
	}

}
