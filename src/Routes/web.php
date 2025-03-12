<?php

namespace App\Routes;

use App\Controllers\CarroController;
use App\Controllers\ClienteController;
use App\Controllers\HomeController;

$router->get('/', [HomeController::class, 'index']);

$router->get('/carros', [CarroController::class, 'index']);
$router->get('/carros/buscar', [CarroController::class, 'pesquisa']);

$router->get('/carros/cadastrar', [CarroController::class, 'cadastrar']);
$router->get('/carros/cadastrar/{id?}', [CarroController::class, 'cadastrar']);
$router->post('/carros/salvar', [CarroController::class, 'salvar']);
$router->get('/carros/excluir/{id}', [CarroController::class, 'excluir']);

$router->get('/clientes', [ClienteController::class, 'index']);
$router->post('/clientes/pesquisa', [ClienteController::class, 'pesquisaCliente']);
$router->get('/clientes/cadastrar', [ClienteController::class, 'cadastroCliente']);
$router->get('/clientes/cadastrar/{id?}', [ClienteController::class, 'cadastroCliente']);
$router->post('/clientes/salvar', [ClienteController::class, 'salvarCliente']);
$router->get('/clientes/excluir/{id}', [ClienteController::class, 'excluirCliente']);
