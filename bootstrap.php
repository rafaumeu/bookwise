<?php

declare(strict_types = 1);

use Core\App;
use Core\Database;

require __DIR__ . '/vendor/autoload.php';

$config = require base_path('config/config.php');

$database = Database::make($config['database']);

App::set('database', $database);
