{{'<?'}}xml version="1.0" encoding="utf-8"?>
<rss version="2.0"  xmlns:atom="http://www.w3.org/2005/Atom">
    <channel>
        <title>Dayle Rees</title>
        <link>http://daylerees.com/</link>
        <description>A collection of articles about web development and design and a number of tools to make our lives as developers easier.</description>
        <lastBuildDate>{{ date(DateTime::RSS) }}</lastBuildDate>
        <language>en-gb</language>
        <atom:link href="http://daylerees.com/rss.xml" rel="self" type="application/rss+xml" />

        @foreach($posts as $post)
        <item>
            <title>{{ $post->getTitle() }}</title>
            <link>{{ route('article', $post->getSlug()) }}</link>
            <guid>{{ route('article', $post->getSlug()) }}</guid>
            <pubDate>{{ $post->getFormattedDate(DateTime::RSS) }}</pubDate>
            <description><![CDATA[ {{ $post->getHtml() }} ]]></description>
        </item>
        @endforeach
    </channel>
</rss>
