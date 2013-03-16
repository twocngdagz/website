<?php

namespace Website\Controller;

use App;
use View;
use Paginator;
use Controller;

class BlogController extends Controller
{
    public function showIndex()
    {
        $blog = App::make('blog');
        $posts = $blog->findAll();
        $data['posts'] = Paginator::make($posts, count($posts), 1);
        return View::make('index', $data);
    }

    public function showArticle($slug)
    {
        $blog = App::make('blog');
        $data['post'] = $blog->findBySlug($slug);
        return View::make('single', $data);
    }
}
