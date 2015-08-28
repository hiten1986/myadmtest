<?php 

namespace App\Kopassus\Libraries\UserInterface;

// Depedency : "vespakoen/menu": "3.*"
use Menu\Menu;

class AdminNavigation
{   
    private static $arrMainMenu;

    public function __construct()
    {
        
    }

    private static function setMenu($aryMenu)
    {
        Static::$arrMainMenu = $aryMenu;
       
        /*Static::$arrMainMenu = [
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
        ];*/
    }
    
    public static function genMainMenu($aryMenu)
    {
        Self::setMenu($aryMenu);
        $aryMenu = Static::$arrMainMenu;

        $menu = Menu::handler('mainmenu');

        foreach ($aryMenu as $lv1) {
            if(isset($lv1['childrens']) && !empty($lv1['childrens']) && is_array($lv1['childrens'])) {
                // With level 2
                $menuItems = Menu::items();
                foreach ($lv1['childrens'] as $lv2) {
                    $menuItems->add($lv2['url'], $lv2['rawContent']);
                }
                $menu->add($lv1['url'], $lv1['rawContent'], $menuItems, null, [ 'class' => 'treeview' ]);
            } else {
                $menu->add($lv1['url'], $lv1['rawContent']);
            }
        }

        /*$menu->add('dashboard', '<i class="fa fa-dashboard"></i> <span>Dashboard</span>')
            ->add('contacts', '<i class="fa fa-dashboard"></i> <span>Contact</span> <small class="badge pull-right bg-yellow">12</small>')
            ->add('#', '<i class="fa fa-calendar"></i> <span>Parent</span> <i class="fa fa-angle-left pull-right"></i>', Menu::items()
                    // ->prefixParents()
                    ->add('#', '<i class="fa fa-angle-double-right"></i>Menu 1')
                    ->add('#', '<i class="fa fa-angle-double-right"></i>Menu 2')
                    ->add('#', '<i class="fa fa-angle-double-right"></i>Menu 3')
                , null, [ 'class' => "treeview" ]
            )
            // ->raw(null, null, ['class' => 'divider'])
            ->add('inbox', '<i class="fa fa-envelope"></i> <span>Inbox</span>');*/

        //styling
        $menu->addClass('sidebar-menu')
            ->getAllItemLists()
                ->map(function($item) {
                    if ( $item->isActive() ) {
                        $item->addClass('active');
                    }
                    if($item->hasChildren()) {
                        $item->addClass('treeview-menu');
                    }
                });

        return $menu;
    }

}
