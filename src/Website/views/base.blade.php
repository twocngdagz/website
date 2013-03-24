<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>{{ $title }} | Dayle Rees</title>
        <meta name="description" content="{{ $description }}" />
        <meta name="keywords" content="dayle,rees,php,laravel,framework,code,happy,bright" />
        <meta name="viewport" content="width=device-width" />
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
        <script type="text/javascript" src="//use.typekit.net/srt0kec.js" onload="try{Typekit.load();}catch(e){}" async></script>
        <script src="{{ asset('js/vendor/modernizr-2.6.2.min.js') }}"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <div class="container">
            <header class="sidebar">
                <a href="{{ route('index') }}" title="Dayle Rees" class="logo"><img src="{{ asset('img/logo.png') }}" /></a>
                <a href="{{ route('about') }}" title="Code Happy for the Laravel PHP Framework" class="ad-link">
                    <img src="{{ asset('img/dayle.gif') }}" alt="Dayle Rees">
                    <span class="caption">Dayle Rees is a british developer and design enthusiast. Find out more..</span>
                </a>
                <a href="http://leanpub.com/codehappy" title="Code Happy for the Laravel PHP Framework" class="ad-link">
                    <img src="{{ asset('img/codehappyad.jpg') }}" alt="Code Happy">
                    <span class="caption">Code Happy, the number one resource for learning the Laravel PHP framework.</span>
                </a>
                <a href="https://github.com/daylerees/colour-schemes" title="Dayle Rees Colour Schemes for Sublime Text 2 and more." class="ad-link">
                    <img src="{{ asset('img/colourschemesad.jpg') }}" alt="Dayle Rees Colour Schemes">
                    <span class="caption">A collection of unique colour schemes for Sublime Text 2 and more.</span>
                </a>
                <span class="copyright">Copyright &copy; {{ date('Y') }}<br />Dayle Rees.</span>
            </header>
            <section class="content">
                @yield('body')
            </section>
            <div class="clearfix"></div>
        </div>


        <script src="{{ asset('js/main.min.js') }}"></script>
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
