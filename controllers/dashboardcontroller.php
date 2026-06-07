<?php

require_once __DIR__ . '/../models/dashboardmodels.php';

class DashboardController
{
    public function index()
    {
        $model = new DashboardModel();

        $musicas = $model->listarMusicas();

        require __DIR__ . '/../views/dashboardview.php';
    }
}