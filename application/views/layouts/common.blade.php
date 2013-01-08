<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>
        @section('title')
            Laravel :: 
        @yield_section
    </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    @yield('styles')
    @yield('scripts')


    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->


</head>

<body>
    <section id="upper-bar">
            <div class="left-bar">
                <h1>Blackhole</h1>
                <h3>Si te lo querés sacar de encima, tiralo acá</h3>
            </div>  <!-- Fin .left-bar -->

            <div class="right-bar">
                @section('right-bar')

                @yield_section
            </div>  <!-- Fin .right-bar -->

    </section>  <!-- Fin #upper-bar -->

    <div id="overlay">&nbsp;</div>
    
    <div class="wrapped">
        <section id="content">
            @yield('content')
        </section>  <!-- Fin #content -->

        <section id="sidebar">
            @yield('sidebar')
        </section>  <!-- Fin #sidebar -->
    </div>  <!-- Fin .wrapped -->

    <section id="footer">
        @section('footer')
        
        @yield_section
    </section>  <!-- Fin #footer -->
</body>

</html>
