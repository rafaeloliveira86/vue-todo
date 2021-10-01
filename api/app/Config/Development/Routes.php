<?php
/**
 * @var \Codeigniter\Router\RouteCollection $routes
 */

$routes->group("api/v1", function ($routes) {
    $routes->post("login", "Login::auth");
    $routes->post("logout", "Login::noAuth");

    $routes->resource('usuarios'); //POST / GET / PUT / PATCH / DELETE

    $routes->resource('courses'); //POST / GET / PUT / PATCH / DELETE

    $routes->resource('coursesmodules'); //POST / GET / PUT / PATCH / DELETE

    $routes->resource('unidades', ['namespace' => 'App\Controllers\Unidades']); //POST / GET / PUT / PATCH / DELETE
    
    $routes->post("user/register", "Users::createUser");
    $routes->get("user/details", "Users::getUserDetail");
    $routes->delete("user/delete/(:num)", "Users::deleteUser/$1");

    $routes->get('buscar/(:num)', 'Users::getUserById/$1');
    //$routes->get('buscar', 'Users::getUserById');
});
?>