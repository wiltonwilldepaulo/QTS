<?php
include_once "config.php";
//VERIFICAMOS SE EXISTE A REQUISIÇÃO NA PÁGINA.
if (isset($_POST) and !empty($_POST)) :
    $Pessoa = new Pessoa();
    $acao = filter_input(INPUT_POST, 'edtacao', FILTER_SANITIZE_STRING);
    switch ($acao) {
        case 'c':
            $Pessoa->setNome_fansia(filter_input(INPUT_POST, 'nome_fantasia', FILTER_SANITIZE_STRING));
            $Pessoa->setSobrenome_razao(filter_input(INPUT_POST, 'razao_social', FILTER_SANITIZE_STRING));
            $Pessoa->setCpf_cnpj(filter_input(INPUT_POST, 'cnpj', FILTER_SANITIZE_STRING));
            $Pessoa->setRg_ie(filter_input(INPUT_POST, 'rg_ie', FILTER_SANITIZE_STRING));
            $Pessoa->setNascimento_fundacao(dateConvert(filter_input(INPUT_POST, 'data_inicio_atividade', FILTER_SANITIZE_STRING)));
            try {
                //CASO A AÇÃO CAPTURADA SEJA "c" IREMOS INSERIR.
                $dados = $Pessoa->insert();
                echo $dados;
            } catch (PDOException $th) {
                echo "false";
            }
            break;

        case 'e':
            $id = filter_input(INPUT_POST, 'edtid', FILTER_SANITIZE_STRING);
            $Pessoa->setNome_fansia(filter_input(INPUT_POST, 'nome_fantasia', FILTER_SANITIZE_STRING));
            $Pessoa->setSobrenome_razao(filter_input(INPUT_POST, 'razao_social', FILTER_SANITIZE_STRING));
            $Pessoa->setCpf_cnpj(filter_input(INPUT_POST, 'cnpj', FILTER_SANITIZE_STRING));
            $Pessoa->setRg_ie(filter_input(INPUT_POST, 'rg_ie', FILTER_SANITIZE_STRING));
            $Pessoa->setNascimento_fundacao(dateConvert(filter_input(INPUT_POST, 'data_inicio_atividade', FILTER_SANITIZE_STRING)));
            try {
                //CASO A AÇÃO CAPTURADA SEJA "d" IREMOS EDITAR.
                $dados = $Pessoa->update("idpessoa", $id);
                echo $dados;
            } catch (PDOException $e) {
                var_dump($e->getMessage());
            }
            break;
        case 'd':
            $id = filter_input(INPUT_POST, 'edtid', FILTER_SANITIZE_STRING);
            $Pessoa->deleta($id);
            echo $id;
            break;
    }


endif;
