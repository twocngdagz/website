<?php

namespace Website\Model;

use DateTime;
use dflydev\markdown\MarkdownExtraParser;

class Article
{
    /**
     * The body content of the article.
     *
     * @var string
     */
    private $body;

    /**
     * The title of the article.
     *
     * @var string
     */
    private $title;

    /**
     * The URI friendly slug for the article.
     *
     * @var string
     */
    private $slug;

    /**
     * The date the article was written.
     *
     * @var DateTime
     */
    private $date;

    /**
     * A collection of article tags.
     * @var array
     */
    private $tags = array();

    /**
     * Set the article body.
     *
     * @param  string $body
     * @return Article
     */
    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }

    /**
     * Get the article body as markdown.
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Get the article body as HTML.
     *
     * @return string
     */
    public function getHtml()
    {
        $markdownExtra = new MarkdownExtraParser();
        return $markdownExtra->transformMarkdown($this->body);
    }

    /**
     * Set the article title.
     *
     * @param  string $title
     * @return Article
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Get the article title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the article slug.
     *
     * @param  string $slug
     * @return Article
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * Get the article slug.
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set the date the article was written.
     *
     * @param  string $date
     * @return Article
     */
    public function setDate($date)
    {
        $this->date = new DateTime($date);
        return $this;
    }

    /**
     * Get the date the article was written.
     *
     * @return DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Get the formatted date the article was written.
     *
     * @param  string $format
     * @return string
     */
    public function getFormattedDate($format = 'd/m/y')
    {
        return $this->date->format($format);
    }

    /**
     * Set the article tags.
     *
     * @param  array $tags
     * @return Article
     */
    public function setTags(array $tags)
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * Add a tag to the article.
     *
     * @param  string $tag
     * @return Article
     */
    public function addTag($tag)
    {
        $this->tags[] = $tag;
        return $this;
    }

    /**
     * Get the article tags.
     *
     * @return array
     */
    public function getTags()
    {
        return $this->tags;
    }
}
