<?php
session_start();
include('banco.inc');

$data_atual = date("Y-m-d");

$dttrab = mysqli_real_escape_string($con, $_POST['dttrab']);
$hrinicio = mysqli_real_escape_string($con, $_POST['hrinicio']);
$hrfim = mysqli_real_escape_string($con, $_POST['hrfim']);
$trabalho = mysqli_real_escape_string($con, $_POST['dstrab']);
$vaga = mysqli_real_escape_string($con, $_POST['dsvaga']);
$qtvaga = mysqli_real_escape_string($con, $_POST['qtvaga']);

$ceptrab = mysqli_real_escape_string($con, $_POST['ceptrab']);
$logradourotrab = mysqli_real_escape_string($con, $_POST['logradourotrab']);
$numerotrab = mysqli_real_escape_string($con, $_POST['numerotrab']);
$complementotrab = mysqli_real_escape_string($con, $_POST['complementotrab']);
$bairrotrab = mysqli_real_escape_string($con, $_POST['bairrotrab']);
$estadotrab = mysqli_real_escape_string($con, $_POST['estadotrab']);
$cidadetrab = mysqli_real_escape_string($con, $_POST['cidadetrab']);

if($dttrab < $data_atual)
{
    $_SESSION['data_erro'] = true;
    Header("Location:criacaovaga.php");
}

else if($hrinicio > $hrfim){
    $_SESSION['hora_inicio'] = true;
    Header("Location:criacaovaga.php");
}

else if($hrfim < $hrinicio){
    $_SESSION['hora_fim'] = true;
    Header("Location:criacaovaga.php");
}

else if($hrinicio == $hrfim){
    $_SESSION['hora_igual'] = true;
    Header("Location:criacaovaga.php");
}

else{
$codigo_instituicao = $_SESSION['codigo_instituicao'];

$incrementT = $con->query("SELECT MAX(cd_trabalho + 1) FROM tb_trabalho");
$incrementT = $incrementT->fetch_array();
$incrementT = $incrementT[0];

$incrementE = $con->query("SELECT MAX(cd_endereco + 1) FROM tb_endereco");
$incrementE = $incrementE->fetch_array();
$incrementE = $incrementE[0];

if($incrementT == null){
    $incrementT = 1;
}

if($incrementE == null){
    $incrementE = 1;
}

    $cadastrar_endereco = "INSERT INTO tb_endereco(cd_endereco, cd_cep, nm_logradouro, cd_numero, nm_complemento, nm_bairro, nm_cidade, nm_estado) VALUES ('$incrementE', '$ceptrab', '$logradourotrab', '$numerotrab', '$complementotrab', '$bairrotrab', '$cidadetrab', '$estadotrab')";
    $sql_endereco = mysqli_query($con, $cadastrar_endereco) or die("<meta charset=\"utf-8\"><script language=\"javascript\" type=\"text/javascript\"> alert(\"Não foi possível cadastrar o ENDEREÇO!\");
    window.location.href=\"criacaovaga.php\";</script>");
    $cd_endereco = mysqli_insert_id($con);

    $cadastrar_trabalho = "INSERT INTO tb_trabalho(cd_trabalho, dt_trabalho, hr_inicio, hr_fim, ds_trabalho, ds_vaga, qt_vaga, cd_instituicao, cd_endereco) VALUES ('$incrementT', '$dttrab', '$hrinicio', '$hrfim', '$trabalho', '$vaga', '$qtvaga', '$codigo_instituicao', '$incrementE')";
    $sql_trabalho = mysqli_query($con, $cadastrar_trabalho) or die("<meta charset=\"utf-8\"><script language=\"javascript\" type=\"text/javascript\"> alert(\"Não foi possível cadastrar a VAGA!\");
    window.location.href=\"criacaovaga.php\";</script>");
    $cd_trabalho = mysqli_insert_id($con);

    $_SESSION['codigo_trabalho'] = $cd_trabalho;

    $_SESSION['vaga_cadastrada'] = true;
    Header('Location: homeong.php');

}
    $con->close();
?>