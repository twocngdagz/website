<?php

App::instance('blog', new Website\Repository\ArticleRepository());

Route::get('/sitemap.xml', array(
    'as'    => 'sitemap',
    'uses'  => 'Website\Controller\BlogController@showSitemap'
));

Route::get('/', array(
    'as'    => 'index',
    'uses'  => 'Website\Controller\BlogController@showIndex'
));

Route::get('/{slug}', array(
    'as'    => 'article',
    'uses'  => 'Website\Controller\BlogController@showArticle'
));
