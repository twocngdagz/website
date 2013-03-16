<?php

use Website\Model\Article;
use Website\Factory\ArticleFactory;
use Kurenai\Document;
use Kurenai\DocumentParser;

class ArticleFactoryTest extends TestCase
{
    public function testDocumentCanBeValidated()
    {
        $a = new ArticleFactory();
        $s = "title:bob\nslug:my-slug\ndate:12/12/12\n-----\ncontent";
        $d = new DocumentParser();
        $s = $d->parse($s);
        $v = $a->validateDocument($s);
        $this->assertTrue($v);
    }

    public function testDocumentValidationFailsWithoutTitle()
    {
        $a = new ArticleFactory();
        $s = "slug:my-slug\ndate:12/12/12\n-----\ncontent";
        $d = new DocumentParser();
        $s = $d->parse($s);
        $v = $a->validateDocument($s);
        $this->assertFalse($v);
    }

    public function testDocumentValidationFailsWithoutDate()
    {
        $a = new ArticleFactory();
        $s = "title:foo\nslug:my-slug\n-----\ncontent";
        $d = new DocumentParser();
        $s = $d->parse($s);
        $v = $a->validateDocument($s);
        $this->assertFalse($v);
    }

    public function testArticleCanBeBuiltFromDocument()
    {
        $a = new ArticleFactory();
        $s = "title:bob\nslug:my-slug\ndate:12/12/12\ntags:one,two\n-----\ncontent";
        $d = new DocumentParser();
        $s = $d->parse($s);
        $c = $a->buildArticle($s);
        $this->assertTrue($c instanceOf Article);
        $this->assertEquals('bob', $c->getTitle());
        $this->assertEquals('my-slug', $c->getSlug());
        $this->assertEquals('12/12/12', $c->getDate()->format('d/m/y'));
        $this->assertEquals('content', $c->getBody());
        $this->assertCount(2, $c->getTags());
        $this->assertEquals(array('one', 'two'), $c->getTags());
    }

    public function testArticleSlugCanBeBuiltFromTitle()
    {
        $a = new ArticleFactory();
        $s = "title:Foo bar baz\ndate:12/12/12\ntags:one,two\n-----\ncontent";
        $d = new DocumentParser();
        $s = $d->parse($s);
        $c = $a->buildArticle($s);
        $this->assertTrue($c instanceOf Article);
        $this->assertEquals('foo-bar-baz', $c->getSlug());
    }

    public function testTagsCanHaveWhiteSpaceBetweenCommas()
    {
        $a = new ArticleFactory();
        $s = "tags:one , two,three:\n-----\ncontent";
        $d = new DocumentParser();
        $s = $d->parse($s);
        $c = $a->buildArticle($s);
        $this->assertCount(3, $c->getTags());
        $this->assertEquals(array('one', 'two', 'three:'), $c->getTags());
    }

    public function testACollectionOfArticlesCanBeBuilt()
    {
        $a = new ArticleFactory();
        $d = new DocumentParser();
        $s = array(
            $d->parse("title:bob\nslug:my-slug\ndate:12/12/12\ntags:one\n----\ncontent"),
            $d->parse("title:bob\nslug:my-slug\ndate:12/12/12\ntags:one\n----\ncontent"),
            $d->parse("title:bob\nslug:my-slug\ndate:12/12/12\ntags:one\n----\ncontent")
        );
        $c = $a->buildArticleCollection($s);
        $this->assertCount(3, $c);
        $this->assertTrue($c[0] instanceOf Article);
        $this->assertTrue($c[1] instanceOf Article);
        $this->assertTrue($c[2] instanceOf Article);
        $e = $c[2];
        $this->assertEquals('bob', $e->getTitle());
        $this->assertEquals('content', $e->getBody());
    }
}
