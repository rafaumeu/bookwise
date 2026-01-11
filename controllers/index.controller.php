<?php
$db = new DB;
$pesquisar = $_REQUEST["pesquisar"] ?? "";
$livros = $db->query('select * from livros where titulo like :filtro or autor like :filtro or descricao like :filtro', Livro::class, ['filtro' => "%$pesquisar%"])->fetchAll();
view("index", ["livros" => $livros]);
