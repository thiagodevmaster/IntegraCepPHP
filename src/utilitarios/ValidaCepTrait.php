<?php

namespace App\utilitarios;

/**
 * 
 * Trait onde é feita uma busca na API VIACEP
 * com o objetivo de válidar o cep informado pelo usuário
 * 
 */

use Exception;

trait ValidaCepTrait
{
    public function validaCep(string $cep): array
    {
        $url = "https://viacep.com.br/ws/$cep/json/";
        try{
            $response = (array) json_decode(file_get_contents($url));
        }catch(Exception $e){
            return [];
        }

        if(in_array("erro", $response)){
            return [];
        }

        return $response;
    }
}