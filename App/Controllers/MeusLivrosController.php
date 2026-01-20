<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\Models\Livro;

class MeusLivrosController
{
    public function index(): void
    {
        $livros = Livro::meus(auth()->id);
        view('meus-livros', ["livros" => $livros]);
    }
}
