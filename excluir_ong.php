<?php
session_start();
require_once('banco.inc');

$ong = $_GET['idong'];
$endereco = $_SESSION['endereco_instituicao'];

$deleteCont = $con->query("DELETE FROM tb_contato_instituicao WHERE cd_contato_instituicao='$ong'");

$deleteInst = $con->query("DELETE FROM tb_instituicao WHERE cd_instituicao='$ong'");
    
$deleteEnd = $con->query("DELETE FROM tb_endereco WHERE cd_endereco='$endereco'");

$deleteTrab = $con->query("DELETE FROM tb_trabalho WHERE cd_instituicao='$ong'");

session_destroy();

header('location:ong.php');
$_SESSION['excluir_conta'] = true;

$con->close();

?>