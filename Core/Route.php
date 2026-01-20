<?php

declare(strict_types = 1);

namespace Core;

class Route
{
    /**
     * Summary of routes
     * @var array<string, array<string, array<string, string|null>>>
     */
    protected static array $routes = [];

    /**
     * Summary of lastRoute
     * @var array<string, string>
     */
    protected static array $lastRoute = [];

    /**
     * Summary of middlewares
     * @var array<string, string>
     */
    protected static array $middlewares = [
        'auth' => \App\Middlewares\AuthMiddleware::class,
    ];

    public static function middleware(string $key): self
    {
        if (empty(static::$lastRoute)) {
            return new self();
        }
        $method                                      = static::$lastRoute['method'];
        $uri                                         = static::$lastRoute['uri'];
        static::$routes[$method][$uri]['middleware'] = $key;

        return new self();
    }

    public static function get(string $uri, string $controller): self
    {
        static::$routes['GET'][$uri] = [
            'controller' => $controller,
            'middleware' => null,
        ];
        static::$lastRoute = ['method' => 'GET', 'uri' => $uri];

        return new self();
    }

    public static function post(string $uri, string $controller): self
    {
        static::$routes['POST'][$uri] = [
            'controller' => $controller,
            'middleware' => null,
        ];
        static::$lastRoute = ['method' => 'POST', 'uri' => $uri];

        return new self();
    }

    public static function delete(string $uri, string $controller): self
    {
        static::$routes['DELETE'][$uri] = [
            'controller' => $controller,
            'middleware' => null,
        ];
        static::$lastRoute = ['method' => 'DELETE', 'uri' => $uri];

        return new self();
    }

    public static function put(string $uri, string $controller): self
    {
        static::$routes['PUT'][$uri] = [
            'controller' => $controller,
            'middleware' => null,
        ];
        static::$lastRoute = ['method' => 'PUT', 'uri' => $uri];

        return new self();
    }

    public static function handle(string $uri, string $method): void
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
