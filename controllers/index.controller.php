<?php

declare(strict_types = 1);
use App\Models\Livro;

$livros = Livro::all($_REQUEST["pesquisar"] ?? "");
view("index", ["livros" => $livros]);
