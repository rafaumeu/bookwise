<?php
function view($viewName, $data = [])
{
  extract($data);
  $view = $viewName;
  require "views/template/app.php";
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
function abort($code)
{
  http_response_code($code);
  view($code);
  die();
}

function flash()
{
  return new Flash;
}
