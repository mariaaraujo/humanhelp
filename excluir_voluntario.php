<?php
session_start();
require_once('banco.inc');

$voluntario = $_GET['idvoluntario'];
$endereco = $_SESSION['endereco_voluntario'];

$deleteVaga = $con->query("DELETE FROM tb_vaga WHERE cd_voluntario='$voluntario'");

$deleteVolunt = $con->query("DELETE FROM tb_voluntario WHERE cd_voluntario='$voluntario'");
    
$deleteEnd = $con->query("DELETE FROM tb_endereco WHERE cd_endereco='$endereco'");

session_destroy();

header('location:voluntario.php');
$_SESSION['excluir_conta'] = true;

$con->close();

?>