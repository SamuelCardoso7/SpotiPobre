<?php

require_once __DIR__ . '/../config/database.php';

class User
{
    private $conn;

    public function __construct()
    {
        $database = new database();
        $this->conn = $database->connect();
    }

    public function create($nome, $email, $senha)
    {
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios(nome, email, senha)
                VALUES (?, ?, ?)";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param(
            "sss",
            $nome,
            $email,
            $senhaHash
        );

        return $stmt->execute();
    }

    public function findByEmail($email)
    {
        $sql = "SELECT * FROM usuarios WHERE email = ?";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param("s", $email);

        $stmt->execute();

        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }
}