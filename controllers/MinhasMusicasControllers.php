<?php
require_once __DIR__ . '/../models/MinhasMusicas.php';

class MusicasController{

    private $musicaModel;

    public function __construct()
    {
        $this->musicaModel = new Musica();
    }

    public function CadastrarMusica(){
        $nomeMusica = $_POST['nomeMusica'];
        $descMusica = $_POST['descMusica'];

        $this->musicaModel->Cadastrar(
                $nomeMusica,
                $descMusica
            );
    }

}