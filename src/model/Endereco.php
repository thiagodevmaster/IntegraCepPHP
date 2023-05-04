<?php

namespace App\model;

/***
 *  Aqui é a primeira entidade do sistema onde posso atribuir as regras de negócio
 *  e definir atributos que quero persistir no banco.
 */

class Endereco
{
    private int $id;

    public function __construct(
        private string $nome,
        private string $cep,
        private string $numero,
        private string $complemento
        )
    {        
    }

    public function buscarId(): int
    {
        return $this->id;
    }

    public function buscarNome(): string
    {
        return $this->nome;
    }

    public function buscarCep(): string
    {
        return $this->cep;
    }

    public function buscaNumero(): string
    {
        return $this->numero;
    }

    public function buscarComplemento(): string
    {
        return $this->complemento;
    }

    public function definirId(int $id): void
    {
        $this->id = $id;
    }

}