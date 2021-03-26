<?php

session_start();
include('banco.inc');

$nomeo       = mysqli_real_escape_string($con, $_POST["nomeo"]);
$criacao     = mysqli_real_escape_string($con, $_POST["dtcriao"]);
$cnpj        = mysqli_real_escape_string($con, $_POST["cnpjo"]);
$descricao   = mysqli_real_escape_string($con, $_POST["descricao"]);
$causa       = mysqli_real_escape_string($con, $_POST["causasocial"]);
$arrecadacao = mysqli_real_escape_string($con, $_POST["arrecadacao"]);

$cepo         = mysqli_real_escape_string($con, $_POST["cepo"]);
$logradouroo  = mysqli_real_escape_string($con, $_POST["logradouroo"]);
$numeroo      = mysqli_real_escape_string($con, $_POST["numeroo"]);
$complementoo = mysqli_real_escape_string($con, $_POST["complementoo"]);
$estadoo      = mysqli_real_escape_string($con, $_POST["estadoo"]);
$cidadeo      = mysqli_real_escape_string($con, $_POST["cidadeo"]);
$bairro       = mysqli_real_escape_string($con, $_POST["bairroo"]);

$telefoneo = mysqli_real_escape_string($con, $_POST["telefoneo"]);
$facebooko = mysqli_real_escape_string($con, $_POST["facebooko"]);

$emailo = mysqli_real_escape_string($con, $_POST["emailo"]);
$senhao = mysqli_real_escape_string($con, $_POST["senhao"]);

$verifcadastro = $con->query("SELECT * FROM tb_instituicao WHERE nm_email = '$emailo' OR cd_cnpj = '$cnpj'");
$verifcadastro = $verifcadastro->num_rows;

if ($verifcadastro == 0) {
    $incrementI = $con->query("SELECT MAX(cd_instituicao + 1) FROM tb_instituicao");
    $incrementI = $incrementI->fetch_array();
    $incrementI = $incrementI[0];
    
    $incrementE = $con->query("SELECT MAX(cd_endereco + 1) FROM tb_endereco");
    $incrementE = $incrementE->fetch_array();
    $incrementE = $incrementE[0];

    $incrementC = $con->query("SELECT MAX(cd_contato_instituicao + 1) FROM tb_contato_instituicao");
    $incrementC = $incrementC->fetch_array();
    $incrementC = $incrementC[0];

    if ($incrementE == null) {
        $incrementE = 1;
    }
    if ($incrementI == null) {
        $incrementI = 1;
    }
    if ($incrementC == null) {
        $incrementC = 1;
    }
    
    
    $cadastrar_endereco = "INSERT INTO tb_endereco(cd_endereco, cd_cep, nm_logradouro, cd_numero, nm_complemento, nm_bairro, nm_cidade, nm_estado) VALUES ('$incrementE', '$cepo', '$logradouroo', '$numeroo', '$complementoo', '$bairroo', '$cidadeo', '$estadoo')";
    $sql_endereco = mysqli_query($con, $cadastrar_endereco) or die("<meta charset=\"utf-8\"><script language=\"javascript\" type=\"text/javascript\"> alert(\"Não foi possível cadastrar o ENDEREÇO!\");
    window.location.href=\"ong.php\";</script>");
    $cd_endereco = mysqli_insert_id($con);
    
    $cadastrar_instituicao = "INSERT INTO tb_instituicao(cd_instituicao, nm_instituicao, cd_cnpj, dt_criacao, ds_instituicao, nm_email, nm_senha, ds_arrecadacao, cd_endereco, cd_tipo_instituicao) VALUES ('$incrementI', '$nomeo', '$cnpj', '$criacao', '$descricao', '$emailo', '$senhao', '$arrecadacao','$incrementE','$causa')";
    $sql_instituicao = mysqli_query($con, $cadastrar_instituicao) or die("<meta charset=\"utf-8\"><script language=\"javascript\" type=\"text/javascript\"> alert(\"Não foi possível cadastrar a ONG/Instituição!\");
    window.location.href=\"ong.php\";</script>");
    $cd_instituicao = mysqli_insert_id($con);

    $cadastrar_contato_instituicao = "INSERT INTO tb_contato_instituicao(cd_contato_instituicao, cd_telefone, nm_facebook, cd_instituicao) VALUES ('$incrementC', '$telefoneo', '$facebooko','$incrementI')";
    $sql_contato_instituicao = mysqli_query($con, $cadastrar_contato_instituicao) or die("<meta charset=\"utf-8\"><script language=\"javascript\" type=\"text/javascript\"> alert(\"Não foi possível cadastrar o contato da ONG/Instituição!\");
    window.location.href=\"ong.php\";</script>");
    $cd_contato_instituicao = mysqli_insert_id($con);
    
    $_SESSION['codigo_instituicao'] = $incrementI;

    header("Location: homeong.php");
}

else {
   $_SESSION['cadastro_erro'] = true;
   header("location: ong.php");
}
$con->close();

?>