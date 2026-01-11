<?php
require "dados.php";
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = trim($uri, '/');
$controller = $uri ?: "index";

$controllerFile = "controllers/{$controller}.controller.php";

if (file_exists($controllerFile)) {
  require $controllerFile;
} else {
  http_response_code(404);
  echo "Página não encontrada";
}
