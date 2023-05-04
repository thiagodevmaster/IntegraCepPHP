<?php

// Aqui temos nosso ponto de entrada da aplicação, ou seja todas as rotas passarão por aqui
// e serão validadas.

use App\http\controller\Page404Controller;
use App\infra\database\CriarConexao;
use App\Repositorio\RepositorioDeEnderecos;

// aqui chamamos o nosso autoload que fará o carregamneto de nossas classes
require_once __DIR__ . "/../vendor/autoload.php";

// $pdo é a nossa conexão com o banco de dados em MYSQL
$pdo = CriarConexao::Conectar();

// Aqui temos a classe que fará toda a persistência no banco de dados e de fato 
// terá apenas esta responsabilidade.
$repositorioDeEnderecos = new RepositorioDeEnderecos($pdo);

session_start();

$rotas = require_once __DIR__ . "/../config/routes.php";
$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
$httpMethod = $_SERVER["REQUEST_METHOD"];

$key = "$httpMethod|$pathInfo";

// aqui será verificado o seguinte: 
//      se existe a chave ex: GET|/editar dentro do array $rotas
//      então atribuimos essa classe a variável $classController que por sua vez se torna a classe em si 
if(array_key_exists($key, $rotas)){
    $classController = $rotas["$httpMethod|$pathInfo"];
    $controller = new $classController($repositorioDeEnderecos);
}else{
    $controller = new Page404Controller();
}

$controller->processaRequisicao();