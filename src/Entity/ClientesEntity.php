<?php
 
namespace App\Entity;

class ClientesEntity {
    private $id;
    private $nomeCompleto; 
    private $dataNascimento; 
    private $cpf; 
    private $cnh; 
    private $email; 
    private $telefone; 
    private $Endereco; 

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(?int $id)
    {
        $this->id = $id;
    }

    public function getNomeCompleto(): string
    {
        return $this->nomeCompleto;
    }
    public function setNomeCompleto(string $nomeCompleto)
    {
        $this->nomeCompleto = $nomeCompleto;
    }

    public function getDataNascimento(): string
    {
        return $this->dataNascimento;
    }
    public function setDataNascimento(string $dataNascimento) {
        $birthDate = new \DateTime($dataNascimento);
        $currentDate = new \DateTime();
        $age = $currentDate->diff($birthDate)->y;

        if ($age < 18) {
            throw new \Exception("Não está autorizado a alugar um carro.");
        }

        $this->dataNascimento = $dataNascimento;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }
    public function setCpf(string $cpf)
    {
        $this->cpf = $cpf;
    }

    public function getCnh(): string
    {
        return $this->cnh;
    }
    public function setCnh(string $cnh)
    {
        $this->cnh = $cnh;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getTelefone(): string
    {
        return $this->telefone;
    }
    public function setTelefone(string $telefone)
    {
        $this->telefone = $telefone;
    }

    public function getEndereco(): string
    {
        return $this->Endereco;
    }
    public function setEndereco(string $Endereco)
    {
        $this->Endereco = $Endereco;
    }

}
