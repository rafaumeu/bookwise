<?php
$db = new PDO("sqlite:database.sqlite");
$query = $db->query("select * from livros");
$livros = $query->fetchAll();
