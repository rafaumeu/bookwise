<?php

declare(strict_types = 1);
use Core\Flash;

/**
 * @param array<string, mixed> $data
 */
function view(string $viewName, array $data = []): void
{
    extract($data);
    $view = $viewName;

    require base_path("views/template/app.php");
}
function dd(mixed ...$dump): void
{
    dump($dump);

    exit();
}

function dump(mixed ...$dump): void
{
    echo "<pre>";
    var_dump($dump);
    echo "</pre>";
}
function abort(int $code, string $message = ""): void
{
    http_response_code($code);
    view((string)$code, ['message' => $message]);

    die();
}

function flash(): Flash
{
    return new Flash();
}

function config(?string $chave = null): mixed
{
    $config = require 'config/config.php';

    if (strlen($chave) > 0) {
        return $config[$chave];
    }

    return $config;
}

function auth(): ?object
{
    if (! isset($_SESSION['auth'])) {
        return null;
    }

    return $_SESSION['auth'];
}

function base_path(string $path = ''): string
{
    return __DIR__ . '/../' . $path;
}

function redirect(string $path): void
{
    header("Location: {$path}");

    exit();
}
