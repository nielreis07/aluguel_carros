<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\CarrosModel;
use App\Models\User;

class HomeController
{
    public function index()
    {
        $usuarios = User::getAll();

        $pesquisa = isset($_GET['pesquisa']) ? $_GET['pesquisa'] : '';
        $carros = CarrosModel::buscarCarrosPorModelo($pesquisa);

        return View::render('home.index', ['title' => '', 'usuarios' => $usuarios, 'carros' => $carros]);
    }
}
