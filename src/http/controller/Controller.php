<?php
/***
 * 
 * A classe controller funciona como um contrato em que todos os outros 
 * Controllers têm que assinar.
 * Isso me garante que todos ele terão o método que irá processar 
 * A requisição que está sendo feita.
 * 
 */
namespace App\http\controller;

interface Controller
{
    public function processaRequisicao(): void;
}