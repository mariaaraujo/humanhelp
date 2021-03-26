<?php

session_start();
require_once('banco.inc');

$nomeo       = mysqli_real_escape_string($con, $_POST["nomeo"]);
$descricao   = mysqli_real_escape_string($con, $_POST["descricao"]);
$arrecadacao = mysqli_real_escape_string($con, $_POST["arrecadacao"]);

$cepo         = mysqli_real_escape_string($con, $_POST["cepo"]);
$logradouroo  = mysqli_real_escape_string($con, $_POST["logradouroo"]);
$numeroo      = mysqli_real_escape_string($con, $_POST["numeroo"]);
$complementoo = mysqli_real_escape_string($con, $_POST["complementoo"]);
$estadoo      = mysqli_real_escape_string($con, $_POST["estadoo"]);
$cidadeo      = mysqli_real_escape_string($con, $_POST["cidadeo"]);
$bairro       = mysqli_real_escape_string($con, $_POST["bairroo"]);

$telefoneo = mysqli_real_escape_string($con, $_POST["telefoneo"]);
$facebooko = mysqli_real_escape_string($con, $_POST["facebooko"]);

$emailo = mysqli_real_escape_string($con, $_POST["emailo"]);
$senhao = mysqli_real_escape_string($con, $_POST["senhao"]);

$cd_instituicao = $_SESSION['codigo_instituicao'];

$end = $con->query("SELECT cd_endereco FROM tb_instituicao WHERE cd_instituicao = '$cd_instituicao'");
$end = $end->fetch_all();
$cd_endereco = $end[0][0];


    $alterar_endereco = "UPDATE tb_endereco SET cd_cep = '$cepo', nm_logradouro = '$logradouroo', cd_numero = '$numeroo', nm_complemento = '$complementoo', nm_bairro = '$bairro', nm_cidade = '$cidadeo', nm_estado = '$estadoo' WHERE cd_endereco = '$cd_endereco'";
    
    if(mysqli_query ($con, $alterar_endereco))
    {
        $alterar_instituicao = "UPDATE tb_instituicao SET nm_instituicao = '$nomeo', ds_instituicao = '$descricao', ds_arrecadacao = '$arrecadacao' WHERE cd_instituicao = '$cd_instituicao'";
        
        if(mysqli_query ($con, $alterar_instituicao))
        {
            $alterar_contato = "UPDATE tb_contato_instituicao SET cd_telefone = '$telefoneo', nm_facebook = '$facebooko' WHERE cd_instituicao = '$cd_instituicao'";
            if(mysqli_query ($con, $alterar_contato))
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
    }
    else
    {
        $_SESSION['editar_erro'] = true;
    }
    
    $_SESSION['nome_instituicao'] = $nomeo;
    $_SESSION['email_instituicao'] = $emailo;
    $_SESSION['senha_instituicao'] = $senhao;
    $_SESSION['descricao_instituicao'] = $descricao;
    $_SESSION['arrecadacao_instituicao'] = $arrecadacao;

    $_SESSION['cep_instituicao'] = $cepo;
    $_SESSION['logradouro_instituicao'] = $logradouroo;
    $_SESSION['numero_instituicao'] = $numeroo;
    $_SESSION['complemento_instituicao'] = $complementoo;
    $_SESSION['bairro_instituicao'] = $bairro;
    $_SESSION['cidade_instituicao'] = $cidadeo;
    $_SESSION['estado_instituicao'] = $estadoo;
    $_SESSION['descricao_instituicao'] = $descricao;

    $_SESSION['telefone_instituicao'] = $telefoneo;
    $_SESSION['facebook_instituicao'] = $facebooko;

    header("Location: homeong.php");


$con->close();

?>