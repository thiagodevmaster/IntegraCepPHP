<?php

namespace App\http\controller;

use App\Repositorio\RepositorioDeEnderecos;
use App\utilitarios\RenderizadorDeViewsTrait;

/**
 * Este Controller apenas é responsável por substituir o formulário de criação pelo de edição
 * Com os respectivos dados do endereço solicitado
 * 
 */

class FormEdicaoController implements Controller
{

    use RenderizadorDeViewsTrait;

    public function __construct(private RepositorioDeEnderecos $repositorio)
    {
    }

    public function processaRequisicao(): void
    {   

        $id = $_GET['id'];
        $end = $this->repositorio->procurarPorId($id);

        echo $this->render('index', [
            "end" => $end,
            "enderecos" => $this->repositorio->todosOsEnderecos()
        ]);
    }
}