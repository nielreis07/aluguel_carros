<?php

namespace App\Models;

use App\Core\Database;
use PDO;
use PDOException;

class Carro {

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

    public static function salvarCarros(array $parametros): bool
    {
        try {
            $sql = "INSERT INTO carros (modelo, marca, ano, placa, status, preco, imagem) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = Database::getConnection()->prepare($sql);
            $stmt->bindParam(1, $parametros["modelo"], PDO::PARAM_STR);
            $stmt->bindParam(2, $parametros["marca"], PDO::PARAM_STR);
            $stmt->bindParam(3, $parametros["ano"], PDO::PARAM_INT);
            $stmt->bindParam(4, $parametros["placa"], PDO::PARAM_STR);
            $stmt->bindParam(5, $parametros["status"], PDO::PARAM_STR);
            $stmt->bindParam(6, $parametros["preco"], PDO::PARAM_STR);
            $stmt->bindParam(7, $parametros["imagem"], PDO::PARAM_STR);
    
            $stmt->execute();
            
            // RETORNA O ÚLTIMO ID INSERIDO
            return Database::getConnection()->lastInsertId();

        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public static function alterarCarros(array $parametros): bool
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
            $stmt->bindParam(1, $parametros["modelo"], PDO::PARAM_STR);
            $stmt->bindParam(2, $parametros["marca"], PDO::PARAM_STR);
            $stmt->bindParam(3, $parametros["ano"], PDO::PARAM_INT);
            $stmt->bindParam(4, $parametros["placa"], PDO::PARAM_STR);
            $stmt->bindParam(5, $parametros["status"], PDO::PARAM_STR);
            $stmt->bindParam(6, $parametros["preco"], PDO::PARAM_STR);
            $stmt->bindParam(7, $parametros["imagem"], PDO::PARAM_STR);
            $stmt->bindParam(8, $parametros["id"], PDO::PARAM_INT);

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
