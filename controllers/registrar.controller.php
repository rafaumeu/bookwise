<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $DB->query(
    query: 'insert into usuarios (email,senha, nome) values (:email,:senha, :nome)',
    params: [
      'nome' => $_POST['nome'],
      'email' => $_POST['email'],
      // 'email_confirmacao' => $_POST['email_confirmacao'],
      'senha' => password_hash($_POST['senha'], PASSWORD_DEFAULT)
    ]
  );
  header("location: /login?mensagem=Registrado com sucesso");
  exit();
}
