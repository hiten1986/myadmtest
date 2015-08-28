<?php
namespace App\Kopassus\Libraries\BigApi\Seller;

use Illuminate\Http\Request;
use App\Kopassus\Libraries\BigApi\BigAPI;

class Dashboard extends BigAPI
{

    public function __construct() { }
    
    public static function getTotal() {
        return [
            'product_listed' => 1500,
            'product_sold' => 750,
            'product_outstock' => 20,
            'order_amount_paid' => 20000000,
            'order_amount_pending_paid' => 1500000,
            'order_amount_cancel' => 0,
        ];
    }

}
