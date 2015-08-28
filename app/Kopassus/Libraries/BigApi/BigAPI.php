<?php 

namespace App\Kopassus\Libraries\BigApi;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

/**
 * SDK 
 * @package default
 */
class BigAPI
{   

    protected static $clientId;                // ID for client
    protected static $clientKey;               // KEY for client. DO NOT transfer this transparently
    protected static $clientHash;              // Client hashed key

    protected static $apiUrl;
    protected static $prodUrl = 'https://somewhereelse.kom';
    protected static $stagingUrl = 'https://staging.somewhereelse.kom';
    protected static $develUrl = 'https://devel.somewhereelse.kom';

    protected static $envMode;              // 'dev', 'stg', 'prod' FOR devel, staging, production
    protected static $http;                 // HTTP client
    protected static $sessKey = 'apiconn';              // Key for session/cookie token

    public function __construct($cid, $ckey, $chash, $envMode)
    {   
        // Client need to set this up
        Self::$clientId = $cid;
        Self::$clientKey = $ckey;
        Self::$clientHash = $chash;

        if($envMode == 'dev') {
            Self::$apiUrl = Self::$develUrl;
        } else if($envMode == 'stg') {
            Self::$apiUrl = Self::$stagingUrl;
        } else if($envMode == 'prod') {
            Self::$apiUrl = Self::$prodUrl;
        }

        // Http client init
        Self::$http = new Client();
    }
    
    /**
     * - First connect to Big API to get a vaild token
     * - Save token on cache
     * @return type
     */
    public static function connect(Request $req) {
        $url = Self::$apiUrl . '/connect';
        $post = [
            'cid' => Self::$clientId, 'hash' => Self::$clientHash
        ];

        $response = Self::$http->post($url, [ 
            'form_params' => $post
        ]);
        $result = json_decode($response->getBody()->getContents());
        
        if($resp = Self::validateResp($result)) {
            if($resp['status']) {
                // ToDo : save token
                Self::saveToken($req, $resp['status']->token);
                return true;
            } else { return false; }
        } else {
            return false;
        }
    }

    /**
     * Get saved Token
     * @return type
     */
    public static function getToken(Request $req) {
        // return $req->session()->get(Self::$sessKey);
        return md5('prekitiew');
    }


    /**********************
     * PRVATE
     **********************/

    /**
     * Generate valid client Hash key to compared with $clientHash setup on Client Side
     * Formula for hash are :
     * SHA1( clienID + clientKey + md5(clienID + clientKey) )
     * @return string       Valid client hash
     */
    private static function genClientHash()
    {   
        $formula = sprintf("%s%s%s", Self::$clientId, Self::$clientKey, md5(Self::$clientId . Self::$clientKey));
        $validHash = sha1($formula);

        return $validHash;
    }

    private static function saveToken(Request $req, $token) {
        $req->session()->put(Self::$sessKey, $token);
    }

    private static function validateResp($result) {
        if(!isset($result->errors)) {
            return [ 'status' => true, 'result' => $result ];
        } else {
            return [ 'status' => false, 'result' => $result ];
        }
    }

}
