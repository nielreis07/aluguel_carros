<?php

namespace App\Routes;

use App\Controllers\HomeController;
use App\Controllers\CarroController;

$router->get('/carros', [CarroController::class, 'index']);
$router->get('/carros/buscar', [CarroController::class, 'pesquisa']);

$router->get('/carros/cadastrar', [CarroController::class, 'cadastrar']);
$router->get('/carros/cadastrar/{id?}', [CarroController::class, 'cadastrar']);
$router->post('/carros/salvar', [CarroController::class, 'salvar']);
$router->get('/carros/excluir/{id}', [CarroController::class, 'excluir']);
