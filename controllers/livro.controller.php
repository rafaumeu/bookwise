<?php
$livro = $DB->query("select * from livros where id = :id", Livro::class, ["id" => $_REQUEST['id']])->fetch();
$avaliacoes = $DB->query(
  query: 'select * from avaliacoes where livro_id = :id',
  class: Avaliacao::class,
  params: ['id' => $_GET['id']]
)->fetchAll();
foreach ($avaliacoes as $avaliacao) {
  $avaliacao->usuario = $DB->query(
    query: 'select * from usuarios where id = :id',
    class: Usuario::class,
    params: ["id" => $avaliacao->usuario_id]
  )->fetch();
}
view("livro", ["livro" => $livro, "avaliacoes" => $avaliacoes]);
