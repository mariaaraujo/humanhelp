<?php
session_start();
include('banco.inc');

$dttrab = mysqli_real_escape_string($con, $_POST['dttrab']);
$hrinicio = mysqli_real_escape_string($con, $_POST['hrinicio']);
$hrfim = mysqli_real_escape_string($con, $_POST['hrfim']);
$dstrab = mysqli_real_escape_string($con, $_POST['dstrab']);
$dsvaga = mysqli_real_escape_string($con, $_POST['dsvaga']);
$qtvaga = mysqli_real_escape_string($con, $_POST['qtvaga']);

$ceptrab = mysqli_real_escape_string($con, $_POST['ceptrab']);
$logradourotrab = mysqli_real_escape_string($con, $_POST['logradourotrab']);
$numerotrab = mysqli_real_escape_string($con, $_POST['numerotrab']);
$complementotrab = mysqli_real_escape_string($con, $_POST['complementotrab']);
$bairrotrab = mysqli_real_escape_string($con, $_POST['bairrotrab']);
$estadotrab = mysqli_real_escape_string($con, $_POST['estadotrab']);
$cidadetrab = mysqli_real_escape_string($con, $_POST['cidadetrab']);

$cdtrabalho = $_SESSION['cdtrabalho'];

$end = $con->query("SELECT cd_endereco FROM tb_trabalho WHERE cd_trabalho = '$cdtrabalho'");
$end = $end->fetch_all();
$cdendereco = $end[0][0];

$alterar_endereco = "UPDATE tb_endereco SET cd_cep = '$ceptrab', nm_logradouro = '$logradourotrab', cd_numero = '$numerotrab', nm_complemento = '$complementotrab', nm_bairro = '$bairrotrab', nm_cidade = '$cidadetrab', nm_estado = '$estadotrab' WHERE cd_endereco = '$cdendereco'";

if(mysqli_query ($con, $alterar_endereco))
{
    $alterar_trabalho = "UPDATE tb_trabalho SET dt_trabalho = '$dttrab', hr_inicio = '$hrinicio', hr_fim = '$hrfim', ds_trabalho = '$dstrab', ds_vaga = '$dsvaga', qt_vaga = '$qtvaga' WHERE cd_trabalho = '$cdtrabalho'";
    
    if(mysqli_query ($con, $alterar_trabalho))
    {
        $_SESSION['trabalhoeditar_sucesso'] = true;
    }
    else
    {
        $_SESSION['trabalhoeditar_erro'] = true;
    }
}
else
{
    $_SESSION['trabalhoeditar_erro'] = true;
}

    header("location: trabalhosandamento.php");

$con->close();

?>