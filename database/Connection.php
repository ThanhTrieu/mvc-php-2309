<?php
namespace database;

use PDO;

class Connection
{
    public $db;

    public function __construct()
    {
        $this->db = $this->getConnection();
    }

    protected function getConnection()
    {
        $pdo = new PDO(DATABASE.':host='.HOST.';dbname='.DBNAME, DB_USERNAME, DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        return $pdo;
    }

    public function __destruct()
    {
        $this->db = null; // ngat ket noi toi database
    }
}