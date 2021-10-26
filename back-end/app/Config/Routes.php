<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->group("wiki/api/v1", function ($routes) {
    //Login
    $routes->post("login", "Login::auth");
    $routes->post("logout", "Login::noAuth");

    //Usuários
    $routes->resource('usuarios', ['namespace' => 'App\Controllers\Wiki\Users', 'controller' => 'Users']); //POST / GET / PUT / PATCH / DELETE
    $routes->post("usuario/cadastro", "Users::createUser", ['namespace' => 'App\Controllers\Wiki\Users']);
    $routes->get("usuario/detalhes", "Users::getUserDetail", ['namespace' => 'App\Controllers\Wiki\Users']);
    $routes->delete("usuario/excluir/(:num)", "Users::deleteUser/$1", ['namespace' => 'App\Controllers\Wiki\Users']);

    $routes->get('buscar/(:num)', 'Users::getUserById/$1');
    //$routes->get('buscar', 'Users::getUserById');

    //Unidades
    $routes->resource('unidades', ['namespace' => 'App\Controllers\Wiki\Units', 'controller' => 'Units']); //POST / GET / PUT / PATCH / DELETE
    $routes->get("unidade/(:num)", "Units::getUnitByID/$1", ['namespace' => 'App\Controllers\Wiki\Units']);
    $routes->get("unidade/(:any)", "Units::getUnitBySlug/$1", ['namespace' => 'App\Controllers\Wiki\Units']);

    //Categorias
    $routes->resource('categorias', ['namespace' => 'App\Controllers\Wiki\Categories', 'controller' => 'Categories']); //POST / GET / PUT / PATCH / DELETE
    $routes->get("categoria/unidade/(:num)", "Categories::categoriesByUnitID/$1", ['namespace' => 'App\Controllers\Wiki\Categories']);
    $routes->get("categoria/unidade/(:any)", "Categories::categoriesByUnitSlug/$1", ['namespace' => 'App\Controllers\Wiki\Categories']);

    //Subcategorias
    $routes->resource('subcategorias', ['namespace' => 'App\Controllers\Wiki\Subcategories', 'controller' => 'Subcategories']); //POST / GET / PUT / PATCH / DELETE
    $routes->get("subcategoria/categoria/(:num)/unidade/(:num)", "Subcategories::subcategoriesByCategoriesAndUnitID/$1/$2", ['namespace' => 'App\Controllers\Wiki\Subcategories']);
    $routes->get("subcategoria/categoria/(:any)/unidade/(:any)", "Subcategories::subcategoriesByCategoriesAndUnitSlug/$1/$2", ['namespace' => 'App\Controllers\Wiki\Subcategories']);
    
    //Artigos
    $routes->resource('artigos', ['namespace' => 'App\Controllers\Wiki\Articles', 'controller' => 'Articles']);
    $routes->get("artigo/(:num)", "Articles::getArticleByID/$1", ['namespace' => 'App\Controllers\Wiki\Articles']);
    $routes->get("artigo/nome/(:any)", "Articles::getArticleBySlug/$1", ['namespace' => 'App\Controllers\Wiki\Articles']);
    $routes->get("artigo/subcategoria/(:num)", "Articles::getArticlesBySubcategorieID/$1", ['namespace' => 'App\Controllers\Wiki\Articles']);
    $routes->get("artigo/subcategoria/(:any)", "Articles::getArticlesBySubcategorieSlug/$1", ['namespace' => 'App\Controllers\Wiki\Articles']);
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
