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

    private static function setMenu()
    {
        Static::$arrMainMenu = [
            [ 'url' => 'dashboard', 'label' => 'Dashboard', 'rawContent' => '<i class="fa fa-dashboard"></i> <span>Dashboard</span>' ],
            [ 'url' => 'contacts', 'label' => 'Contact', 'rawContent' => '<i class="fa fa-dashboard"></i> <span>Contact</span> <small class="badge pull-right bg-yellow">12</small>' ],
            [ 'url' => '#', 'label' => 'Parent', 'rawContent' => '<i class="fa fa-calendar"></i> <span>Parent</span> <i class="fa fa-angle-left pull-right"></i>',
                    'childrens' => [
                        [ 'url' => '#', 'label' => 'Menu 1', 'rawContent' => '<i class="fa fa-angle-double-right"></i>Menu 1' ],
                        [ 'url' => '#', 'label' => 'Menu 2', 'rawContent' => '<i class="fa fa-angle-double-right"></i>Menu 2' ],
                        [ 'url' => '#', 'label' => 'Menu 3', 'rawContent' => '<i class="fa fa-angle-double-right"></i>Menu 3' ],
                    ]
                ],
            [ 'url' => 'inbox', 'label' => 'Inbox', 'rawContent' => '<i class="fa fa-envelope"></i> <span>Inbox</span>' ],
        ];
    }
    
    public static function genMainMenu()
    {
        Self::setMenu();
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
