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
    'appTitle' => 'Buyers Commerce Interface',
    'appDescription' => 'Buyers commerce interface for MatahariBiz.com',
    'appTheme' => 'admin_buyer_default',

    // Main menu structure
    'appMainMenu' => [
        // Dashboard
        [ 'url' => 'dashboard', 'label' => 'Dashboard', 'rawContent' => '<i class="fa fa-dashboard"></i> <span>Dashboard</span>' ],

        [ 'url' => '#', 'label' => 'Purchase', 'rawContent' => '<i class="fa fa-shopping-cart"></i> <span>Purchase</span> <i class="fa fa-angle-left pull-right"></i>',
                'childrens' => [
                    [ 'url' => 'purchase/list', 'label' => 'Manage Orders', 'rawContent' => '<i class="fa fa-angle-double-right"></i>Manage Orders' ],
                    [ 'url' => 'purchase/report', 'label' => 'Orders Report', 'rawContent' => '<i class="fa fa-angle-double-right"></i>Orders Report' ],
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
