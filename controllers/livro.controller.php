<?php
$livro = $DB->query("select * from livros where id = :id", Livro::class, ["id" => $_REQUEST['id']])->fetch();
view("livro", ["livro" => $livro]);
