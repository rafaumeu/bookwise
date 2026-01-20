<?php

declare(strict_types = 1);
use Core\Request;
use Core\Route;

require __DIR__ . '/../bootstrap.php';
session_start();

require base_path('config/routes.php');

Route::handle(Request::uri(), Request::method());
