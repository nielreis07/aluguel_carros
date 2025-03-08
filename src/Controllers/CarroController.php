<?php

namespace App\Controllers;

use App\Core\Request;
use App\Core\View;
use App\Models\Carro;

class CarroController {
    public function pesquisa() {
        $pesquisa = isset($_GET['pesquisa']) ? $_GET['pesquisa'] : '';
        $carros = Carro::buscarCarrosPorModelo($pesquisa);
       
        // include 'views/pesquisa.php';
        return View::render('carros.search', ['title' => '', 'carros' => $carros]);
    }

    public function cadastrar(Request $request, $id = null) {

        $dadosParaView = [];
        if (!empty($id)) {
            
            $dadosParaView = Carro::buscarPorId($id);
        }

        return View::render(
            'carros.cadastrar', 
            ['dados' => $dadosParaView], 
            'adm'
        );

    }

    public function salvar(Request $request) {

        $post = $request->getBody();

        if (!empty($id)) {

            Carro::alterarCarros($post); 
        } else {

            $post['id'] = Carro::salvarCarros($post);
        }

        return View::render(
            'carros.cadastrar', 
            ['dados' => $post], 
            'adm'
        );
    }
    

}
