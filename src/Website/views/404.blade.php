@extends('base')

@section('body')
    <section class="posts index">
            <article>
                <h1><a href="{{ route('index') }}" title="404: Page Not Found!">404: Page Not Found!</a></h1>
                <section class="body">
                    <span class="meta"></span>
                    <p>Normally you would find something funny here, but instead I chose to focus on getting this new site out fast.</p>
                    <p>If you are looking for my Laravel tutorials you will <a href="http://codehappy.daylerees.com" title="Code Happy">find them here</a>.</p>
                </section>
                <a href="{{ route('index') }}" title="DayleRees.com home page." class="back-link">&larr; Why not try the home page?</a>
            </article>
    </section>
@stop
