<?php
namespace App\Kopassus\Modules\AdminSeller\Http\Controllers;

use Auth;
use Theme;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Kopassus\Libraries\UserInterface\AdminNavigation;
use App\Kopassus\Libraries\BigApi\Seller\Dashboard;


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

	public function index(Request $req)
	{

		// Load UI plugin
		Theme::asset()->serve('morris-chart');
		
		// Theming
		$theme = Theme::uses($this->appTheme);
		$theme->partialComposer('left-side', function($view) {
			$view->with('menu', AdminNavigation::genMainMenu($this->appMainMenu));
		});

		$widgetTotal = Dashboard::getTotal();

		$view = array(
			'pageTitle' => 'Dashboard',
			'pageDesc' => '',
            'widget' => [
            	'totalbox' => $widgetTotal,
            ],
        );
        return $theme->scope('home.index', $view)->render();
	}

}
