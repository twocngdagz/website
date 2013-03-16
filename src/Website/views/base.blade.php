<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title></title>
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width" />
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
        <script type="text/javascript" src="//use.typekit.net/srt0kec.js"></script>
        <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
        <script src="{{ asset('js/vendor/modernizr-2.6.2.min.js') }}"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <div class="container">
            <header class="sidebar">
                <a href="#" class="logo"><img src="{{ asset('img/logo.png') }}" /></a>
                <nav class="main-menu">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Code Happy</a></li>
                        <li><a href="#">Code Bright</a></li>
                        <li><a href="#">Colour Schemes</a></li>
                        <li><a href="#">About</a></li>
                    </ul>
                </nav>
            </header>
            <section class="content">
                @yield('body')
            </section>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="{{ asset('js/vendor/jquery-1.9.0.min.js') }}"><\/script>')</script>
        <script src="{{ asset('js/plugins.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>

        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
