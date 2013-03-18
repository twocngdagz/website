@extends('base')

@section('body')
    <section class="posts index">
        @foreach($posts as $post)
            <article>
                <h1><a href="{{ route('article', $post->getSlug()) }}" title="{{ $post->getTitle() }}">{{ $post->getTitle() }}</a></h1>
                <span class="meta">Posted on the {{ $post->getFormattedDate('d/m/y') }}.</span>
                <section class="body">{{ $post->getExcerpt() }}</section>
                <a href="{{ route('article', $post->getSlug()) }}" title="{{ $post->getTitle() }}" class="read-more">Read more &rarr;</a>
            </article>
        @endforeach
        {{ $posts->links() }}
    </section>
@stop
