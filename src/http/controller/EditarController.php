<?php

namespace App\http\controller;

use App\Repositorio\RepositorioDeEnderecos;
use App\utilitarios\FlashMessages;
use App\utilitarios\RenderizadorDeViewsTrait;
use App\utilitarios\ValidaCepTrait;
use App\utilitarios\ValidaDadosTrait;

class EditarController implements Controller
{
    use ValidaDadosTrait;
    use ValidaCepTrait;
    use FlashMessages;
    use RenderizadorDeViewsTrait;

    public function __construct(private RepositorioDeEnderecos $repositorio)
    {        
    }

    public function processaRequisicao(): void
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $nome        = filter_input(INPUT_POST, 'nome');
            $cep         = filter_input(INPUT_POST, 'cep');
            $numero      = filter_input(INPUT_POST, 'numero');
            $complemento = filter_input(INPUT_POST, 'complemento');
            $id          = filter_input(INPUT_POST, 'id');

            $endereco = $this->validar($nome, $cep, $numero, $complemento);
            $endereco->definirId((int) $id);

            if($this->repositorio->editarEndereco($endereco) !== true){
                $this->defineMensagem('danger', "Usuário '{$endereco->buscarNome()}' não foi atualizado(a).");
                header('Location: /', 302);
            };

            $this->defineMensagem('success', "Usuário '{$endereco->buscarNome()}' atualizado(a) com sucesso.");
            header('Location: /', 302);
        }   
    }
}