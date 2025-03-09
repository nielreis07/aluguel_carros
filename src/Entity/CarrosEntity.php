<?php 

namespace App\Entity;

class CarrosEntity
{
    private $id; 
    private $modelo; 
    private $marca; 
    private $ano; 
    private $placa; 
    private $status; 
    private $preco; 
    private $imagem;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getModelo(): string
    {
        return $this->modelo;
    }

    public function setModelo(string $modelo)
    {
        if (strlen($modelo) < 2 || strlen($modelo) > 50) {
            throw new \Exception("Modelo inválido", 422);
        }

        $this->modelo = $modelo;
    }

    public function getMarca(): string
    {
        return $this->marca;
    }

    public function setMarca(string $marca)
    {
        if (strlen($marca) < 2 || strlen($marca) > 50) {
            throw new \Exception("Marca inválida", 422);
        }
        $this->marca = $marca;
    }

    public function getAno(): int
    {
        return $this->ano;
    }

    public function setAno(int $ano)
    {
        if (!is_numeric($ano) || $ano < 2000 || $ano > (int)date("Y") + 2) {
            throw new \Exception("Ano inválido", 422);
        }

        $this->ano = $ano;
    }

    public function getPlaca(): string
    {
        return $this->placa;
    }

    public function setPlaca(string $placa)
    {
        if (!preg_match('/^[A-Z]{3}[0-9]{4}$/', $placa)) {
            throw new \Exception("Placa inválida", 422);
        }
        $this->placa = $placa;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status)
    {
        $statusPermitidos = ['disponivel', 'alugado', 'manutencao'];
        if (!in_array($status, $statusPermitidos)) {
            throw new \Exception("Status inválido", 422);
        }
        $this->status = $status;
    }

    public function setPreco(float|int $preco)
    {
        if (!is_numeric($preco) || $preco < 0) {
            throw new \Exception("Preço inválido", 422);
        }
        $this->preco = $preco;
    }

    public function getPreco(): float|int
    {
        return $this->preco;
    }

    public function getImagem(): string
    {
        return $this->imagem;
    }

    public function setImagem(string $imagem)
    {
        $this->imagem = $imagem;
    }
}