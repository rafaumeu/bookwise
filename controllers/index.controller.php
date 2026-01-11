<?php
$db = new DB();
$livros = $db->livros($_REQUEST["pesquisar"] ?? null);
view("index", ["livros" => $livros]);
