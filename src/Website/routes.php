<?php

App::instance('blog', new Website\Repository\ArticleRepository());

Route::get('/', array(
    'as'    => 'index',
    'uses'  => 'Website\Controller\BlogController@showIndex'
));

Route::get('/{slug}', array(
    'as'    => 'article',
    'uses'  => 'Website\Controller\BlogController@showArticle'
));
