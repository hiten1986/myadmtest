<?php 
namespace App\Kopassus\Libraries\UserInterface;

use Illuminate\Http\Request;

/**
 * Class for managing and deploying alert and notification
 * 
 * @package default
 */
class AdminAlert
{   
    private static $flashKey = 'admSellerMsg';
    private static $arrMessages = [
            'success' => [],
            'danger' => [],
            'warning' => [],
            'info' => [],
        ];

    public function __construct()
    {
        // Static::$flashKey = 'admSellerMsg';
        // Static::$arrMessages = [
        //     'success' => [],
        //     'danger' => [],
        //     'warning' => [],
        //     'info' => [],
        // ];
    }

    public static function addMessage($msg, $type)
    {
        // dd(Self::$arrMessages);
        if($type==1) Static::$arrMessages['success'][] = $msg;
        if($type==0) Static::$arrMessages['danger'][] = $msg;
        if($type==2) Static::$arrMessages['warning'][] = $msg;
        if($type==3) Static::$arrMessages['info'][] = $msg;
    }
    
    public static function storeMessage(Request $req)
    {
        $req->session()->flash(Static::$flashKey, json_encode(Static::$arrMessages));
    }

    public static function showAlert(Request $req)
    {
        if($req->session()->has(Static::$flashKey)) {
            $arrMsg = $req->session()->get(Static::$flashKey);       
            $arrMsg = json_decode($arrMsg, 1);
            return Self::renderAlert($arrMsg);
        } else {
            return null;
        }
        
    }

    private static function renderAlert($arrMsg) {
        $html = '';

        foreach (@$arrMsg['success'] as $msg) {
            $html .= <<<EOT
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                $msg
            </div>
EOT;
        }

        foreach (@$arrMsg['danger'] as $msg) {
            $html .= <<<EOT
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                $msg
            </div>
EOT;
        }

        foreach (@$arrMsg['warning'] as $msg) {
            $html .= <<<EOT
            <div class="alert alert-warning alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                $msg
            </div>
EOT;
        }

        foreach (@$arrMsg['info'] as $msg) {
            $html .= <<<EOT
        <div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            $msg
        </div>
EOT;
        }

        return $html;
    }

}
