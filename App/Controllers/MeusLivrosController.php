<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\Models\Livro;

class MeusLivrosController
{
    public function index()
    {
        if (! auth()) {
            return redirect('/login');
        }
        $livros = Livro::meus(auth()->id);
        view('meus-livros', ["livros" => $livros]);
    }
}
