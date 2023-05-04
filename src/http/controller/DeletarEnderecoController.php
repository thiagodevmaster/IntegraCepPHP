<?php

namespace App\http\controller;

use App\Repositorio\RepositorioDeEnderecos;
use App\utilitarios\FlashMessages;

class DeletarEnderecoController implements Controller
{
    use FlashMessages;

    public function __construct(private RepositorioDeEnderecos $repositorio)
    {
    }

    public function processaRequisicao(): void
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
            
            if($this->repositorio->deletarEndereco($id) !== true){
                $this->defineMensagem('danger', 'Não foi possivel deletar o endereço.');
                header('Location: /', 302);
                exit();
            }

            $this->defineMensagem('success', 'Endereço deletado com sucesso.');
            header('Location: /', 302);
        }   
    }
}