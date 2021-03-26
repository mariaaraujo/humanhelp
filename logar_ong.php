<?php

session_start();
include ('banco.inc');

if(empty($_POST['emailo']) || empty($_POST['senhao']))
{
    header('Location: ong.php');
    exit();
}

$email_instituicao = mysqli_real_escape_string($con, $_POST['emailo']);
$senha_instituicao = mysqli_real_escape_string($con, $_POST['senhao']);

$select_instituicao = $con->query("SELECT nm_email, nm_senha FROM tb_instituicao where nm_email='$email_instituicao' and nm_senha='$senha_instituicao'");
$select_instituicao = $select_instituicao->num_rows;
if($select_instituicao !=0)
{
    $info_instituicao = $con->query("SELECT cd_instituicao,nm_instituicao,cd_endereco,ds_instituicao, ds_arrecadacao FROM tb_instituicao where nm_email='$email_instituicao' and nm_senha='$senha_instituicao'");
    $info_instituicao = $info_instituicao->fetch_all();
    
        $_SESSION['codigo_instituicao'] = $info_instituicao[0][0];
        
        Header("Location: homeong.php");
}
else
{
    $_SESSION['login_erro'] = true;
    Header("Location: loginong.php");
}

$con->close();
?>