<?php
include_once "config.php";

if (filter_has_var(INPUT_GET, 'id')) :
    $acao = 'e';
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
    $Pessoa = new Pessoa();
    $pessoa = $Pessoa->busca('idpessoa', $id);
    //CASO A PESSOA NÃO EXISTA NO BANCO DE DADOS, O RETORNO SERÁ FALSO
    if (!$pessoa) :
        //CASO NÃO EXISTA O REGITRO NO BANCO REDIRECIONAMOS PARA PAGINA DE CADASTRO
        echo "<script>window.location.replace('pessoa')</script>";
    endif;
else :
    $acao = 'c';
    $id = '0';
endif;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Controle pessoa</title>
    <?php include_once "csscadastro.php"; ?>
</head>

<body>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Controle de pessoa</h1><br>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="https://localhost">Início</a></li>
                        <li class="breadcrumb-item"><a href="https://localhost/listapessoa">Listagem</a></li>
                        <li class="breadcrumb-item active">Listagem</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <!-- left column -->
                            <div class="col-md-12">
                                <!-- jquery validation -->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Controle cadastro pessoa</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form name="form" method="post" id="form">
                                        <input type="hidden" name="edtid" name="edtid" value="<?php echo $id; ?>">
                                        <input type="hidden" name="edtacao" name="edtacao" value="<?php echo $acao; ?>">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <?php include_once "alerta.php"; ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="cnpj">CPF | CNPJ *</label>
                                                <input value="<?php if (isset($pessoa->cpf_cnpj) and !empty($pessoa->cpf_cnpj)) {
                                                                    echo $pessoa->cpf_cnpj;
                                                                } ?>" required type="text" name="cnpj" class="form-control" id="cnpj" placeholder="Qual seu CPf ou CNPJ?">
                                            </div>
                                            <div class="form-group">
                                                <label for="rg_ie">RG | IE *</label>
                                                <input value="<?php if (isset($pessoa->rg_ie) and !empty($pessoa->rg_ie)) {
                                                                    echo $pessoa->rg_ie;
                                                                } ?>" required type="text" name="rg_ie" class="form-control" id="rg_ie" placeholder="Qual seu RG ou IE?">
                                            </div>
                                            <div class="form-group">
                                                <label for="nome_fantasia">Nome | Nome fantasia *</label>
                                                <input value="<?php if (isset($pessoa->nome_fatasia) and !empty($pessoa->nome_fatasia)) {
                                                                    echo $pessoa->nome_fatasia;
                                                                } ?>" value="<?php if (isset($pessoa->rg_ie) and !empty($pessoa->rg_ie)) {
                                                                                    echo $pessoa->cpf_cnpj;
                                                                                } ?>" required type="text" name="nome_fantasia" class="form-control" id="nome_fantasia" placeholder="Qual seu nome?">
                                            </div>
                                            <div class="form-group">
                                                <label for="razao_social">Sobre nome | Razão social *</label>
                                                <input value="<?php if (isset($pessoa->sobrenome_razao) and !empty($pessoa->sobrenome_razao)) {
                                                                    echo $pessoa->sobrenome_razao;
                                                                } ?>" required type="text" name="razao_social" class="form-control" id="razao_social" placeholder="Qual seu sobre nome ou razão social?">
                                            </div>
                                            <div class="form-group">
                                                <label for="data_inicio_atividade">Nascimento | Fundação *</label>
                                                <input value="<?php if (isset($pessoa->nascimento_fundacao) and !empty($pessoa->nascimento_fundacao)) {
                                                                    echo dateConvertBr($pessoa->nascimento_fundacao);
                                                                } ?>" required type="text" name="data_inicio_atividade" class="form-control" id="data_inicio_atividade" placeholder="Qual sua data?">
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                            <button id="btnsalvar" name="btnsalvar" type="button" class="btn btn-primary">Salvar <i class="fas fa-save"></i> </button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card -->
                            </div>
                            <!--/.col (left) -->
                            <!-- right column -->
                            <div class="col-md-6">

                            </div>
                            <!--/.col (right) -->
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </section>
            </div>
        </div>
    </div>
    <?php include_once "scriptcadastro.php"; ?>
    <script src="js/alerta.js"></script>
    <script src="js/pessoa.js"></script>
</body>

</html>