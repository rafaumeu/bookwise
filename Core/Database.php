<?php

declare(strict_types = 1);

namespace Core;

use PDO;

class Database
{
    private function __construct(private PDO $connection)
    {
    }

    /**
     * Summary of make
     * @param array<string, string> $config
     * @return self
     */
    public static function make(array $config): self
    {
        $dsn = "sqlite:" . $config['database'];

        try {
            $connection = new PDO($dsn);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_CLASS);

            return new self($connection);
        } catch (\PDOException $e) {
            abort(500, "Database connection failed: ");

            exit;
        }
    }

    /**
     * Summary of query
     * @param string $query
     * @param string|null $class
     * @param array<string, mixed> $params
     * @return mixed
     */
    public function query(string $query, string $class = null, array $params = []): mixed
    {
        $smt = $this->connection->prepare($query);

        if ($class) {
            $smt->setFetchMode(PDO::FETCH_CLASS, $class);
        }
        $smt->execute($params);

        return $smt;
    }
}
