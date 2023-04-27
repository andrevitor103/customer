<?php

namespace src\infra\repository\connection;

use PDO;
use PDOException;

final class PDOConnection implements Connection {
    
    public PDO $connection;

    public function __construct()
    {
        try {
            $this->connection = new PDO("mysql:dbname=customer; host=localhost", "root", "");
        } catch(PDOException $e) {
            throw $e;
        }
    }
}
