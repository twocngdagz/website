<?php

use Website\Model\Article;
use Website\Reader\ArticleReader;
use Kurenai\Document;

class ArticleReaderTest extends TestCase
{
    public function testArticleReaderCanBeCreated()
    {
        $a = new ArticleReader(__DIR__.'/fixtures');
        $this->assertTrue($a instanceof ArticleReader);
    }

    public function testArticleDirectoryCanBeScanned()
    {
        $a = new ArticleReader(__DIR__.'/fixtures');
        $d = $a->scanDirectory(__DIR__.'/fixtures');
        $this->assertTrue(is_array($d));
        $this->assertCount(2, $d);
        $e = array(
            realpath(__DIR__.'/fixtures/13_03_13-first-article.md'),
            realpath(__DIR__.'/fixtures/14_04_13-second-article.md')
        );
        $this->assertEquals($e, $d);
    }

    public function testArticleReaderDoesNotBreakWhenDirectoryDoesntExist()
    {
        $a = new ArticleReader(__DIR__.'/NOT_EXIST');
        $d = $a->scanDirectory(__DIR__.'/NOT_EXIST');
        $this->assertTrue(is_array($d));
        $this->assertCount(0, $d);
    }

    public function testFileSourceCanBeLoaded()
    {
        $a = new ArticleReader(__DIR__.'/fixtures');
        $f = array(
            realpath(__DIR__.'/fixtures/13_03_13-first-article.md'),
            realpath(__DIR__.'/fixtures/14_04_13-second-article.md')
        );
        $f = $a->loadArticleSources($f);
        $fileA = file_get_contents(__DIR__.'/fixtures/13_03_13-first-article.md');
        $fileB = file_get_contents(__DIR__.'/fixtures/14_04_13-second-article.md');
        $this->assertTrue(is_array($f));
        $this->assertCount(2, $f);
        $this->assertTrue(in_array($fileA, $f));
        $this->assertTrue(in_array($fileB, $f));
    }

    public function testFileSourceNotExistingWontBreakReader()
    {
        $a = new ArticleReader(__DIR__.'/fixtures');
        $f = array(
            realpath(__DIR__.'/fixtures/NOT_EXISTING.md'),
            realpath(__DIR__.'/fixtures/14_04_13-second-article.md')
        );
        $f = $a->loadArticleSources($f);
        $this->assertTrue(is_array($f));
        $this->assertCount(1, $f);
    }

    public function testDocumentsAreParsed()
    {
        $a = new ArticleReader(null);
        $f = array(
            file_get_contents(__DIR__.'/fixtures/13_03_13-first-article.md'),
            file_get_contents(__DIR__.'/fixtures/14_04_13-second-article.md')
        );
        $d = $a->parseDocuments($f);
        $this->assertCount(2, $d);
        $this->assertTrue($d[0] instanceof Document);
        $this->assertTrue($d[1] instanceof Document);
    }
}
