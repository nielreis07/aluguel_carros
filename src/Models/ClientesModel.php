<?php

namespace App\Models;

use App\Core\Database;
use App\Core\Request;
use App\Entity\ClientesEntity;
use PDO;
use PDOException;

class ClientesModel
{

    public static function listarClientes()
    {
        $sql = 'SELECT * FROM clientes';
        $stmt = Database::getConnection()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
    

    public static function buscarClientesPorNome($nome)
    {
        $sql = 'SELECT * FROM clientes WHERE nome_completo LIKE :nome';
        $stmt = Database::getConnection()->prepare($sql);
        $stmt->bindValue(':nome', "%$nome%");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function buscarPorId($id)
    {
        $sql = 'SELECT * FROM clientes WHERE id = :id';
        $stmt = Database::getConnection()->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    public static function atualizar($cliente)
    {
        try {
            $sql = "UPDATE clientes SET 
                nome_completo = :nome_completo, 
                data_nascimento = :data_nascimento, 
                cpf = :cpf, 
                cnh = :cnh, 
                email = :email, 
                telefone = :telefone, 
                endereco = :endereco 
            WHERE id = :id";
    
            $stmt = Database::getConnection()->prepare($sql);
            $stmt->bindValue(':nome_completo', $cliente->getNomeCompleto());
            $stmt->bindValue(':data_nascimento', $cliente->getDataNascimento());
            $stmt->bindValue(':cpf', $cliente->getCpf());
            $stmt->bindValue(':cnh', $cliente->getCnh());
            $stmt->bindValue(':email', $cliente->getEmail());
            $stmt->bindValue(':telefone', $cliente->getTelefone());
            $stmt->bindValue(':endereco', $cliente->getEndereco());
            $stmt->bindValue(':id', $cliente->getId());
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }           

    public static function inserir($cliente)
    {
        try {
            dd($cliente);
            $sql = "INSERT INTO clientes (nome_completo, data_nascimento, cpf, cnh, email, telefone, endereco) 
                VALUES (:nome_completo, :data_nascimento, :cpf, :cnh, :email, :telefone, :endereco)";
            $stmt = Database::getConnection()->prepare($sql);
            $stmt->bindValue(':nome_completo', $cliente->getNomeCompleto());
            $stmt->bindValue(':data_nascimento', $cliente->getDataNascimento());
            $stmt->bindValue(':cpf', $cliente->getCpf());
            $stmt->bindValue(':cnh', $cliente->getCnh());
            $stmt->bindValue(':email', $cliente->getEmail());
            $stmt->bindValue(':telefone', $cliente->getTelefone());
            $stmt->bindValue(':endereco', $cliente->getEndereco());
            
            // RETORNA O ÚLTIMO ID INSERIDO
            $stmt->execute();
            return Database::getConnection()->lastInsertId();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public static function editarCliente(ClientesEntity $cliente): bool
    {
        try {
           
            $sql = "UPDATE clientes SET nome_completo = ?, data_nascimento = ?, cpf = ?, cnh = ?, 
                email = ?, telefone = ?,  endereco = ? WHERE id = ?";

            // PREPARA A CONEXÃO COM O BANCO DE DADOS COM STATEMENT
            $stmt = Database::getConnection()->prepare($sql);

            // SUBSTITUI OS ? PELOS DADOS QUE VEM POR PARÂMETRO
            $stmt->bindValue(1, $cliente->getNomeCompleto(), PDO::PARAM_STR);
            $stmt->bindValue(2, $cliente->getDataNascimento(), PDO::PARAM_STR);
            $stmt->bindValue(3, $cliente->getCpf(), PDO::PARAM_INT);
            $stmt->bindValue(4, $cliente->getCnh(), PDO::PARAM_STR);
            $stmt->bindValue(5, $cliente->getEmail(), PDO::PARAM_STR);
            $stmt->bindValue(6, $cliente->getTelefone(), PDO::PARAM_STR);
            $stmt->bindValue(7, $cliente->getEndereco(), PDO::PARAM_STR);

            // EXECUTA A QUERY
            $stmt->execute();

            // RETORNA TRUE SE A QUERY FOR EXECUTADA
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
        
}


    public static function deletarClientes($id)
    {
        try {
            $sql = "DELETE FROM clientes WHERE id = :id";

            $stmt = Database::getConnection()->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            
            return $stmt->execute();

        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

}
