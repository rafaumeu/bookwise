<?php

declare(strict_types = 1);
use Core\Route;
use Core\Request;

require __DIR__ . '/../bootstrap.php';

require base_path('config/routes.php');

Route::handle(Request::uri(), Request::method());
