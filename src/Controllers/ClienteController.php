<?php 

namespace App\Controllers;

use App\Core\FlashMessage;
use App\Core\View;
use App\Models\ClientesModel;
use App\Core\Request;
use App\Entity\ClientesEntity;

class ClienteController {
    
    public function index() {
        $clientes = ClientesModel::listarClientes();
        return View::render('cliente.index', ['title' => 'Clientes', 'clientes' => $clientes], 'adm');
    }

    public function pesquisaCliente(Request $request) 
    {
        $post = $request->getBody();
        $termo = $post['termo'] ?? null;
        $clientes = [];

        if (empty($termo)) {
            $clientes = ClientesModel::listarClientes();
            return View::render('cliente.index', ['title' => 'Clientes', 'clientes' => $clientes], 'adm');
        }
        $clientes = ClientesModel::buscarClientesPorNome($termo);
        return View::render('cliente.index', ['title' => 'Clientes', 'clientes' => $clientes], 'adm');

        
    }

    public function cadastroCliente(Request $request, $id = null) {

        $dadosParaView = [];
        if (!empty($id)) {
            
            $dadosParaView = ClientesModel::buscarPorId($id);
        }
        $dadosView = ['dados' => $dadosParaView];

        if (FlashMessage::get('mensagem')) {
            $dadosView['mensagem'] = FlashMessage::get('mensagem');
            FlashMessage::clear('mensagem');
        } 
        return View::render('cliente.cadastrar', $dadosView, 'adm');
    }

    public function salvarCliente(Request $request) {
        $post = $request->getBody();
        $id = $post['id'] ?? null;

        try {
            
            $clientes = new ClientesEntity();
            $clientes->setId((int) $post['id']);
            $clientes->setNomeCompleto($post['nome_completo']);
            $clientes->setDataNascimento($post['data_nascimento']);
            $clientes->setCpf($post['cpf']);
            $clientes->setCnh($post['cnh']);
            $clientes->setEmail($post['email']);
            $clientes->setTelefone($post['telefone']);
            $clientes->setEndereco($post['endereco']);
                   
            if(!empty($id)) {
                ClientesModel::atualizar($clientes);
            } else {
                $id = ClientesModel::inserir($clientes);
            }

            FlashMessage::set('mensagem', 'Cliente salvo com sucesso!');
            return header('Location: /clientes/cadastrar/' . $id);
        } catch (\Exception $e) {
            FlashMessage::set('mensagem', $e->getMessage(), 'danger');
            return header('Location: /clientes/cadastrar/' . $id);
        }
    }

    public function excluirCliente(Request $request, int $id) {
        if (empty($id)) {
            FlashMessage::set('mensagem', 'Cliente não encontrado', 'danger');
            return header('Location: /clientes');
        }

        try {
            ClientesModel::deletarClientes($id);
            FlashMessage::set('mensagem', 'Cliente excluído com sucesso!');
            return header('Location: /clientes');
        } catch (\Exception $e) {
            dd($e->getMessage());
            FlashMessage::set('mensagem', $e->getMessage(), 'danger');
            return header('Location: /clientes');
        }
    }
}
