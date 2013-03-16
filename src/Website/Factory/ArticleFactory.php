<?php

namespace Website\Factory;

use Website\Model\Article;
use Kurenai\Document;
use Str;

class ArticleFactory
{
    /**
     * Build a collection of articles from an array of documents.
     *
     * @param  array  $documents
     * @return array
     */
    public function buildArticleCollection(array $documents)
    {
        $articles = array();
        foreach ($documents as $document) {
            if ($this->validateDocument($document))
                $articles[] = $this->buildArticle($document);
        }
        return $articles;
    }

    /**
     * Validate a document object for all required fields.
     *
     * @param  Document $document
     * @return bool
     */
    public function validateDocument($document)
    {
        if (is_null($document->get('title'))) return false;
        if (is_null($document->get('date'))) return false;
        return true;
    }

    /**
     * Build an article from a kurenai document.
     *
     * @param  Document $document
     * @return Article
     */
    public function buildArticle($document)
    {
        $article = new Article();
        $article->setBody($document->getContent());
        $article->setTitle($document->get('title'));
        $article->setDate($document->get('date'));
        if (! is_null($slug = $document->get('slug')))
        {
            $article->setSlug($slug);
        }
        else
        {
            $title = $document->get('title');
            $article->setSlug(Str::slug($title));
        }
        if (! is_null($tags = $document->get('tags')))
        {
            $tags = explode(',', $tags);
            $cleanTags = array();
            foreach ($tags as $tag) {
                if (trim($tag) != '')
                    $cleanTags[] = trim($tag);
            }
            $article->setTags($cleanTags);
        }
        return $article;
    }
}
