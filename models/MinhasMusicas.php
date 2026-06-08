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

    public function Cadastrar($nome, $descricao)
    {
        $usuario = $_SESSION['id'];
        $sql = "INSERT INTO MUSICAS (nome, descricao, id_usuario) values (:nome, :descricao,: usuario)";
        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param(
            $nome,
            $descricao,
            $usuario
        );

        return $stmt->execute();
    }

    public function Editar($id_musica, $nome, $descricao)
    {
        $usuario = $_SESSION['id'];
        $sql = "UPDATE MUSICAS SET (nome, descricao) values (:nome, :descricao) WHERE id_musica = :id_musica";
        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param(
            $id_musica,
            $nome,
            $descricao
        );

        return $stmt->execute();
    }

    public function Excluir($id_musica)
    {
        $usuario = $_SESSION['id'];
        $sql = "DELETE MUSICAS WHERE id_musica = '$id_musica'";
        $result = $this->conn->query($sql);

        return $result;
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
}
