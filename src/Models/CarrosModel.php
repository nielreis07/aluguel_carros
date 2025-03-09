<?php

namespace App\Models;

use App\Core\Database;
use App\Entity\CarrosEntity;
use PDO;
use PDOException;

class CarrosModel {

    public static function listarCarros() {
        // CRIA A QUERY SQL PARA BUSCAR TODOS OS CARROS
        $sql = "SELECT * FROM carros";

        // PREPARA A CONEXÃO COM O BANCO DE DADOS COM STATEMENT
        $stmt = Database::getConnection()->prepare($sql);

        // EXECUTA A QUERY
        $stmt->execute();

        // RETORNA O RESULTADO DA QUERY
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public static function buscarPorId(int $id) {
        // CRIA A QUERY SQL PARA BUSCAR OS CARROS POR ID
        $sql = "SELECT * FROM carros WHERE id = ?";

        // PREPARA A CONEXÃO COM O BANCO DE DADOS COM STATEMENT
        $stmt = Database::getConnection()->prepare($sql);

        // SUBSTITUI O ? PELO ID QUE VEM POR PARÂMETRO
        $stmt->bindParam(1, $id, PDO::PARAM_INT);

        // EXECUTA A QUERY
        $stmt->execute();

        // RETORNA O RESULTADO DA QUERY
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function buscarCarrosPorModelo($modelo) {

        $sql = "SELECT * FROM carros WHERE modelo LIKE ?";
        $stmt = Database::getConnection()->prepare($sql);

        $modelo_param = "%$modelo%";
        $stmt->bindParam(1, $modelo_param, PDO::PARAM_STR);
        

        // echo $stmt->queryString; exit;
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function salvarCarros(CarrosEntity $carros): bool
    {
        try {
            
            $sql = "INSERT INTO carros (modelo, marca, ano, placa, status, preco, imagem) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = Database::getConnection()->prepare($sql);
            $stmt->bindValue(1, $carros->getModelo(), PDO::PARAM_STR);
            $stmt->bindValue(2, $carros->getMarca(), PDO::PARAM_STR);
            $stmt->bindValue(3, $carros->getAno(), PDO::PARAM_INT);
            $stmt->bindValue(4, $carros->getPlaca(), PDO::PARAM_STR);
            $stmt->bindValue(5, $carros->getStatus(), PDO::PARAM_STR);
            $stmt->bindValue(6, $carros->getPreco(), PDO::PARAM_STR);
            $stmt->bindValue(7, $carros->getImagem(), PDO::PARAM_STR);

            $stmt->execute();
            
            // RETORNA O ÚLTIMO ID INSERIDO
            return Database::getConnection()->lastInsertId();

        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public static function alterarCarros(CarrosEntity $carros): bool
    {
        try {
            // CRIA A QUERY SQL PARA ATUALIZAR OS CARROS
            // PASSANDO POR PARÂMETRO OS DADOS QUE VEM DO FORMULÁRIO
            // NO WHERE É PASSADO O ID DO CARRO QUE VEM POR PARÂMETRO
            $sql = "UPDATE carros SET modelo = ?, marca = ?, ano = ?, placa = ?, 
                status = ?, preco = ?, imagem = ? WHERE id = ?";

            // PREPARA A CONEXÃO COM O BANCO DE DADOS COM STATEMENT
            $stmt = Database::getConnection()->prepare($sql);

            // SUBSTITUI OS ? PELOS DADOS QUE VEM POR PARÂMETRO
            $stmt->bindValue(1, $carros->getModelo(), PDO::PARAM_STR);
            $stmt->bindValue(2, $carros->getMarca(), PDO::PARAM_STR);
            $stmt->bindValue(3, $carros->getAno(), PDO::PARAM_INT);
            $stmt->bindValue(4, $carros->getPlaca(), PDO::PARAM_STR);
            $stmt->bindValue(5, $carros->getStatus(), PDO::PARAM_STR);
            $stmt->bindValue(6, $carros->getPreco(), PDO::PARAM_STR);
            $stmt->bindValue(7, $carros->getImagem(), PDO::PARAM_STR);
            $stmt->bindValue(8, $carros->getId(), PDO::PARAM_INT);

            // EXECUTA A QUERY
            $stmt->execute();

            // RETORNA TRUE SE A QUERY FOR EXECUTADA
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public static function deletarCarros(int $id): bool
    {
        try {
            // CRIA A QUERY SQL PARA DELETAR OS CARROS
            // PASSANDO POR PAR'AMETRO O ID DO CARRO QUE VEM POR PARÂMETRO
            $sql = "DELETE FROM carros WHERE id = ?";

            // PREPARA A CONEXÃO COM O BANCO DE DADOS COM STATEMENT
            $stmt = Database::getConnection()->prepare($sql);

            // SUBSTITUI O ? PELO ID QUE VEM POR PARÂMETRO
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
           
            // EXECUTA A QUERY
            $stmt->execute();
            
            // RETORNA TRUE SE A QUERY FOR EXECUTADA
            return true;

        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }

    }
}
