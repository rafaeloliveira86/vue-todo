<?php
/**
 * @var \Codeigniter\Router\RouteCollection $routes
 */

$routes->group("api/v1", function ($routes) {
    //Login
    $routes->post("login", "Login::auth");
    $routes->post("logout", "Login::noAuth");

    //Usuários
    $routes->resource('usuarios'); //POST / GET / PUT / PATCH / DELETE

    //Unidades
    $routes->resource('unidades', ['namespace' => 'App\Controllers\Unidades']); //POST / GET / PUT / PATCH / DELETE

    //Categorias
    $routes->resource('categorias', ['namespace' => 'App\Controllers\Categorias']); //POST / GET / PUT / PATCH / DELETE
    $routes->get("categoria/unidade/(:num)", "Categorias::categoriasPorUnidadeID/$1", ['namespace' => 'App\Controllers\Categorias']);

    //Subcategorias
    $routes->resource('subcategorias', ['namespace' => 'App\Controllers\Subcategorias']); //POST / GET / PUT / PATCH / DELETE
    $routes->get("subcategoria/categoria/(:num)/unidade/(:num)", "Subcategorias::subcategoriasPorCategoriaIDUnidadeID/$1/$2", ['namespace' => 'App\Controllers\Subcategorias']);
    
    $routes->post("user/register", "Users::createUser");
    $routes->get("user/details", "Users::getUserDetail");
    $routes->delete("user/delete/(:num)", "Users::deleteUser/$1");

    $routes->get('buscar/(:num)', 'Users::getUserById/$1');
    //$routes->get('buscar', 'Users::getUserById');
});
?>