<?php

namespace App\utilitarios;

/***
 * Trait responsável por renderizar uma view
 * 
 * primeiro é feita a extração dos dados e atribuição em um array associativo em que a própia função
 * extract() se encarrega disto.
 * 
 * depois é iniciado uma buffer de saída
 * dentro deste buffer eu faço o require da pasta raiz onde ficam as views e é feita a concatenação
 * com o nome do template que queremos visualizar e logo em seguida é concatenado com a extensão ".php"
 * 
 * ao final realizo a saída e é feita a limpeza do cache retornando o template desejado.
 * 
 */

trait RenderizadorDeViewsTrait
{
    public function render(string $nomeDoTemplate, array $dados=[])
    {
        extract($dados);
        ob_start();
        require __DIR__ . "/../../view/" . $nomeDoTemplate . ".php";
        $html = ob_get_clean();

        return $html;
    }
}