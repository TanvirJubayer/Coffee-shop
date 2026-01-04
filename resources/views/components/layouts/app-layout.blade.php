<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->

<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>Remos eCommerce Admin Dashboard HTML Template</title>

    <meta name="author" content="themesflat.com">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css') }}/animate.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css') }}/animation.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css') }}/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css') }}/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css') }}/style.css">



    <!-- Font -->
    <link rel="stylesheet" href="{{ asset('font') }}/fonts.css">

    <!-- Icon -->
    <link rel="stylesheet" href="{{ asset('icon') }}/style.css">

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="{{ asset('images') }}/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('images') }}/favicon.png">

</head>

<body class="body">

    <!-- #wrapper -->
    <div id="wrapper">
        <!-- #page -->
        <div id="page" class="">
            <!-- layout-wrap -->
            <div class="layout-wrap">
                <x-partials.preloader/>
                <x-partials.sidebar/>
                <!-- section-content-right -->
                <div class="section-content-right">
                    <x-partials.header/>
                    <!-- main-content -->
                    <div class="main-content">
                        <!-- main-content-wrap -->
                        <div class="main-content-inner">
                            {{$slot}}
                        </div>
                        <!-- /main-content-wrap -->
                        <x-partials.footer/>

                    </div>
                    <!-- /main-content -->
                </div>
                <!-- /section-content-right -->
            </div>
            <!-- /layout-wrap -->
        </div>
        <!-- /#page -->
    </div>
    <!-- /#wrapper -->

    <!-- Javascript -->
    <script src="{{ asset('js') }}/jquery.min.js"></script>
    <script src="{{ asset('js') }}/bootstrap.min.js"></script>
    <script src="{{ asset('js') }}/bootstrap-select.min.js"></script>
    <script src="{{ asset('js') }}/zoom.js"></script>
    <script src="{{ asset('js') }}/apexcharts/apexcharts.js"></script>
    <script src="{{ asset('js') }}/apexcharts/line-chart-1.js"></script>
    <script src="{{ asset('js') }}/apexcharts/line-chart-2.js"></script>
    <script src="{{ asset('js') }}/apexcharts/line-chart-3.js"></script>
    <script src="{{ asset('js') }}/apexcharts/line-chart-4.js"></script>
    <script src="{{ asset('js') }}/apexcharts/line-chart-5.js"></script>
    <script src="{{ asset('js') }}/apexcharts/line-chart-6.js"></script>
    <script src="{{ asset('js') }}/switcher.js"></script>
    <script src="{{ asset('js') }}/theme-settings.js"></script>
    <script src="{{ asset('js') }}/main.js"></script>

</body>

</html>
