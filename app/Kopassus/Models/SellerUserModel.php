<?php 

namespace App\Kopassus\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client;

use Exception;

class SellerUserModel extends Model
{
    // protected $table = 'seller_users';
    // protected $fillable = ['username', 'email', 'password', 'salt', 'fullname', 'phone', 'mobile_phone', 'active', 'deleted', 'seller_companies_id'];
    // protected $guarded = ['username', 'email'];
    
    // public static $searchable = [ 'username', 'email', 'fullname' ];

    protected static $sellerSvcUrl = 'http://seller.service.kopassus.kom';

    public function __construct() {

    }

    public static function doLogin($identifier, $pass, $rememberMe=0, $using='email') {
    	
    	$data = [
		    'username' => $identifier, 'email' => $identifier, 'password' => $pass, 'using' => $using, 'remember' => $rememberMe
		];
		
    	$guzzle = new Client();
    	$response = $guzzle->post(Self::$sellerSvcUrl . '/login',[ 
    		'form_params' => $data
    	]);
    	$result = json_decode($response->getBody()->getContents());
		
		return Self::validateResp($result);
    }

    public static function doLogout($sessionId) {
    	$guzzle = new Client();
    	$response = $guzzle->get(Self::$sellerSvcUrl . '/logout/' . $sessionId);
    	$result = json_decode($response->getBody()->getContents());
		
		return Self::validateResp($result);
    }

    public static function doCheckLogin($sessionId) {
    	$guzzle = new Client();
    	$response = $guzzle->get(Self::$sellerSvcUrl . '/login/check/' . $sessionId);
    	$result = json_decode($response->getBody()->getContents());
		
		return Self::validateResp($result);
    }

    public static function getUser($by='id', $identifier) {
    	if($by == 'id') {
    		$url = Self::$sellerSvcUrl . '/get/' . $identifier;
    	} elseif($by == 'username') {
    		$url = Self::$sellerSvcUrl . '/get/username/' . $identifier;
    	} elseif($by == 'email') {
    		$url = Self::$sellerSvcUrl . '/get/email/' . urlencode($identifier);
    	}

    	$response = $guzzle->get($url);
    	$result = json_decode($response->getBody()->getContents());
		
		return Self::validateResp($result);
    }

    public static function getUsers($page=1, $search=null) {
    	$response = $guzzle->get($url, [
    			'query' => [ 
    				'p' => $page, 'q' => $search
    			]
    		]);
    	$result = json_decode($response->getBody()->getContents());

    	return Self::validateResp($result);
    }

    public static function doRegisterSeller($arData) {}

    public static function doUpdateSeller($arData, $id) {
    	$guzzle = new Client();
    	$response = $guzzle->post(Self::$sellerSvcUrl . '/modify/' . $id,[ 
    		'form_params' => $arData
    	]);
    	$result = json_decode($response->getBody()->getContents());
		
		return Self::validateResp($result);
    }

    private static function validateResp($result) {
    	if(!isset($result->errors)) {
    		return [ 'status' => true, 'result' => $result ];
    	} else {
    		return [ 'status' => false, 'result' => $result ];
    	}
    }

}
