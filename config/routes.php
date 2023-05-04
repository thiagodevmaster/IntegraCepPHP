<?php

// Arquivo onde contém as rotas e seus respectivos metodos HTTP
// algumas rotas futuramente serão trocadas como 
// por exemplo: 
//      o método da rota de deletar será substituido por (DELETE)
//      E o método da rota Editar por (PUT ou PATCH)

use App\http\controller\CriacaoController;
use App\http\controller\DeletarEnderecoController;
use App\http\controller\EditarController;
use App\http\controller\FormEdicaoController;
use App\http\controller\IndexController;

// Quando solicitamos uma rota utilizando um método específico, seremos levados ao nosso ponto central
// da aplicação que será responsável por chamar o controller que desejamos.

return [
    "GET|/" => IndexController::class,
    "POST|/criar" => CriacaoController::class,
    "POST|/deletar" => DeletarEnderecoController::class,
    "GET|/editar" => FormEdicaoController::class,
    "POST|/editar" => EditarController::class
];