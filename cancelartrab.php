<?php
session_start();
require_once('banco.inc');
require_once('checa_ong.php');

$cdtrabalho = $_GET['cd_trabalho'];

$sql = $con->query("DELETE FROM tb_vaga WHERE cd_trabalho='$cdtrabalho'");
$sql2 = $con->query("DELETE FROM tb_trabalho WHERE cd_trabalho='$cdtrabalho'");

header('location:homeong.php');
$_SESSION['cancelar_trab'] = true;

$con->close();

?>