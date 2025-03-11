<?php

namespace App\Controllers;

use App\Core\FlashMessage;
use App\Core\Request;
use App\Core\View;
use App\Entity\CarrosEntity;
use App\Models\CarrosModel;

class CarroController {

    public function index() {
        $carros = CarrosModel::listarCarros();
        return View::render('carros.index', ['title' => 'Carros', 'carros' => $carros], 'adm');
    }

    public function pesquisa() {

    /*A função pesquisa() pega um termo digitado pelo usuário na URL, busca no banco de dados
     os carros cujo modelo corresponda a esse termo e retorna uma página com os resultados.*/

        $pesquisa = isset($_GET['pesquisa']) ? $_GET['pesquisa'] : '';
        $carros = CarrosModel::buscarCarrosPorModelo($pesquisa);
       
        // include 'views/pesquisa.php';
        return View::render('carros.search', ['title' => '', 'carros' => $carros]);
    }

    public function cadastrar(Request $request, $id = null) {

        $dadosParaView = [];
        if (!empty($id)) {
            
            $dadosParaView = CarrosModel::buscarPorId($id);
        }

        $dadosView = ['dados' => $dadosParaView];

        if (FlashMessage::get('mensagem')) {
            $dadosView['mensagem'] = FlashMessage::get('mensagem');
            FlashMessage::clear('mensagem');
        }

        return View::render(
            'carros.cadastrar', 
            $dadosView, 
            'adm'
        );

    }

    public function salvar(Request $request) {

        try {
            $post = $request->getBody();
    
            $carros = new CarrosEntity();
            $carros->setId($post['id']);
            $carros->setModelo($post['modelo']);
            $carros->setMarca($post['marca']);
            $carros->setAno($post['ano']);
            $carros->setPlaca($post['placa']);
            $carros->setStatus($post['status']);
            $carros->setPreco($post['preco']);
            $carros->setImagem($post['imagem']);
    
            if (!empty($carros->getId())) {
                CarrosModel::alterarCarros($carros ); 
            } else {
                CarrosModel::salvarCarros($carros );
            }


            FlashMessage::set('mensagem', 'Carro salvo com sucesso!');
            header('Location: /carros/cadastrar/' . $post['id']);
            exit;
        } catch (\Exception $e) {
            FlashMessage::set('mensagem', $e->getMessage(), 'danger');

            header('Location: /carros/cadastrar/' . $post['id']);
            exit;
        }
    }

    public function excluir(Request $request, $id = null) {
        CarrosModel::deletarCarros($id);
        header('Location: /carros');
        exit;
    }
    
}
