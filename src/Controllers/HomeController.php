<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Carro;
use App\Models\User;

class HomeController
{
    public function index()
    {
        $usuarios = User::getAll();

        $pesquisa = isset($_GET['pesquisa']) ? $_GET['pesquisa'] : '';
        $carros = Carro::buscarCarrosPorModelo($pesquisa);

        return View::render('home.index', ['title' => '', 'usuarios' => $usuarios, 'carros' => $carros]);
    }
}
