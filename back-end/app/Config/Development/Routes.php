<?php
/**
 * @var \Codeigniter\Router\RouteCollection $routes
 */

//Wiki 
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

    //Categorias
    $routes->resource('categorias', ['namespace' => 'App\Controllers\Wiki\Categories', 'controller' => 'Categories']); //POST / GET / PUT / PATCH / DELETE
    $routes->get("categoria/unidade/(:num)", "Categories::categoriesByUnitID/$1", ['namespace' => 'App\Controllers\Wiki\Categories']);

    //Subcategorias
    $routes->resource('subcategorias', ['namespace' => 'App\Controllers\Wiki\Subcategories', 'controller' => 'Subcategories']); //POST / GET / PUT / PATCH / DELETE
    $routes->get("subcategoria/categoria/(:num)/unidade/(:num)", "Subcategories::subcategoriesByCategoriesAndUnitID/$1/$2", ['namespace' => 'App\Controllers\Wiki\Subcategories']);
    
    //Artigos
    $routes->resource('artigos', ['namespace' => 'App\Controllers\Wiki\Articles', 'controller' => 'Articles']);
    $routes->get("artigo/subcategoria/(:num)", "Articles::getArticlesBySubcategorieID/$1", ['namespace' => 'App\Controllers\Wiki\Articles']);
});
?>