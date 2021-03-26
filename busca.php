<?php
include('banco.inc');
$instituicoes = $_POST['instituicao'];

$instituicoes = "SELECT * FROM tb_instituicao as i join tb_endereco as e on i.cd_endereco = e.cd_endereco WHERE nm_instituicao LIKE '%$instituicoes%' OR nm_cidade LIKE '%$instituicoes%'";
$res_instituicoes = mysqli_query($con, $instituicoes);

if(mysqli_num_rows($res_instituicoes) <= 0){
    echo "<section id=\"boxes\">
        <div class=\"container\"><br>
        <div class=\"box\"></div>
        <div class=\"alert alert-danger\" role=\"alert\">
        <b>Nenhuma ONG/Instituição encontrada!</b>
        </div>
        </div></section>";
}else{
    while($linha = mysqli_fetch_assoc($res_instituicoes)){
        $cdinstituicao = $linha['cd_instituicao'];
        echo "<section id=\"boxes\"><br>
        <div class=\"container\">
        <div class=\"box\"></div>
        <div class=\"box\" id=\"ong\">
        <center><b><a href=\"perfilong.php?cdong=$cdinstituicao\">".$linha['nm_instituicao']."</p></b></center>
        <p><b>".$linha['nm_cidade'].", ".$linha['nm_estado']."</b></p>
        </div>
        </div></section>";
    }
}
?>