<?php
$mensagem = $_REQUEST['mensagem'] ?? '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  $senha = $_POST['senha'];

  $usuario = $DB->query(
    query: "select * from usuarios where email = :email",
    class: Usuario::class,
    params: [
      'email' => $email,
    ]
  )->fetch();
  if ($usuario && password_verify($senha, $usuario->senha)) {
    $_SESSION['auth'] = $usuario;
    $_SESSION['mensagem'] = 'Seja bem-vindo(a) ' . $usuario->nome . '!';
    header("location: /");
    exit();
  } else {
    $erro_login = "Usuário ou senha incorretos";
  }
}
view('login', ['erro_login' => $erro_login]);
