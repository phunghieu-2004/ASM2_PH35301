<?php

use Acer\Asm2Ph35301\Controllers\Client\AuthController;
use Acer\Asm2Ph35301\Controllers\Client\DetailsController;
use Acer\Asm2Ph35301\Controllers\Client\HomeController;

$router->get( '/', HomeController::class . '@index');


$router->get( '/auth/login',            AuthController::class . '@showFormLogin');
$router->post( '/auth/handle-login',    AuthController::class . '@login');
$router->get( '/auth/logout',           AuthController::class . '@logout');


$router->mount('/client', function () use ($router) {

    $router->get('/', HomeController::class . '@dashboard');

    // CRUD PRODUCT
    $router->mount('/products', function () use ($router) {
        
        $router->get('/{id}/detail',      DetailsController::class . '@show');   // Xem chi tiết
        
    });
});