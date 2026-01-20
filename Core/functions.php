<?php

declare(strict_types = 1);
use Core\Flash;

function view($viewName, $data = [])
{
    extract($data);
    $view = $viewName;

    require base_path("views/template/app.php");
}
function dd(...$dump)
{
    dump($dump);

    exit();
}

function dump(...$dump)
{
    echo "<pre>";
    var_dump($dump);
    echo "</pre>";
}
function abort($code, $message = "")
{
    http_response_code($code);
    view($code, ['message' => $message]);

    die();
}

function flash()
{
    return new Flash();
}

function config($chave = null)
{
    $config = require 'config.php';

    if (strlen($chave) > 0) {
        return $config[$chave];
    }

    return $config;
}

function auth()
{
    if (! isset($_SESSION['auth'])) {
        return null;
    }

    return $_SESSION['auth'];
}

function base_path($path = '')
{
    return __DIR__ . '/../' . $path;
}

function redirect($path)
{
    header("Location: {$path}");

    exit();
}
