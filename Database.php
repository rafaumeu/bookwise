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
  public function livros()
  {
    $query = $this->db->query("select * from livros");
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
