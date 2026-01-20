<?php

declare(strict_types = 1);

namespace App\Controllers;

use Core\App;
use Core\Validacao;

class AvaliacaoController
{
    public function store()
    {
        $validacao = Validacao::validar([
            'avaliacao' => ['required'],
            'nota'      => ['required'],
        ], $_POST);

        if ($validacao->naoPassou('avaliacao')) {
            return redirect('/meus-livros');
        }
        $db = App::resolve('database');
        $db->query(
            query: "insert into avaliacoes (usuario_id, livro_id, avaliacao, nota) 
            values (:usuario_id, :livro_id, :avaliacao, :nota)",
            params: compact('usuario_id', 'livro_id', 'avaliacao', 'nota')
        );
        flash()->push('mensagem', 'Avaliação criada com sucesso');

        return redirect('/meus-livros');
    }
}
