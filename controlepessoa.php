<?php
include_once "config.php";

//VERIFICAMOS SE EXISTE A REQUISIÇÃO NA PÁGINA.
if (isset($_POST) and !empty($_POST)) :
    $Pessoa = new Pessoa();
    $Pessoa->setNome_fansia(filter_input(INPUT_POST, 'nome_fantasia', FILTER_SANITIZE_STRING));
    $Pessoa->setSobrenome_razao(filter_input(INPUT_POST, 'razao_social', FILTER_SANITIZE_STRING));
    $Pessoa->setCpf_cnpj(filter_input(INPUT_POST, 'cnpj', FILTER_SANITIZE_STRING));
    $Pessoa->setRg_ie(filter_input(INPUT_POST, 'rg_ie', FILTER_SANITIZE_STRING));
    $Pessoa->setNascimento_fundacao(dateConvert(filter_input(INPUT_POST, 'data_inicio_atividade', FILTER_SANITIZE_STRING)));
    $dados = $Pessoa->insert();
    if ($dados == true) :
        echo "true";
    else :
        echo "false";
    endif;
endif;
