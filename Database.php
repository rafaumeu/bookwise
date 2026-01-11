<?php

class DB
{
  /**
   * Retorna todos os livros do banco de dados
   * @return Livro[]
   */
  public function livros()
  {
    $db = new PDO("sqlite:database.sqlite");
    $query = $db->query("select * from livros");
    $livros = $query->fetchAll();
    $retorno = [];
    foreach ($livros as $item) {
      $livro = new Livro;
      $livro->id = $item['id'];
      $livro->titulo = $item['titulo'];
      $livro->autor = $item['autor'];
      $livro->descricao = $item['descricao'];
      $livro->avaliacoes = $item['avaliacoes'];
      $retorno[] = $livro;
    }
    return $retorno;
  }
}
