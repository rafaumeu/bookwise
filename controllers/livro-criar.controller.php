<?php
require 'Validacao.php';
if ($_SERVER["REQUEST_METHOD"] != "POST") {
  header("Location: /livros");
  exit();
}

if (!auth()) {
  abort(403);
}

$usuario_id = auth()->id;
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$descricao = $_POST['descricao'];
$ano_lancamento = $_POST['ano_lancamento'];

$validacao = Validacao::validar(regras: [
  "titulo" => ["required", "min:3", "max:255"],
  "autor" => ["required", "min:3", "max:255"],
  "descricao" => ["required", "min:3"],
  "ano_lancamento" => ["required", "min:4", "max:4"],
], dados: $_POST);

if ($validacao->naoPassou('livro')) {
  header('location: /meus-livros');
  exit();
}

$DB->query("insert into livros(titulo, autor, descricao, ano_lancamento, usuario_id) values(:titulo, :autor, :descricao, :ano_lancamento, :usuario_id)", params: compact("titulo", "autor", "descricao", "ano_lancamento", "usuario_id"));
flash()->push("mensagem", "Livro criado com sucesso!");
header("Location: /meus-livros");
exit();
