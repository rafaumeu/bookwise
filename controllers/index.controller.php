<?php
$pesquisar = $_REQUEST["pesquisar"] ?? "";
$livros = $DB->query(
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
   where l.titulo like :filtro or l.autor like :filtro or l.descricao like :filtro
   group by l.id, l.titulo, l.ano_lancamento, l.autor, l.descricao",
  class: Livro::class,
  params: ["filtro" => "%$pesquisar%"]
)->fetchAll();
view("index", ["livros" => $livros]);
