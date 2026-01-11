<?php

class DB
{
  public function livros()
  {
    $db = new PDO("sqlite:database.sqlite");
    $query = $db->query("select * from livros");
    $livros = $query->fetchAll();
    return $livros;
  }
}
