<?php
include_once "config.php";

//VERIFICAMOS SE EXISTE A REQUISIÇÃO NA PÁGINA.
if (isset($_POST) and !empty($_POST)) :
    $Pessoa = new Pessoa();
    $Pessoa->setNome_fansia('RAFAEL');
    $Pessoa->setSobrenome_razao('OLIVEIRA');
    $Pessoa->setCpf_cnpj('000.000.000-00');
    $Pessoa->setRg_ie('123123');
    $Pessoa->setNascimento_fundacao('1995-01-15');
    $dados = $Pessoa->insert();
    var_dump($dados);
endif;
