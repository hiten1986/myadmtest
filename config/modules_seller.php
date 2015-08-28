<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'baseUrl' => url(),
    'appTitle' => 'Seller Commerce Interface',
    'appDescription' => 'Seller commerce interface for MatahariBiz.com',
    'appTheme' => 'admin_seller_default',

    // Main menu structure
    'appMainMenu' => [
        // Dashboard
        [ 'url' => 'dashboard', 'label' => 'Dashboard', 'rawContent' => '<i class="fa fa-dashboard"></i> <span>Dashboard</span>' ],
        
        [ 'url' => '#', 'label' => 'Products', 'rawContent' => '<i class="fa fa-cube"></i> <span>Products</span> <i class="fa fa-angle-left pull-right"></i>',
                'childrens' => [
                    [ 'url' => 'product/list', 'label' => 'Manage Product', 'rawContent' => '<i class="fa fa-angle-double-right"></i>Manage Product' ],
                ]
            ],

        [ 'url' => '#', 'label' => 'Relations', 'rawContent' => '<i class="fa fa-bullseye"></i> <span>Relations</span> <i class="fa fa-angle-left pull-right"></i>',
                'childrens' => [
                    [ 'url' => 'relation/termofpay', 'label' => 'Manage Term of Payment', 'rawContent' => '<i class="fa fa-angle-double-right"></i>Manage Term of Payment' ],
                    [ 'url' => 'relation/termofpay', 'label' => 'Manage Favorite Buyers', 'rawContent' => '<i class="fa fa-angle-double-right"></i>Manage Favorite Buyers' ],
                ]
            ],

        [ 'url' => '#', 'label' => 'Purchase', 'rawContent' => '<i class="fa fa-shopping-cart"></i> <span>Purchase</span> <i class="fa fa-angle-left pull-right"></i>',
                'childrens' => [
                    [ 'url' => 'purchase/list', 'label' => 'Manage Orders', 'rawContent' => '<i class="fa fa-angle-double-right"></i>Manage Orders' ],
                    [ 'url' => 'purchase/report', 'label' => 'Orders Report', 'rawContent' => '<i class="fa fa-angle-double-right"></i>Orders Report' ],
                ]
            ],

        [ 'url' => '#', 'label' => 'Shipping', 'rawContent' => '<i class="fa fa-truck"></i> <span>Shipping</span> <i class="fa fa-angle-left pull-right"></i>',
                'childrens' => [
                    [ 'url' => 'shipping/list', 'label' => 'Manage Shipping Info', 'rawContent' => '<i class="fa fa-angle-double-right"></i>Manage Shipping Info' ],
                ]
            ],

        [ 'url' => '#', 'label' => 'Account', 'rawContent' => '<i class="fa fa-group"></i> <span>Account</span> <i class="fa fa-angle-left pull-right"></i>',
                'childrens' => [
                    [ 'url' => 'account/user', 'label' => 'User Info', 'rawContent' => '<i class="fa fa-angle-double-right"></i>User Info' ],
                    [ 'url' => 'account/company', 'label' => 'Company Info', 'rawContent' => '<i class="fa fa-angle-double-right"></i>Company Info' ],
                ]
            ],
    ],
];
