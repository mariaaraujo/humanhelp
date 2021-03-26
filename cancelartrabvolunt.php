<?php
session_start();
require_once('banco.inc');
require_once('checa_voluntario.php');

$voluntario = $_SESSION['codigo_voluntario'];
$cdtrabalho = $_GET['cd_trabalho'];

$sql = $con->query("DELETE FROM tb_vaga WHERE cd_voluntario='$voluntario' AND cd_trabalho='$cdtrabalho'");
$sql3 = $con->query("UPDATE tb_trabalho SET qt_vaga = qt_vaga + 1 WHERE cd_trabalho='$cdtrabalho'");

header('location:trabalhosandamentovoluntario.php');
$_SESSION['cancelar_trabvolunt'] = true;

$con->close();

?>