<?php

session_start();
include('banco.inc');

$codigo_trabalho = $_GET['cdtrabalho'];
$codigo_voluntario = $_SESSION['codigo_voluntario'];

$incrementV = $con->query("SELECT MAX(cd_vaga + 1) FROM tb_vaga");
$incrementV = $incrementV->fetch_array();
$incrementV = $incrementV[0];

if ($incrementV == null) {
    $incrementV = 1;
}

$candidatar_vaga = "INSERT INTO tb_vaga(cd_vaga, cd_trabalho, cd_voluntario) VALUES ('$incrementV','$codigo_trabalho','$codigo_voluntario')";
$sql_vaga = mysqli_query($con, $candidatar_vaga). $_SESSION['candidatura_sucesso'] = true .header("location: homevoluntario.php") or die(header("Location: homevoluntario.php") . $_SESSION['candidatura_erro'] = true);
$cd_vaga = mysqli_insert_id($con);

$qt_vaga = "UPDATE tb_trabalho SET qt_vaga = qt_vaga - 1 WHERE cd_trabalho = '$codigo_trabalho'";

if ($con->query($qt_vaga) === TRUE) {
    $_SESSION['candidatura_sucesso'] = true;
} else {
    $_SESSION['candidatura_erro'] = true;
}

$con->close();
