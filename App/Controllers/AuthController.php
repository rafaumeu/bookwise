<?php

declare(strict_types = 1);

namespace App\Controllers;

use App\Models\Usuario;
use Core\App;
use Core\Session;
use Core\Validacao;

class AuthController
{
    public function index()
    {
        view('login');
    }

    public function login()
    {
        $validacao = Validacao::validar([
            "email" => ["required", "email"],
            "senha" => ["required"],
        ], $_POST);

        if ($validacao->naoPassou('login')) {
            return redirect('/login');
        }
        $db      = App::resolve('database');
        $usuario = $db->query("SELECT * FROM usuarios WHERE email = :email", Usuario::class, [
            'email' => $_POST['email'],
        ])->fetch();

        if ($usuario && password_verify($_POST['senha'], $usuario->senha)) {
            $_SESSION['auth'] = $usuario;
            flash()->push('mensagem', 'Seja bem-vindo(a) ' . $usuario->nome . '!');

            return redirect('/');
        } else {
            flash()->push('validacoes_login', ["usuario ou senha incorretos"]);

            return redirect("/login");
        }
    }

    public function logout()
    {
        Session::destroy();

        return redirect("/login");
    }

    public function registrar()
    {
        $validacao = Validacao::validar([
            "nome"              => ["required"],
            "email"             => ["required", "email"],
            "email_confirmacao" => ["required", "email"],
            "senha"             => ["required"],
        ], $_POST);

        if ($validacao->naoPassou('registrar')) {
            return redirect('/login');
        }
        $db      = App::resolve('database');
        $usuario = $db->query("SELECT * FROM usuarios WHERE email = :email", Usuario::class, [
            'email' => $_POST['email'],
        ])->fetch();

        if ($usuario) {
            flash()->push('validacoes_registrar', ["email ja cadastrado"]);

            return redirect("/login");
        }
        $usuario = $db->query("INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)", Usuario::class, [
            'nome'  => $_POST['nome'],
            'email' => $_POST['email'],
            'senha' => password_hash($_POST['senha'], PASSWORD_DEFAULT),
        ]);

        flash()->push('mensagem', 'Usuario cadastrado com sucesso!');

        return redirect('/login');
    }
}
