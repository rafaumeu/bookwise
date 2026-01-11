<?php

class DB
{
  private $db;
  public function __construct()
  {
    $this->db = new PDO("sqlite:database.sqlite");
  }
  /**
   * Retorna todos os livros do banco de dados
   * @return Livro[]
   */
  public function livros($pesquisa = null)
  {
    $params = [];
    $sql = "select * from livros";
    if ($pesquisa) {
      $sql .= " where titulo like :pesquisa or autor like :pesquisa or descricao like :pesquisa";
      $params = ["pesquisa" => "%$pesquisa%"];
    }
    $query = $this->db->prepare($sql);
    $query->execute($params);
    $livros = $query->fetchAll();
    return array_map(fn($item) => Livro::make($item), $livros);
  }
  /**
   * Retorna apenas um livro do banco de dados pelo id
   * @param mixed $id
   * @return Livro
   */
  public function livro($id)
  {
    $sql = "select * from livros where id = :id";
    $query = $this->db->prepare($sql);
    $query->execute(['id' => $id]);
    $item = $query->fetchAll();
    return array_map(fn($item) => Livro::make($item), $item)[0];
  }
}
