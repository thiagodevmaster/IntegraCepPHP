<?php

namespace App\http\controller;

use App\Repositorio\RepositorioDeEnderecos;
use App\utilitarios\FlashMessages;
use App\utilitarios\ValidaCepTrait;
use App\utilitarios\ValidaDadosTrait;


/**
 * Classe Responsável por solicitar a inserção no banco de dados 
 * com endereço do usuário
 */
class CriacaoController implements Controller
{
    // Aqui é feita algumas importações de traits que irão fazer com que
    // O código se torne mais legível e evita repetição de código
    use ValidaCepTrait;
    use FlashMessages;
    use ValidaDadosTrait;

    public function __construct(private RepositorioDeEnderecos $repositorio)
    {
    }

    public function processaRequisicao(): void
    {
        if($_SERVER["REQUEST_METHOD"] === 'POST'){
            // algumas validações e atribuições feitas nos dados trazidos na requisição
            $nome        = filter_input(INPUT_POST, 'nome');
            $cep         = filter_input(INPUT_POST, 'cep');
            $numero      = filter_input(INPUT_POST, 'numero');
            $complemento = filter_input(INPUT_POST, 'complemento');

            // Aqui é de fato onde será validado todas as informações acima como o Cep por exemplo.
            // e será retornado um Objeto do tipo Endereco::class
            $endereco = $this->validar($nome, $cep, $numero, $complemento);

            // depois que as validações nos dados foram realizadas
            // nós solicitamos nosso repositório para que faça a inserção e depois redireciona
            // para a página inicial
            if($this->repositorio->criarEndereco($endereco) === true){
                $this->defineMensagem('success', 'Endereço cadastrado com sucesso!');
                header('Location: /', 200);
            }else{
                $this->defineMensagem('danger', 'Algo errado com a inserção dos dados.');
                header('Location: /', 302);
            };
        }   
    }
}