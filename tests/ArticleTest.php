<?php

use Website\Model\Article;

class ArticleTest extends TestCase
{
    public function testArticleCanBeCreated()
    {
        $a = new Article();
        $this->assertTrue($a instanceof Article);
    }

    public function testArticleBodyCanBeSet()
    {
        $a = new Article();
        $a->setBody('Foo');
        $this->assertEquals('Foo', $a->getBody());
        $a->setBody('Bar');
        $this->assertEquals('Bar', $a->getBody());
    }

    public function testArticleBodyCanBeRetrievedAsHtml()
    {
        $a = new Article();
        $a->setBody('Foo **bar** baz.');
        $e = "<p>Foo <strong>bar</strong> baz.</p>\n";
        $this->assertEquals($e, $a->getHtml());
    }

    public function testArticleTitleCanBeSet()
    {
        $a = new Article();
        $a->setTitle('Foo');
        $this->assertEquals('Foo', $a->getTitle());
        $a->setTitle('Bar');
        $this->assertEquals('Bar', $a->getTitle());
    }

    public function testArticleSlugCanBeSet()
    {
        $a = new Article();
        $a->setSlug('Foo');
        $this->assertEquals('Foo', $a->getSlug());
        $a->setSlug('Bar');
        $this->assertEquals('Bar', $a->getSlug());
    }

    public function testArticleDateCanBeSet()
    {
        $a = new Article();
        $a->setDate('12th December 1984');
        $e = new \DateTime('12th December 1984');
        $this->assertTrue($a->getDate() instanceOf \DateTime);
        $this->assertEquals($e, $a->getDate());
        $this->assertEquals('12/12/84', $a->getDate()->format('d/m/y'));
    }

    public function testArticleFormattedDateCanBeRetrieved()
    {
        $a = new Article();
        $a->setDate('12th December 1984');
        $this->assertEquals('12/12/84', $a->getFormattedDate('d/m/y'));
    }

    public function testArticleTagsCanBeSet()
    {
        $a = new Article();
        $a->setTags(array('one', 'two', 'three'));
        $this->assertCount(3, $a->getTags());
        $this->assertEquals(array('one', 'two', 'three'), $a->getTags());
    }

    public function testArticleTagsCanBeAdded()
    {
        $a = new Article();
        $a->setTags(array('one', 'two', 'three'));
        $this->assertCount(3, $a->getTags());
        $a->addTag('foo');
        $this->assertCount(4, $a->getTags());
        $this->assertEquals(array('one', 'two', 'three', 'foo'), $a->getTags());
        $a->addTag('bar');
        $this->assertCount(5, $a->getTags());
        $this->assertEquals(array('one', 'two', 'three', 'foo', 'bar'), $a->getTags());
    }
}
