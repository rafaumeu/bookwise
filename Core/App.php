<?php

declare(strict_types = 1);

namespace Core;

class App
{
    /**
     * Summary of container
     * @var array<string, mixed>
     */
    protected static array $container = [];

    public static function set(string $key, mixed $value): void
    {
        static::$container[$key] = $value;
    }

    public static function resolve(string $key): mixed
    {
        if (! array_key_exists($key, static::$container)) {
            abort(500, "No matching binding found for {$key}");
        }

        return static::$container[$key];
    }
}
