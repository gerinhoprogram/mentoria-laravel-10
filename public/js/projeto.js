function deleteRegistroPaginacao(rotaUrl, idRegistro){
    // alert(rotaUrl);
    // alert(idRegistro);
    if(confirm('Deseja excluir este registro?')){
        $.ajax({
            url:rotaUrl,
            method: 'DELETE',
            headers: {'x-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data:{
                id: idRegistro,
            },
            beforeSend: function(){
                $.blockUI({
                    message: 'Carregando',
                    timeout: 15000,
                })
            },
        }).done(function(data){

            $.unblockUI();
            if(data.success == true){
                window.location.reload();
            }else{
                alert('Não deletou');
            }

        }).fail(function(data){

            $.unblockUI();
            alert('Dados não encontrados');
            
        })
    }
}

$('#mascara_valor').mask('#.##0,00', {reverse: true});

$("#cep").blur(function () {
    $("#cep").blur(function () {
        var cep = $(this).val().replace(/\D/g, '');
        if (cep != "") {
            var validacep = /^[0-9]{8}$/;
            if (validacep.test(cep)) {
                $("#logradouro").val("Buscando...");
                $("#bairro").val("Buscando...");
                $("#endereco").val("Buscando...");
                $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {
                    if (!("erro" in dados)) {
                        $("#logradouro").val(dados.logradouro.toUpperCase());
                        $("#bairro").val(dados.bairro.toUpperCase());
                        $("#endereco").val(dados.localidade.toUpperCase());
                    }
                    else {
                        alert("CEP não encontrado de forma automatizado digite manualmente ou tente novamente.");
                    }
                });
            }
        }
    });
})
