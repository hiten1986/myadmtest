<?php
namespace App\Kopassus\Modules\AdminSeller\Http\Controllers;

use Auth;
use Theme;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Kopassus\Libraries\UserInterface\AdminAlert;

class AuthenticationController extends Controller
{
	protected $confName = 'modules_seller';
	protected $aryConfig;
    protected $baseUrl;
    protected $appTitle;
    protected $appDescription;
    protected $appTheme;

    public function __construct()
    {
    	// load own config
		$this->aryConfig = config($this->confName);
		$this->baseUrl = $this->aryConfig['baseUrl'];
        $this->appTitle = $this->aryConfig['appTitle'];
        $this->appDescription = $this->aryConfig['appDescription'];
        $this->appTheme = $this->aryConfig['appTheme'];
    }

    /**
     * Login
     **/
	public function index(Request $req)
	{	
		if($req->input()) {

			// Set alert and store as Flash session
			AdminAlert::addMessage('Ini sukses', 1);
			AdminAlert::addMessage('Ini sukses ke - 2', 1);
			AdminAlert::addMessage('Ini danger', 0);
			AdminAlert::addMessage('Ini warning', 2);
			AdminAlert::addMessage('Ini info', 3);
			AdminAlert::storeMessage($req);

		}

		// Load UI plugin
		Theme::asset()->serve('icheck');
		$theme = Theme::uses('admin_seller_default')->layout('login');

		$view = array(
			'alerts' => AdminAlert::showAlert($req),
			'app_title' => 'Seller Interface',
            'loginUrl' => sprintf("%s/login", $this->baseUrl),
        );

        return $theme->scope('authentication.login', $view)->render();
	}

}
