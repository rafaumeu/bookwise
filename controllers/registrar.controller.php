<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $validacoes = [];
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $email_confirmacao = $_POST['email_confirmacao'];
  $senha = $_POST['senha'];

  if (strlen($nome) < 3) {
    $validacoes[] = "O nome precisa ter pelo menos 3 caracteres";
  }
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $validacoes[] = "O email é inválido";
  }
  if ($email != $email_confirmacao) {
    $validacoes[] = "Os emails estão diferentes";
  }
  if (strlen($senha) < 8 || strlen($senha) > 30) {
    $validacoes[] = "A senha precisa ter entre 8 e 30 caracteres.";
  }
  if (!preg_match("/[A-Z]/", $senha)) {
    $validacoes[] = "A senha precisa conter pelo menos uma letra maiúscula.";
  }
  if (!preg_match("/[^a-zA-Z0-9]/", $senha)) {
    $validacoes[] = "A senha precisa conter pelo menos um caractere especial.";
  }
  if (sizeof($validacoes) > 0) {
    $_SESSION['validacoes'] = $validacoes;
    view("login", [
      "validacoes" => $validacoes
    ]);
    exit();
  }
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
