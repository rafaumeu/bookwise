<?php

declare(strict_types = 1);

namespace Core;

class Route
{
    protected static array $routes = [];

    protected static array $lastRoute = [];

    protected static array $middlewares = [
        'auth' => \App\Middlewares\AuthMiddleware::class,
    ];

    public static function middleware($key)
    {
        if (empty(static::$lastRoute)) {
            return new static();
        }
        $method                                      = static::$lastRoute['method'];
        $uri                                         = static::$lastRoute['uri'];
        static::$routes[$method][$uri]['middleware'] = $key;

        return new static();
    }

    public static function get($uri, $controller)
    {
        static::$routes['GET'][$uri] = [
            'controller' => $controller,
            'middleware' => null,
        ];
        static::$lastRoute = ['method' => 'GET', 'uri' => $uri];

        return new static();
    }

    public static function post($uri, $controller)
    {
        static::$routes['POST'][$uri] = [
            'controller' => $controller,
            'middleware' => null,
        ];
        static::$lastRoute = ['method' => 'POST', 'uri' => $uri];

        return new static();
    }

    public static function delete($uri, $controller)
    {
        static::$routes['DELETE'][$uri] = [
            'controller' => $controller,
            'middleware' => null,
        ];
        static::$lastRoute = ['method' => 'DELETE', 'uri' => $uri];

        return new static();
    }

    public static function put($uri, $controller)
    {
        static::$routes['PUT'][$uri] = [
            'controller' => $controller,
            'middleware' => null,
        ];
        static::$lastRoute = ['method' => 'PUT', 'uri' => $uri];

        return new static();
    }

    public static function handle($uri, $method)
    {
        if (! isset(static::$routes[$method][$uri])) {
            abort(404);

            return;
        }
        $route = static::$routes[$method][$uri];

        if ($route['middleware']) {
            $middlewareClass = static::$middlewares[$route['middleware']];
            (new $middlewareClass())->handle();
        }

        [$controller, $action] = explode('@', $route['controller']);
        $controllerClass       = "App\\Controllers\\{$controller}";

        $instance = new $controllerClass();
        $instance->$action();
    }
}
