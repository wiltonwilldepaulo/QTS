<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de pessoa</title>
</head>

<body>
    <?php
    include_once "config.php";
    $Pessoa = new Pessoa();
    $Pessoa->setNome_fansia('RAFAEL');
    $Pessoa->setSobrenome_razao('OLIVEIRA');
    $Pessoa->setCpf_cnpj('000.000.000-00');
    $Pessoa->setRg_ie('123123');
    $Pessoa->setNascimento_fundacao('1995-01-15');
    $dados = $Pessoa->insert();
    var_dump($dados);

    ?>

</body>

</html>