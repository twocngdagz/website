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
        $data['posts'] = $blog->paginate(1);
        return View::make('index', $data);
    }

    /**
     * Show a single article.
     * @param  string $slug
     */
    public function showArticle($slug)
    {
        $blog = App::make('blog');
        $data['post'] = $blog->findBySlug($slug);
        return View::make('single', $data);
    }
}
