<?php

namespace App\utilitarios;

use App\model\Endereco;

/**
 * 
 * Para evitar repetição de código fiz uso de mais esta Trait para me auxiliar
 * na validação dos dados recebidos na requisição
 * 
 * E ao final é retornado um objeto do tipo Endereço. 
 * 
 */

trait ValidaDadosTrait 
{
    public function validar(string $nome, string $cep, string $numero, string $complemento): Endereco
    {
            if($this->validaCep($cep) === []){
                $this->defineMensagem('danger', "Cep '$cep' inserido é inválido.");
                header('Location: /', 302);
                exit();
            }

            if($nome === false        || $nome === null   || 
               $cep === false         || $cep === null    ||
               $numero === false      || $numero === null ||
               $complemento === false || $complemento === null     
            ){
                $this->defineMensagem('danger', 'Por favor verifique os dados e tente novamente');
                header('Location: /', 302);
                exit();
            }

            
            foreach($this->repositorio->todosOsEnderecos() as $end){
                // verifica se nome já existe entre os outros nomes já cadastrados
                if($nome === $end['nome']){
                    // verifica se cep é igual ao cep já cadastrado
                    if($cep === $end['cep']){
                        // se for igual irá verificar se o número é igual ao número cadastrado no mesmo cep
                        if($numero === $end['numero']){
                            // se for igual a última verificação será feita através do complemento
                            if($complemento === $end['complemento']){
                                $this->defineMensagem('danger', 'Endereço já cadastrado em nosso sistema !');
                                header('Location: /', 302);
                                exit();
                            }
                        }
                    }
                }
            }

            $endereco = new Endereco($nome, $cep, $numero, $complemento);

            return $endereco;
    }
}