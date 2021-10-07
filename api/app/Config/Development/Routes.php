<?php
/**
 * @var \Codeigniter\Router\RouteCollection $routes
 */

$routes->group("api/v1", function ($routes) {
    //Login
    $routes->post("login", "Login::auth");
    $routes->post("logout", "Login::noAuth");

    //Usuários
    $routes->resource('users'); //POST / GET / PUT / PATCH / DELETE

    //Unidades
    $routes->resource('units', ['namespace' => 'App\Controllers\Units']); //POST / GET / PUT / PATCH / DELETE
    $routes->get("unit/(:num)", "Units::getUnitByID/$1", ['namespace' => 'App\Controllers\Units']);

    //Categorias
    $routes->resource('categories', ['namespace' => 'App\Controllers\Categories']); //POST / GET / PUT / PATCH / DELETE
    $routes->get("categorie/unit/(:num)", "Categories::categoriesByUnitID/$1", ['namespace' => 'App\Controllers\Categories']);

    //Subcategorias
    $routes->resource('subcategories', ['namespace' => 'App\Controllers\Subcategories']); //POST / GET / PUT / PATCH / DELETE
    $routes->get("subcategorie/categorie/(:num)/unit/(:num)", "Subcategories::subcategoriasPorCategoriaIDUnidadeID/$1/$2", ['namespace' => 'App\Controllers\Subcategories']);
    
    $routes->post("user/register", "Users::createUser");
    $routes->get("user/details", "Users::getUserDetail");
    $routes->delete("user/delete/(:num)", "Users::deleteUser/$1");

    $routes->get('buscar/(:num)', 'Users::getUserById/$1');
    //$routes->get('buscar', 'Users::getUserById');
});
?>