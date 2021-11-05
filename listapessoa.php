<?
include_once 'config.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista pessoas</title>
    <?php include_once 'csslistagem.php'; ?>

</head>

<body>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Listagem de pessoa</h1><br>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="https://localhost">Início</a></li>
                        <li class="breadcrumb-item active">Listagem</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <form id="proprio" name="proprio" method="post">
        <input type="hidden" name="edtacao" name="edtacao" value="d">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="btn-group">
                                    <a href="https://localhost" class="btn btn-warning">
                                        <i class="fas fa-chevron-left"> </i> Voltar
                                    </a>
                                    <a href="https://localhost/pessoa" class="btn btn-success">
                                        <i class="fas fa-plus"> </i> Cadastrar
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="tabela" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>NOME | NOME FANTASIA </th>
                                            <th>SOBRE NOME | RAZÃO SOCIAL</th>
                                            <th>CPF | CNPJ</th>
                                            <th>RG | IE</th>
                                            <th>NASCIMENTO | FUNDAÇÃO</th>
                                            <th>AÇÃO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!--Items array    Array-->
                                        <?php
                                        $Pessoa = new Pessoa();
                                        foreach ($Pessoa->buscatudo() as $key => $value) :
                                        ?>
                                            <tr id="<?php echo $value->idpessoa; ?>">
                                                <td><?php echo $value->nome_fatasia; ?></td>
                                                <td><?php echo $value->sobrenome_razao; ?></td>
                                                <td><?php echo $value->cpf_cnpj; ?></td>
                                                <td><?php echo $value->rg_ie; ?></td>
                                                <td><?php echo date('d/m/Y', strtotime($value->nascimento_fundacao)); ?></td>
                                                <td>
                                                    <a href="https://localhost/pessoa?id=<?php echo $value->idpessoa; ?>" class="btn btn-warning">
                                                        <i class="fas fa-edit"> </i> Editar
                                                    </a>
                                                    <button type="button" onclick="deleta(<?php echo $value->idpessoa; ?>);" name="btnexcluuir" id="btnexcluuir" class="btn btn-danger">
                                                        <i class="fas fa-trash"> </i> Excluir
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php
                                        endforeach;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </form>
    <?php include_once 'scriptlistagem.php'; ?>
</body>

</html>