<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Inherit from another theme
    |--------------------------------------------------------------------------
    |
    | Set up inherit from another if the file is not exists,
    | this is work with "layouts", "partials", "views" and "widgets"
    |
    | [Notice] assets cannot inherit.
    |
    */

    'inherit' => null, //default

    /*
    |--------------------------------------------------------------------------
    | Listener from events
    |--------------------------------------------------------------------------
    |
    | You can hook a theme when event fired on activities
    | this is cool feature to set up a title, meta, default styles and scripts.
    |
    | [Notice] these event can be override by package config.
    |
    */

    'events' => array(

        // Before event inherit from package config and the theme that call before,
        // you can use this event to set meta, breadcrumb template or anything
        // you want inheriting.
        'before' => function($theme)
        {
            // You can remove this line anytime.
            $theme->setTitle('Copyright ©  2015 - MatahariBiz.com');

            // Breadcrumb template.
            // $theme->breadcrumb()->setTemplate('
            //     <ul class="breadcrumb">
            //     @foreach ($crumbs as $i => $crumb)
            //         @if ($i != (count($crumbs) - 1))
            //         <li><a href="{{ $crumb["url"] }}">{{ $crumb["label"] }}</a><span class="divider">/</span></li>
            //         @else
            //         <li class="active">{{ $crumb["label"] }}</li>
            //         @endif
            //     @endforeach
            //     </ul>
            // ');
        },

        // Listen on event before render a theme,
        // this event should call to assign some assets,
        // breadcrumb template.
        'beforeRenderTheme' => function($theme)
        {
            // You may use this event to set up your assets.
            // $theme->asset()->usePath()->add('core', 'core.js');
            // $theme->asset()->add('jquery', 'vendor/jquery/jquery.min.js');
            // $theme->asset()->add('jquery-ui', 'vendor/jqueryui/jquery-ui.min.js', array('jquery'));

            // Partial composer.
            // $theme->partialComposer('header', function($view)
            // {
            //     $view->with('auth', Auth::user());
            // });

            $theme->asset()->add('bootstrapcdn', '//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css');
            $theme->asset()->add('font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css');
            $theme->asset()->add('ionicons', '//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css');

            $theme->asset()->container('footer')->add('jquerycdn', '//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js');
            $theme->asset()->container('footer')->add('bootstrapcdn-js', '//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js');
            $theme->asset()->container('footer')->add('jqueryuicdn', '//code.jquery.com/ui/1.11.1/jquery-ui.min.js');
            $theme->asset()->container('footer')->usePath()->add('sparkline', 'js/plugins/sparkline/jquery.sparkline.min.js');
            $theme->asset()->container('footer')->usePath()->add('jq-knob-chart', 'js/plugins/jqueryKnob/jquery.knob.js');
            $theme->asset()->container('footer')->usePath()->add('icheck', 'js/plugins/iCheck/icheck.min.js');

            $theme->asset()->cook('morris-chart', function($asset) {
                $asset->usePath()->add('morris-css', 'css/morris/morris.css');
                $asset->container('footer')->add('raphael', '//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js');
                $asset->container('footer')->usePath()->add('morris-js', 'js/plugins/morris/morris.min.js');
            });

            $theme->asset()->cook('jvectormap', function($asset) {
                $asset->usePath()->add('jvectormap-css', 'css/jvectormap/jquery-jvectormap-1.2.2.css');
                $asset->container('footer')->usePath()->add('jvectormap-js', 'js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js');
                $asset->container('footer')->usePath()->add('jvectormap-worldmil-js', 'js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js');
            });

            $theme->asset()->cook('datepicker', function($asset) {
                $asset->usePath()->add('datepicker-css', 'css/datepicker/datepicker3.css');
                $asset->container('footer')->usePath()->add('datepicker-js', 'js/plugins/datepicker/bootstrap-datepicker.js');
            });

            $theme->asset()->cook('daterangepicker', function($asset) {
                $asset->usePath()->add('daterangepicker-css', 'css/daterangepicker/daterangepicker-bs3.css');
                $asset->container('footer')->usePath()->add('daterangepicker-js', 'js/plugins/daterangepicker/daterangepicker.js');
            });

            $theme->asset()->cook('bootstrap-wysihtml5', function($asset) {
                $asset->usePath()->add('bootstrap-wysihtml5-css', 'css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css');
                $asset->container('footer')->usePath()->add('bootstrap-wysihtml5-js', 'js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js');
            });

            $theme->asset()->cook('adminlte', function($asset) {
                $asset->usePath()->add('adminlte-css', 'css/AdminLTE.css');
                $asset->container('footer')->usePath()->add('adminlte-app-js', 'js/AdminLTE/app.js');
                $asset->container('footer')->usePath()->add('adminlte-dash-js', 'js/AdminLTE/dashboard.js');
                $asset->container('footer')->usePath()->add('adminlte-demo-js', 'js/AdminLTE/demo.js');
            });

            // load cooked assets
            $theme->asset()->serve('adminlte');

        },

        // Listen on event before render a layout,
        // this should call to assign style, script for a layout.
        'beforeRenderLayout' => array(

            'default' => function($theme)
            {
                // $theme->asset()->usePath()->add('ipad', 'css/layouts/ipad.css');
            }

        )

    )

);