<?php

namespace App\Repositorio;

/***
 * Ao fazer uso deste repositório, estará fazendo uso das seguintes funcionalidades:
 *      -- buscar todos os endereços
 *      -- adicionar novo endereço
 *      -- deletar algum endereço
 *      -- Editar algum endereço
 *      -- buscar endereço através do seu Id
 *      
 *      E esta classe recebe como parâmetro uma instância do PDO que faz conexão com o banco de dados 
 */

use App\model\Endereco;
use PDO;

class RepositorioDeEnderecos
{
    public function __construct(private PDO $pdo)
    {    
    }

    public function todosOsEnderecos(): array
    {
        $listaDeEnderecos = $this->pdo->query("SELECT * FROM enderecos;")
            ->fetchAll(PDO::FETCH_ASSOC);

        return $listaDeEnderecos;

    }

    public function criarEndereco(Endereco $endereco): bool
    {
        $sql = "INSERT INTO enderecos (nome, cep, numero, complemento) 
                VALUES (:nome, :cep, :numero, :complemento)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':nome', $endereco->buscarNome());
        $stmt->bindValue(':cep', $endereco->buscarCep());
        $stmt->bindValue(':numero', $endereco->buscaNumero());
        $stmt->bindValue(':complemento', $endereco->buscarComplemento());
        
        return $stmt->execute();

    }

    public function editarEndereco(Endereco $endereco): bool
    {
        $sql = 'UPDATE enderecos SET nome=:nome, cep=:cep, numero=:numero, complemento=:complemento WHERE (id=:id);';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':nome', $endereco->buscarNome());
        $stmt->bindValue(':cep', $endereco->buscarCep());
        $stmt->bindValue(':numero', $endereco->buscaNumero());
        $stmt->bindValue(':complemento', $endereco->buscarComplemento());
        $stmt->bindValue(':id', $endereco->buscarId(), PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function deletarEndereco(int $id): bool
    {
        $sql = 'DELETE FROM enderecos WHERE id=?;';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function procurarPorId(int $id): array
    {
        $sql = 'SELECT * FROM enderecos WHERE id=?;';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $id, PDO::PARAM_INT);
        $stmt->execute();

        $dadosDoEndereco = $stmt->fetch(PDO::FETCH_ASSOC);

        return $dadosDoEndereco;
    }

}