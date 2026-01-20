<?php

declare(strict_types = 1);

namespace App\Controllers;

use Core\App;
use Core\Validacao;

class AvaliacaoController
{
    public function store(): void
    {
        $validacao = Validacao::validar([
            'avaliacao' => ['required'],
            'nota'      => ['required'],
        ], $_POST);

        if ($validacao->naoPassou('avaliacao')) {
            redirect('/meus-livros');
        }
        $db = App::resolve('database');
        $db->query(
            query: "insert into avaliacoes (usuario_id, livro_id, avaliacao, nota) 
            values (:usuario_id, :livro_id, :avaliacao, :nota)",
            params: [
                'usuario_id' => auth()->id,
                'livro_id'   => $_POST['livro_id'],
                'avaliacao'  => $_POST['avaliacao'],
                'nota'       => $_POST['nota'],
            ]
        );
        flash()->push('mensagem', 'Avaliação criada com sucesso');

        redirect('/meus-livros');
    }
}
