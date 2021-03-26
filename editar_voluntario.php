<?php
session_start();
require_once('banco.inc');

    $cepv = mysqli_real_escape_string($con, $_POST['cepv']);
    $logradourov = mysqli_real_escape_string($con, $_POST['logradourov']);
    $numerov = mysqli_real_escape_string($con, $_POST['numerov']);
    $complementov = mysqli_real_escape_string($con, $_POST['complementov']);
    $bairrov = mysqli_real_escape_string($con, $_POST['bairrov']);
    $estadov = mysqli_real_escape_string($con, $_POST['estadov']);
    $cidadev = mysqli_real_escape_string($con, $_POST['cidadev']);
    
    $emailv = mysqli_real_escape_string($con, $_POST['emailv']);
    $senhav = mysqli_real_escape_string($con, $_POST['senhav']);
    
$cd_voluntario = $_SESSION['codigo_voluntario'];

$end = $con->query("SELECT cd_endereco FROM tb_voluntario WHERE cd_voluntario = '$cd_voluntario'");
$end = $end->fetch_all();

$cd_endereco = $end[0][0];
    
$alterar_endereco = "UPDATE tb_endereco SET cd_cep = '$cepv', nm_logradouro = '$logradourov', cd_numero = '$numerov', nm_complemento = '$complementov', nm_bairro = '$bairrov', nm_cidade = '$cidadev', nm_estado = '$estadov' WHERE cd_endereco = '$cd_endereco'";
    
if(mysqli_query ($con, $alterar_endereco))
{
    $alterar_voluntario = "UPDATE tb_voluntario SET nm_email = '$emailv', nm_senha = '$senhav' WHERE cd_voluntario = '$cd_voluntario'";
    
    if(mysqli_query ($con, $alterar_voluntario))
    {
        $_SESSION['editar_sucesso'] = true;
    }
    else
    {
        $_SESSION['editar_erro'] = true;
    }
}
else
{
    $_SESSION['editar_erro'] = true;
}

    header("location: homevoluntario.php");

$con->close();
?>