<?php

require_once __DIR__ . '/../config/database.php';

class Musica
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function Cadastrar($nome, $descricao, $idUsuario)
    {
        $sql = "INSERT INTO musica (NOME, DESCRICAO, ID_USUARIO)
            VALUES (?, ?, ?)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssi", $nome, $descricao, $idUsuario);

        return $stmt->execute();
    }

    public function Editar($id, $nome, $descricao)
    {
        $sql = "UPDATE musica
            SET NOME = ?, DESCRICAO = ?
            WHERE ID_MUSICA = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssi", $nome, $descricao, $id);

        return $stmt->execute();
    }

    public function Excluir($id)
    {
        $sql1 = "DELETE FROM avaliacao WHERE ID_MUSICA = ?";
        $stmt1 = $this->conn->prepare($sql1);
        $stmt1->bind_param("i", $id);
        $stmt1->execute();

        $sql2 = "DELETE FROM musica WHERE ID_MUSICA = ?";
        $stmt2 = $this->conn->prepare($sql2);
        $stmt2->bind_param("i", $id);
        return $stmt2->execute();
    }

    public function listarMinhasMusicas($id_usuario)
    {

        $sql = "SELECT * FROM musica WHERE ID_USUARIO = '$id_usuario'";
        $result = $this->conn->query($sql);

        $musicas = [];
        while ($row = $result->fetch_assoc()) {
            $musicas[] = $row;
        }
        return $musicas;
    }

    public function buscarPorId($id)
    {
        $sql = "SELECT * FROM musica WHERE ID_MUSICA = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }
}
