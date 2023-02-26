<?php

declare(strict_types=1);

require_once __DIR__ . '//vendor//autoload.php';

$DIContainer = new \App\Framework\DIContainer();
$router = new \App\Framework\Router($DIContainer);
$router
    ->registerRoute('GET','',\App\Controllers\DeclareElectricityController::class, 'enterData')
    ->registerRoute('POST','/submit',\App\Controllers\DeclareElectricityController::class, 'calculate')
    ->registerRoute('POST','/pay',\App\Controllers\DeclareElectricityController::class, 'pay');

$router->process($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);