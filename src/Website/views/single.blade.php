@extends('base')

@section('body')
    <section class="posts">
        <article>
            <h1><a href="{{ route('article', $post->getSlug()) }}" title="{{ $post->getTitle() }}">{{ $post->getTitle() }}</a></h1>
            <span class="meta">Posted on the 24th of December 1984.</span>
            <section class="body">{{ $post->getHtml() }}</section>
            <a href="{{ route('index') }}" class="back-link">&larr; Back to index.</a>
        </article>
    </section>
@stop
