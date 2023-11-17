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