<?php

namespace Website\Reader;

use File;
use Website\Factory\ArticleFactory;
use Kurenai\DocumentParser;

class ArticleReader
{
    /**
     * The path to our markdown articles.
     *
     * @var string
     */
    private $path;

    /**
     * Create a new instance of the reader using a path.
     *
     * @param string
     */
    public function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * Read a collection of articles from the path.
     *
     * @return array
     */
    public function read()
    {
        $files = $this->scanDirectory($this->path);
        $sources = $this->loadArticleSources($files);
        $documents = $this->parseDocuments($sources);

        $articleFactory = new ArticleFactory();
        $articles = $articleFactory->buildArticleCollection($documents);
        $this->sortArticles($articles);
        return $articles;
    }

    /**
     * Scan a directory for markdown documents.
     *
     * @return array
     */
    public function scanDirectory($path)
    {
        return glob($path.'/*.md');
    }

    /**
     * Load article sources from files array.
     *
     * @param  array $files
     * @return array
     */
    public function loadArticleSources(array $files)
    {
        $sources = array();
        foreach ($files as $file) {
            try {
                $sources[] = File::get($file);
            }
            catch (\Exception $e) {
                continue;
                // TODO: Log file could not be opened.
            }
        }
        return $sources;
    }

    /**
     * Parse markdown sources into Kurenai documents.
     *
     * @param  array  $sources
     * @return array
     */
    public function parseDocuments(array $sources)
    {
        $documents = array();
        $documentParser = new DocumentParser();
        foreach ($sources as $source) {
            try {
                if ($document = $documentParser->parse($source))
                    $documents[] = $document;
            }
            catch (\Exception $e) {
                continue;
                // TODO: Log article could not be parsed.
            }
        }
        return $documents;
    }

    public function sortArticles(array &$articles)
    {
        usort($articles, function($a, $b)
        {
            $a = $a->getDate()->getTimestamp();
            $b = $b->getDate()->getTimestamp();
            if ($a == $b) return 0;
            return ($a > $b) ? -1 : 1;
        });
    }
}
