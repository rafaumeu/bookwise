<?php

$livros = (new DB)->livros($_REQUEST["pesquisar"] ?? null);
view("index", ["livros" => $livros]);
