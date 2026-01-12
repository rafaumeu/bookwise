<?php
$livro = $DB->query(
  query: "select 
   l.id, 
   l.titulo, 
   l.ano_lancamento, 
   l.autor, 
   l.descricao, 
   round(sum(a.nota) / 5.0) as nota_avaliacao, 
   count(a.id) as count_avaliacoes 
   from livros l
   left join avaliacoes a on a.livro_id = l.id 
   where l.id = :id
   group by l.id, l.titulo, l.ano_lancamento, l.autor, l.descricao",
  class: Livro::class,
  params: ["id" => $_REQUEST['id']]
)->fetch();
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
