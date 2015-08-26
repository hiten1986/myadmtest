<?php 

namespace App\Kopassus\Modules\Dashboard;

class Dashboard
{   
    private static $arrMainMenu;

    public function __construct()
    {
        
    }

    public static function getTotalCountProductItem($type)
    {
    	switch ($type) {
    		case 'listed':
    			return 12345;
    			break;
    		
    		case 'sold':
    			return 323;
    			break;

    		case 'outofstock':
    			return 23;
    			break;

    		default:
    			return false;
    			break;
    	}
    }

    public static function getTotalCountOrder($type)
    {
    	switch ($type) {
    		case 'paid':
    			return 7800;
    			break;
    		
    		case 'pending':
    			return 1200;
    			break;

    		case 'cancel':
    			return 50;
    			break;

    		default:
    			return false;
    			break;
    	}
    }

    public static function getTotalCountTopBuyer()
    {
    	return 5;
    }
}
