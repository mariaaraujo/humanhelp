<?php

session_start();
include('banco.inc');

if (empty($_POST['emailv']) || empty($_POST['senhav'])) {
    header('Location: loginvoluntario.php');
    exit();
}

$email_voluntario = mysqli_real_escape_string($con, $_POST['emailv']);
$senha_voluntario = mysqli_real_escape_string($con, $_POST['senhav']);

$select_voluntario    = $con->query("SELECT nm_email, nm_senha FROM tb_voluntario where nm_email='$email_voluntario' and nm_senha='$senha_voluntario'");
$select_voluntario = $select_voluntario->num_rows;
if ($select_voluntario != 0) 
{
        $info_voluntario = $con->query("SELECT cd_voluntario,nm_voluntario,cd_endereco FROM tb_voluntario where nm_email='$email_voluntario' and nm_senha='$senha_voluntario'");
        $info_voluntario = $info_voluntario->fetch_all();

        $_SESSION['codigo_voluntario'] = $info_voluntario[0][0];

        Header("Location: homevoluntario.php");
        
    } else {
    $_SESSION['login_erro'] = true;
    Header("Location: loginvoluntario.php");
}

$con->close();
?>