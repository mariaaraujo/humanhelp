$(function() {
    $("#pesquisa").keyup(function(){
        var pesquisa = $(this).val();

        if(pesquisa != ''){
            var dados = {
                instituicao : pesquisa
            }
            $.post('busca.php', dados, function(retorna){
                $(".resultado").html(retorna);
            });
        }else{
            $(".resultado").html('');
        }
    });
});
