<?php 
declare(strict_types= 1);

namespace Core;
use PDO;
class Database {
  
  private function __construct(private PDO $connection) {
  }
  public static function make(array $config): self {
    $dsn = "sqlite:" . $config['database'];
    try {

      $connection = new PDO($dsn);
      $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_CLASS);
      return new self($connection);
    } catch (\PDOException $e) {
      abort(500, "Database connection failed: ");
    }
  }
  public function query(string $query, array $params =[]):mixed {
    $smt = $this->connection->prepare($query);
    $smt->execute($params);
    return $smt;
  }
}