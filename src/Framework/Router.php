<?php

declare(strict_types=1);

namespace App\Framework;

class Router {
    private array $routeList = [];
    
    public function __construct(private \App\Framework\DIContainer $DIContainer){}

    public function registerRoute(string $method, string $route, string $controller, string $controllerMethod):self {
        $this->routeList[$method][$route] = ['controller' => $controller, 'method' => $controllerMethod];
        return $this;
    }

    public function process(string $uri, string $method): void {
        $path = rtrim(explode('?',$uri)[0], "/");
        if (isset($this->routeList[$method][$path])) {
            try {
                $controller = $this->DIContainer->get($this->routeList[$method][$path]['controller']);
                call_user_func([$controller, $this->routeList[$method][$path]['method']]);
            }
            catch (\App\Exceptions\IncorrectMonthException $e){
                $controller = $this->DIContainer->get(\App\Controllers\ExceptionController::class);
                $controller->displayIncorrectMonthError($e->getMessage());
            }
        } 
        else { require __DIR__.'//..//..//views//electricity//404.php'; };
    }
}