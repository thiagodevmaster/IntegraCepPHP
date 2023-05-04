<?php

namespace App\utilitarios;

/**
 * Trait responsável por adicionar no array session do navegador 
 * uma chave chamada ['tipo_mensagem'] que poderá ser:
 *       "danger" indicando erro 
 *        ou 
 *      "success" indicando sucesso
 * 
 * e a chave ['mensagem'] que receberá a mensagem que você queira passar ao usuário
 * 
 */

trait FlashMessages
{
    public function defineMensagem(string $tipo, string $mensagem): void
    {
        $_SESSION['tipo_mensagem'] = $tipo;
        $_SESSION['mensagem'] = $mensagem;
    }
    
}