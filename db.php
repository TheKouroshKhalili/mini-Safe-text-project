<?php 


class Database {
    private static ?Database $instance = null;
    private \PDO $connection;

    private function __construct() {
        $this->connection = new \PDO('mysql:host=localhost;dbname=safeBox', 'root', '');
    }

    public static function getInstance(): Database {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection(): \PDO {
        return $this->connection;
    }


    public static function create(): ?PDO
    {
        return self::getInstance()->getConnection();
    }


}
?>