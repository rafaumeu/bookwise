<?php
$db = new DB;
$id = $_REQUEST['id'];
$livro = $db->livro($id);

view("livro", ["livro" => $livro]);
