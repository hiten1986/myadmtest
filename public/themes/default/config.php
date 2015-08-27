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

            // COOKED ASSETS

            $theme->asset()->cook('morris-chart', function($asset) {
                $asset->add('morris-css', 'bower_components/admin-lte/plugins/morris/morris.css');
                $asset->container('footer')->add('raphael', '//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js');
                $asset->container('footer')->add('morris-js', 'bower_components/admin-lte/plugins/morris/morris.min.js');
            });

            $theme->asset()->cook('jvectormap', function($asset) {
                $asset->add('jvectormap-css', 'bower_components/admin-lte/plugins/jvectormap/jquery-jvectormap-1.2.2.css');
                $asset->container('footer')->add('jvectormap-js', 'bower_components/admin-lte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js');
                $asset->container('footer')->add('jvectormap-worldmil-js', 'bower_components/admin-lte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js');
            });

            $theme->asset()->cook('datepicker', function($asset) {
                $asset->add('datepicker-css', 'bower_components/admin-lte/plugins/datepicker/datepicker3.css');
                $asset->container('footer')->add('datepicker-js', 'bower_components/admin-lte/plugins/datepicker/bootstrap-datepicker.js');
            });

            $theme->asset()->cook('daterangepicker', function($asset) {
                $asset->usePath()->add('daterangepicker-css', 'bower_components/admin-lte/plugins/daterangepicker/daterangepicker-bs3.css');
                $asset->container('footer')->add('moment-js', '//cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js');
                $asset->container('footer')->add('daterangepicker-js', 'bower_components/admin-lte/plugins/daterangepicker/daterangepicker.js');
            });

            $theme->asset()->cook('bootstrap-wysihtml5', function($asset) {
                $asset->usePath()->add('bootstrap-wysihtml5-css', 'bower_components/admin-lte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css');
                $asset->container('footer')->add('bootstrap-wysihtml5-js', 'bower_components/admin-lte/plugins/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js');
            });

            $theme->asset()->cook('adminlte', function($asset) {
                $asset->add('adminlte-css', 'bower_components/admin-lte/dist/css/AdminLTE.min.css');
                $asset->add('adminlte-skin-css', 'bower_components/admin-lte/dist/css/skins/_all-skins.min.css');
                $asset->container('footer')->add('adminlte-app-js', 'bower_components/admin-lte/dist/js/app.min.js');
            });

            $theme->asset()->cook('adminlte-demo', function($asset) {
                $asset->container('footer')->add('adminlte-dash-js', 'bower_components/admin-lte/dist/js/pages/dashboard.js');
                $asset->container('footer')->add('adminlte-demo-js', 'bower_components/admin-lte/dist/js/demo.js');
            });

            $theme->asset()->cook('icheck', function($asset) {
                $asset->add('icheck-css', 'bower_components/admin-lte/plugins/iCheck/square/blue.css');
                $asset->container('footer')->add('icheck-js', 'bower_components/admin-lte/plugins/iCheck/icheck.min.js');
                $asset->container('footer')->writeContent('icheck-custom-js', '
                    <script>
                      $(function () {
                        $("input").iCheck({
                          checkboxClass: "icheckbox_square-blue",
                          radioClass: "iradio_square-blue",
                          increaseArea: "20%" // optional
                        });
                      });
                    </script>
                ');
            });

            // LOAD ASSETS

            $theme->asset()->add('bootstrapcdn', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css');
            $theme->asset()->add('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css');
            $theme->asset()->add('ionicons', '//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css');

            $theme->asset()->container('footer')->add('jquerycdn', '//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js');
            $theme->asset()->container('footer')->add('jqueryuicdn', '//code.jquery.com/ui/1.11.4/jquery-ui.min.js');
            $theme->asset()->container('footer')->add('bootstrapcdn-js', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js');
            $theme->asset()->container('footer')->add('sparkline', 'bower_components/admin-lte/plugins/sparkline/jquery.sparkline.min.js');
            $theme->asset()->container('footer')->add('jq-knob-chart', 'bower_components/admin-lte/plugins/knob/jquery.knob.js');

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