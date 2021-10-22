//SELECIONAMOS O CNPJ
const cnpj = document.querySelector("#cnpj");
//NESTA FUNÇÃO PERCORREMOS TODAS AS POSIÇÕES DOS CAMPO DO JSON E 
//TEMTAMOS ENCONTRAR O CAMPO COM MESMO ID NO FORME CASO ENCONTRE
//ERÁ PREENCHER COM O VALOR ORIUNDO DA API
const showData = (result) => {
    for (const campo in result) {
        if (document.querySelector("#" + campo)) {
            //VERIFICAMOS SE O CAMPO SE TRATA DE UMA DATA
            if (campo == "data_inicio_atividade") {
                //CONVERTEMOS A DATA PARA O FORMATO BRASILEIRO
                document.querySelector("#" + campo).value = result[campo].split('-').reverse().join('/');
            } else {
                document.querySelector("#" + campo).value = result[campo];
            }
        }
    }
}
//SELECIONAMOS O CPNJ PARA EFETUAR A BUSCA PELO DADOS CADASTRAIS DA EMPRESA
cnpj.addEventListener("blur", (e) => {
    let search = cnpj.value.replace("-", "").replace(".", "").replace("/", "");
    const options = {
        method: "GET",
        mode: "cors",
        cache: "default"
    }
    //PESQUISAMOS OS DADOS DA EMPRESA BRASIL API
    fetch(`https://brasilapi.com.br/api/cnpj/v1/${search}`, options)
        .then(response => {
            response.json()
                .then(data => showData(data))
        })
        .catch(e => console.log('Deu erro: ' + e.message()))
});

$(document).ready(function () {

    $(function () {
        $.validator.setDefaults({
            submitHandler: function () {
                alert("Form successful submitted!");
            }
        });
        $('#quickForm').validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
                    minlength: 5
                },
                terms: {
                    required: true
                },
            },
            messages: {
                email: {
                    required: "Please enter a email address",
                    email: "Please enter a vaild email address"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                terms: "Please accept our terms"
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
});