<?php
session_start();
include('banco.inc');

    $nomev = mysqli_real_escape_string($con, $_POST['nomev']);
    $cpfv = mysqli_real_escape_string($con, $_POST['cpfv']);
    $dtnascv = mysqli_real_escape_string($con, $_POST['dtnascv']);
    
    $cepv = mysqli_real_escape_string($con, $_POST['cepv']);
    $logradourov = mysqli_real_escape_string($con, $_POST['logradourov']);
    $numerov = mysqli_real_escape_string($con, $_POST['numerov']);
    $complementov = mysqli_real_escape_string($con, $_POST['complementov']);
    $bairrov = mysqli_real_escape_string($con, $_POST['bairrov']);
    $estadov = mysqli_real_escape_string($con, $_POST['estadov']);
    $cidadev = mysqli_real_escape_string($con, $_POST['cidadev']);
    
    $emailv = mysqli_real_escape_string($con, $_POST['emailv']);
    $senhav = mysqli_real_escape_string($con, $_POST['senhav']);

    $verifcadastro = $con->query("SELECT * FROM tb_voluntario WHERE nm_email = '$emailv' OR cd_cpf = '$cpfv'");
    $verifcadastro = $verifcadastro->num_rows;

    if($verifcadastro == 0)
    {
        $incrementV = $con->query("SELECT MAX(cd_voluntario + 1) FROM tb_voluntario");
        $incrementV = $incrementV->fetch_array();
        $incrementV = $incrementV[0];
        
        $incrementE = $con->query("SELECT MAX(cd_endereco + 1) FROM tb_endereco");
        $incrementE = $incrementE->fetch_array();
        $incrementE = $incrementE[0];

        if($incrementE == null){
            $incrementE = 1;
        }
        if ($incrementV == null) {
            $incrementV = 1;
        }

        $cadastrar_endereco = "INSERT INTO tb_endereco(cd_endereco, cd_cep, nm_logradouro, cd_numero, nm_complemento, nm_bairro, nm_cidade, nm_estado) VALUES ('$incrementE', '$cepv', '$logradourov', '$numerov', '$complementov', '$bairrov', '$cidadev', '$estadov')";
        $sql_endereco = mysqli_query($con, $cadastrar_endereco) or die("<meta charset=\"utf-8\"><script language=\"javascript\" type=\"text/javascript\"> alert(\"Não foi possível cadastrar o ENDEREÇO!\");
        window.location.href=\"voluntario.php\";</script>");
        $cd_endereco = mysqli_insert_id($con);

        $cadastrar_voluntario = "INSERT INTO tb_voluntario(cd_voluntario, nm_voluntario, cd_cpf, dt_nascimento, nm_email, nm_senha, cd_endereco) VALUES ('$incrementV', '$nomev', '$cpfv', '$dtnascv','$emailv', '$senhav', '$incrementE')";
        $sql_voluntario = mysqli_query($con, $cadastrar_voluntario) or die("<meta charset=\"utf-8\"><script language=\"javascript\" type=\"text/javascript\"> alert(\"Não foi possível cadastrar o VOLUNTÁRIO!\");
        window.location.href=\"voluntario.php\";</script>");
        $cd_voluntario = mysqli_insert_id($con);

        $_SESSION['codigo_voluntario'] = $incrementV;

        header("location: homevoluntario.php");       
    }

    else
    {
        $_SESSION['cadastro_erro'] = true;
        header("Location: voluntario.php");
    }
$con->close();
?>