<?php

namespace App\http\controller;

/**
 * Controller responsável por renderizar a página inicial 
 * 
 */
use App\Repositorio\RepositorioDeEnderecos;
use App\utilitarios\RenderizadorDeViewsTrait;

class IndexController implements Controller
{
    use RenderizadorDeViewsTrait;

    public function __construct(private RepositorioDeEnderecos $repositorio)
    {
    }

    public function processaRequisicao(): void
    {
        $enderecos = $this->repositorio->todosOsEnderecos();
        echo $this->render('index', [
            'enderecos' => $enderecos
        ]);
    }
}