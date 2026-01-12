<?php
if (!auth()) {
  header("Location: /");
  exit();
}
$livros = $DB->query(
  query: "select * from livros where usuario_id = :id",
  class: Livro::class,
  params: ['id' => auth()->id]
);
view("meus-livros", compact('livros'));
