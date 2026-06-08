<?php

require_once __DIR__ . '/../config/database.php';

class AvaliacaoModel
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function salvarAvaliacao($id_usuario, $id_musica, $nota, $comentario)
    {
        $sql = "INSERT INTO avaliacao (QTD_ESTRELAS, DESCRICAO, ID_USUARIO, ID_MUSICA) 
                VALUES (?, ?, ?, ?)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("isis", $nota, $comentario, $id_usuario, $id_musica);

        return $stmt->execute();
    }

    public function listarAvaliacoesPorMusica($id_musica)
    {
        $sql = "SELECT a.*, u.NOME as nome_usuario 
                FROM avaliacao a 
                JOIN usuarios u ON a.ID_USUARIO = u.ID_USUARIO 
                WHERE a.ID_MUSICA = ? 
                ORDER BY a.ID_AVALIACAO DESC";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id_musica);
        $stmt->execute();
        
        $result = $stmt->get_result();
        $avaliacoes = [];
        while ($row = $result->fetch_assoc()) {
            $avaliacoes[] = $row;
        }
        return $avaliacoes;
    }
}