<?php

declare(strict_types = 1);

namespace Core;

class Route
{
    protected static array $routes = [];

    public static function get($uri, $controller)
    {
        static::$routes['GET'][$uri] = $controller;
    }

    public static function post($uri, $controller)
    {
        static::$routes['POST'][$uri] = $controller;
    }

    public static function delete($uri, $controller)
    {
        static::$routes['DELETE'][$uri] = $controller;
    }

    public static function put($uri, $controller)
    {
        static::$routes['PUT'][$uri] = $controller;
    }

    public static function handle($uri, $method)
    {
        if (! isset(static::$routes[$method][$uri])) {
            abort(404);

            return;
        }
        $controller = static::$routes[$method][$uri];

        require base_path("App/Controllers/{$controller}.php");
    }
}
