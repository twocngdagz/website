@extends('base')

@section('body')
    <section class="posts index">
            <article>
                <h1><a href="{{ route('about') }}" title="About Dayle Rees">About Dayle Rees</a></h1>
                <section class="body">
                    <span class="meta"></span>
                    <p>Dayle Rees is a web developer and design enthusiast from Cardiff in Wales, United Kingdom.</p>
                    <p><img src="/img/dayle_big.jpg" alt="Dayle Rees"></p>

                </section>
                <a href="{{ route('index') }}" title="Back to the DayleRees.com home page." class="back-link">&larr; Back to index.</a>
            </article>
    </section>
@stop
