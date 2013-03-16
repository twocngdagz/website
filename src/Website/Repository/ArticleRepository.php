<?php

namespace Website\Repository;

use Website\Model\Article;
use Website\Reader\ArticleReader;
use Config;
use Cache;

class ArticleRepository
{
    /**
     * Path to the markdown documents.
     *
     * @var string
     */
    private $path;

    /**
     * The duration to cache the article index in minutes.
     *
     * @var int
     */
    private $cacheDuration;

    /**
     * Set the markdown content path.
     */
    public function __construct()
    {
        $this->path = Config::get('website.content', '/');
        $this->cacheDuration = Config::get('website.cache', 30);
    }

    /**
     * Retrieve an array of all articles.
     *
     * @return array
     */
    public function findAll()
    {
        $articles = Cache::get('website.index');
        if (is_null($articles)) $articles = $this->buildCache();
        return $articles;
    }

    /**
     * Find an article by its slug.
     *
     * @param  string $slug
     * @return Article
     */
    public function findBySlug($slug)
    {
        if (is_null(Cache::get('website.index'))) $this->buildCache();
        return Cache::get($slug, false);
    }

    /**
     * Build the cache of articles.
     *
     * @return array
     */
    public function buildCache()
    {
        $articleReader = new ArticleReader($this->path);
        $articles = $articleReader->read();
        Cache::put('website.index', $articles, $this->cacheDuration);
        $this->buildIndividualCache($articles);
        return $articles;
    }

    /**
     * Cache individual articles by slug.
     *
     * @param  array $articles
     * @return void
     */
    public function buildIndividualCache($articles)
    {
        foreach ($articles as $article) {
            Cache::forever($article->getSlug(), $article);
        }
    }
}
