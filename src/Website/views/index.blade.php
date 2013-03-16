@foreach($posts as $post)
    <h1><a href="{{ route('article', $post->getSlug()) }}">{{ $post->getTitle() }}</a></h1>
    {{ $post->getHtml() }}
@endforeach
