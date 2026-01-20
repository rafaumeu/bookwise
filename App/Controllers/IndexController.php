<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\Models\Livro;

class IndexController
{
    public function index()
    {
        $livros = Livro::all($_REQUEST['pesquisar'] ?? '');

        view('index', [
            'livros' => $livros,
        ]);
    }
}
