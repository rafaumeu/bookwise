<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\Models\Avaliacao;
use App\Models\Livro;
use App\Models\Usuario;
use Core\App;
use Core\Validacao;

class LivroController
{
    public function show(): void
    {
        $id = $_GET["id"] ?? null;

        if (! $id) {
            abort(404);
        }
        $livro = Livro::get($id);

        if (! $livro) {
            abort(404);
        }
        $db         = App::resolve('database');
        $avaliacoes = $db->query("SELECT * FROM avaliacoes WHERE livro_id = :id", Avaliacao::class, [
            'id' => $id,
        ])->fetchAll();

        foreach ($avaliacoes as $avaliacao) {
            $avaliacao->usuario = $db->query("SELECT * FROM usuarios WHERE id = :id", Usuario::class, [
                'id' => $avaliacao->user_id,
            ])->fetch();
        }
        view('livro', [
            'livro'      => $livro,
            'avaliacoes' => $avaliacoes,
        ]);
    }

    public function store(): void
    {
        $validacao = Validacao::validar([
            'titulo'         => ['required', 'min:3', 'max:255'],
            'autor'          => ['required', 'min:3', 'max:255'],
            'descricao'      => ['required', 'min:3'],
            'ano_lancamento' => ['required', 'min:4', 'max:4'],
        ], $_POST);

        if ($validacao->naoPassou('livro')) {
            redirect('/meus-livros');
        }
        $novoNome = md5((string) rand());
        $extensao = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
        $imagem   = "images/$novoNome.$extensao";
        move_uploaded_file($_FILES['imagem']['tmp_name'], base_path("public/$imagem"));
        $db = App::resolve('database');
        $db->query("INSERT INTO livros 
    (
    usuario_id, titulo, autor, descricao, ano_lancamento, imagem) 
    VALUES (
    :usuario_id, :titulo, :autor, :descricao, :ano_lancamento, :imagem)", Livro::class, [
            'usuario_id'     => auth()->id,
            'titulo'         => $_POST['titulo'],
            'autor'          => $_POST['autor'],
            'descricao'      => $_POST['descricao'],
            'ano_lancamento' => $_POST['ano_lancamento'],
            'imagem'         => $imagem,
        ]);
        flash()->push("mensagem", "Livro criado com sucesso!");

        redirect('/meus-livros');
    }
}
