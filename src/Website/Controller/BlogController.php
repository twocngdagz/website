<?php

namespace Website\Controller;

use App;
use View;
use Input;
use Paginator;
use Controller;

class BlogController extends Controller
{
    /**
     * Show the index page for the blog.
     */
    public function showIndex()
    {
        $blog = App::make('blog');
        $data['posts'] = $blog->paginate(3);
        return View::make('index', $data);
    }

    /**
     * Show the about me page.
     */
    public function showAbout()
    {
        $data['title'] = 'About me';
        return View::make('about', $data);
    }

    /**
     * Show a single article.
     *
     * @param  string $slug
     */
    public function showArticle($slug)
    {
        $blog = App::make('blog');
        $post = $blog->findBySlug($slug);
        $data['post'] = $post;
        $data['title'] = $post->getTitle();
        $data['description'] = strip_tags($post->getExcerpt());
        return View::make('single', $data);
    }

    /**
     * Build a sitemap.xml for SEO purposes.
     */
    public function showSitemap()
    {
        $blog = App::make('blog');
        $data['posts'] = $blog->findAll();
        return View::make('sitemap', $data);
    }

    /**
     * Build an RSS feed from the post collection.
     */
    public function showRss()
    {
        $blog = App::make('blog');
        $data['posts'] = $blog->findAll();
        return View::make('rss', $data);
    }

    /**
     * Show a 404 page.
     */
    public function showFour()
    {
        $data['title'] = '404 Page Not Found';
        return View::make('404', $data);
    }
}
