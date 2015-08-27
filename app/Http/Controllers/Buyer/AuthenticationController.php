<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\Controller;
use Auth;
use Theme;
use Illuminate\Http\Request;

use App\Kopassus\Libraries\UserInterface\AdminAlert;

// Load modules
use App\Kopassus\Models\SellerUserModel as SellerUser;

class AuthenticationController extends Controller
{
    
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
		$theme = Theme::uses('default')->layout('login');

		$view = array(
			'alerts' => AdminAlert::showAlert($req),
			'app_title' => 'Buyer Interface',
            'loginUrl' => sprintf("%s/login", config('app.url')),
        );

        return $theme->scope('authentication.login', $view)->render();
	}

}
