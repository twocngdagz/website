<?php

use Website\Model\Article;
use Website\Repository\ArticleRepository;

class ArticleRepositoryTest extends TestCase
{
    public function testArticlesCanBeRetrieved()
    {
        $a = new ArticleRepository();
        $b = $a->findAll();
        $this->assertCount(2, $b);
        $b = $b[0];
        $this->assertTrue($b instanceOf Article);
    }

    public function testArticlesCanBeRetrievedBySlug()
    {
        $a = new ArticleRepository();
        $b = $a->findBySlug('first-article-title');
        $this->assertTrue($b instanceOf Article);
        $this->assertEquals('First Article Title', $b->getTitle());
    }
}
