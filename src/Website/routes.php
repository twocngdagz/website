<?php

/**
 * Share a default title across all views. This can be overriden within
 * the controller action.
 */
View::share('title', 'Web development, design, and other nerdy topics!');

/**
 * Share a default description across all views. This can be overriden within
 * the controller action.
 */
View::share('description', 'A collection of articles about web development and design and a number of tools to make our lives as developers easier.');

/**
 * Bind the article repository within the container.
 */
App::instance('blog', new Website\Repository\ArticleRepository());

/**
 * Show an XML sitemap of all articles.
 */
Route::get('/sitemap.xml', array(
    'as'    => 'sitemap',
    'uses'  => 'Website\Controller\BlogController@showSitemap'
));

/**
 * Show the index of all blog posts.
 */
Route::get('/', array(
    'as'    => 'index',
    'uses'  => 'Website\Controller\BlogController@showIndex'
));

/**
 * Show the about me page.
 */
Route::get('/about', array(
    'as'    => 'about',
    'uses'  => 'Website\Controller\BlogController@showAbout'
));

/**
 * Show a 404 page.
 */
Route::get('/404', array(
    'as'    => '404',
    'uses'  => 'Website\Controller\BlogController@showFour'
));

/**
 * Show a single blog article.
 */
Route::get('/{slug}', array(
    'as'    => 'article',
    'uses'  => 'Website\Controller\BlogController@showArticle'
));
