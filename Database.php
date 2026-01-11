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
    $prepare = $this->db->prepare($sql);
    $prepare->setFetchMode(PDO::FETCH_CLASS, Livro::class);
    $prepare->execute($params);
    return $prepare->fetchAll();
  }
  /**
   * Retorna apenas um livro do banco de dados pelo id
   * @param mixed $id
   * @return Livro
   */
  public function livro($id)
  {
    $sql = "select * from livros where id = :id";
    $prepare = $this->db->prepare($sql);
    $prepare->bindValue("id", $id);
    $prepare->setFetchMode(PDO::FETCH_CLASS, Livro::class);
    $prepare->execute();
    return $prepare->fetch();
  }
}
