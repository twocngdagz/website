{{ '<?xml version="1.0" encoding="UTF-8"?>' }}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ route('index') }}</loc>
        @foreach($posts as $post)
        <loc>{{ route('article', $post->getSlug()) }}</loc>
        @endforeach
    </url>
</urlset>
