<?php

require_once __DIR__ . '/../config/database.php';

class DashboardModel
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function listarMusicas()
    {
        $sql = "SELECT * FROM musica ORDER BY nome";
        $result = $this->conn->query($sql);
        
        $musicas = [];
        while ($row = $result->fetch_assoc()) {
            $musicas[] = $row;
        }
        return $musicas;
    }
}