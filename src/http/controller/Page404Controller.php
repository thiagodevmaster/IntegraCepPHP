<?php

namespace App\http\controller;

use App\utilitarios\RenderizadorDeViewsTrait;

class Page404Controller implements Controller
{
    use RenderizadorDeViewsTrait;

    public function processaRequisicao(): void
    {
        echo $this->render('page404');
    }
}