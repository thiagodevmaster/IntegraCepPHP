<?php

namespace App\infra\database;

/**
 * Aqui está a classe que fará a conexão com o banco de dados.
 * 
 * Banco de Dados Utilizado: MYSQL
 * Crie um arquivo na raiz do projeto chamado config.php
 * E crie as constantes com os dados de acesso ao banco de dados
 * 
 * OBS: no arquivo config-example.php está exemplificado como devem ser cada constante
 * 
 */

require_once __DIR__ . '/../../../config.php';
use PDO;

class CriarConexao
{
    public static function Conectar()
    {
        $mySqlDatabase = MYSQLDATABASE;
        $host = MYSQLHOST;
        $password = MYSQLPASSWORD;
        $port = MYSQLPORT;
        $user = MYSQLUSER;

        return new PDO("mysql:host=$host;port=$port;dbname=$mySqlDatabase", $user, $password);
    }
}