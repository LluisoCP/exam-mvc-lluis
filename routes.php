<?php

// Create Router instance
$router = new Router();

// example.com
$router->get('/', 'PagesController@home' );

// example.com/about
$router->get('/about', 'PagesController@about');

$router->get('/contact', 'PagesController@contact');
//$router->post('/contactez-nous', 'PagesController@traitementForm');


// example.com/articles
$router->get('/logements', 'LogementsController@index');
$router->get('/logement/{id}', 'LogementsController@show');

$router->get( '/ajouter-logement','LogementsController@add');
$router->post('/ajouter-logement', 'LogementsController@save');


// Run it!
$router->run();