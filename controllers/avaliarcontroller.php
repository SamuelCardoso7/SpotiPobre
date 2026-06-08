<?php

require_once __DIR__ . '/../models/dashboardmodels.php';

class AvaliarController
{
    public function index()
    {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        
        $model = new DashboardModel();
        $musicas = $model->listarMusicas();
        
        $musicaAtual = null;
        foreach ($musicas as $m) {
            if ($m['id'] === $id) {
                $musicaAtual = $m;
                break;
            }
        }

        if (!$musicaAtual) {
            header('Location: index.php');
            exit;
        }

        require __DIR__ . '/../views/avaliarview.php';
    }
}