<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
require_once('banco.inc');
require_once('checa_ong.php');

$cd_instituicao = $_SESSION['codigo_instituicao'];

$qt_vaga = $con->query("SELECT count(cd_trabalho) FROM tb_trabalho WHERE cd_instituicao = '$cd_instituicao'");
$qt_vaga = $qt_vaga->fetch_all();
$qt_vaga = $qt_vaga[0][0];

$qt_voluntario = $con->query("SELECT count(v.cd_vaga) FROM tb_vaga AS v JOIN tb_trabalho AS t ON t.cd_trabalho = v.cd_trabalho WHERE t.cd_instituicao = '$cd_instituicao'");
$qt_voluntario = $qt_voluntario->fetch_all();
$qt_voluntario = $qt_voluntario[0][0];

$home = $con->query("SELECT nm_instituicao FROM tb_instituicao WHERE cd_instituicao = '$cd_instituicao'");
$home = $home->fetch_all();

$con->close();
?>
<!DOCTYPE html>
<link rel="shortcut icon" href="img/icon.png" />
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title> Human Help - portal do voluntariado </title>
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    <link rel="stylesheet" href="css/bootstrapmin.css">
</head>
<style>
        .error,
        label.error {
            color: red;
            font-size: 15px;
        }
</style>
<body>
    <header class="header-trabalhocriado">
        <div class="container">
            <input type="checkbox" id="chk">
            <label for="chk" class="show-menu-btn">
                <i class="fas fa-bars"></i>
            </label>
            <ul class="menu">
                <a><?php echo $home[0][0]; ?><a>
                <a href="homeong.php">Home <span class="badge badge-primary" title="Home">🏠</span></a>
                <a href="editarong.php">Editar <span class="badge badge-warning" title="Editar Conta">⚙</span></a>
                <a href="logout_ong.php">Sair <span class="badge badge-danger" title="Sair">🚪</span></a>
                <label for="chk" class="hide-menu-btn">
                    <i class="fas fa-times"></i>
                </label>
            </ul>
            <div id="branding">
                <a href="homeong.php"><img src="img/logotipotcc1.png" class="logo"></a>
            </div>
        </div>
        <section id="showcase">
            <div class="container"><br><br><br>
                <h1 class="text-1">Criar vaga</h1><br><br>
                <p class="text-1">Crie suas vagas e encontrem seus voluntários.</p>
            </div>
        </section>
    </header>

    <section id="boxes">
        <?php
             if (isset($_SESSION['data_erro'])) {
                echo '<b><div class="alert alert-danger" align="center" role="alert">A data inserida já passou!</div></b>';
            }
            unset($_SESSION['data_erro']);

            if (isset($_SESSION['hora_inicio'])) {
                echo '<b><div class="alert alert-danger" align="center" role="alert">A hora do início deve ser menor que a hora do fim!</div></b>';
            }
            unset($_SESSION['hora_inicio']);

            if (isset($_SESSION['hora_fim'])) {
                echo '<b><div class="alert alert-danger" align="center" role="alert">A hora do fim deve ser maior que a hora do início!</div></b>';
            }
            unset($_SESSION['hora_fim']);

            if (isset($_SESSION['hora_igual'])) {
              echo '<b><div class="alert alert-danger" align="center" role="alert">A hora do início e do fim devem ser diferentes!</div></b>';
            }
            unset($_SESSION['hora_igual']);
        ?>
        <br>
        <form id="vaga" method="post" onSubmit="return validahora(this);" action="criar_vaga.php">
        <div class="container">
            <div class="box"><br>
            <img src="img/ong.png" class="image" title="Ongs">
                <h3 class="text-2">Criando vagas</h3>
                <p class="alterar">Compartilhe agora mesmo um novo trabalho para os voluntários se candidatarem e ajudarem sua ONG/Instituição.</p>
            <br><br><br>
                <h3 class="text-1">Vagas criadas</h3>
                <p><h4 class="text-vgcriadas"><?php echo $qt_vaga; ?>
            </h4></p><br><br>
            
                <h3 class="text-1">Voluntários da ONG/Instituição</h3>
                <p><h4 class="text-vgcriadas"><?php echo $qt_voluntario; ?></h4></p>
            
            </div>

            <div class="box">
                <h3 class="text-1">Informações sobre a vaga</h3>
                <hr>
                    <div class="form-group">
                    <label id="dttrab">Data do trabalho:</label>
                    <input type="date" class="form-control" id="dttrab" name="dttrab" max="2025-01-01">
                    </div>

                    <div class="form-group">
                    <label id="hrinicio">Hora do início:</label>
                    <input type="time" class="form-control" id="hrinicio" name="hrinicio">
                    </div>

                    <div class="form-group">
                    <label id="hrfim">Hora do fim:</label>
                    <input type="time" class="form-control" id="hrfim" name="hrfim">
                    </div>

                    <div class="form-group">
                    <label for="dstrab">Título do trabalho:</label>
                    <input type="text" maxlength="150" class="form-control" id="dstrab" name="dstrab" placeholder="Informe um título para o trabalho">
                    </div>

                    <div class="form-group">
                    <label for="dsvaga">Descrição da vaga:</label>
                    <input type="text" maxlength="200" class="form-control" id="dsvaga" name="dsvaga" placeholder="Informe uma breve descrição da vaga">
                    </div>

                    <div class="form-group">
                    <label for="qtvaga">Quantidade de vagas:</label>
                    <input type="text" maxlength="2" class="form-control" onkeypress="return numeros(event)" id="qtvaga" name="qtvaga" placeholder="Informe a quantidade de vagas">
                    </div>
                <hr>
            </div>
            <div class="box">
            <h3 class="text-1">Endereço do local</h3>
                <hr>
                <div id="enderecotrab">
                <div class="form-group">
                        <label for="cep">CEP</label>
                        <input type="text" maxlength="9" class="form-control" onkeypress="return numeros(event)" id="ceptrab" name="ceptrab" placeholder="Digite o CEP">
                    </div>

                    <div class="form-group">
                        <label for="logradouro">Logradouro</label>
                        <input type="text" maxlength="100" class="form-control" onkeypress="return letras(event)" id="logradourotrab" name="logradourotrab" placeholder="Digite o logradouro" readonly>
                    </div>

                    <div class="form-group">
                        <label for="numero">Número</label>
                        <input type="text" maxlength="5" class="form-control" onkeypress="return numeros(event)" id="numerotrab" name="numerotrab" placeholder="Digite o número">
                    </div>

                    <div class="form-group">
                        <label for="complemento">Complemento (opcional)</label>
                        <input type="text" maxlength="12" class="form-control" id="complementotrab" name="complementotrab" placeholder="Digite o complemento (opcional)">
                    </div>

                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <input type="text" id="estadotrab" name="estadotrab" class="form-control" placeholder="Digite o estado" readonly>
                    </div>

                    <div class="form-group">
                        <label for="cidade">Cidade</label>
                        <input type="text" maxlength="40" class="form-control" onkeypress="return letras(event)" id="cidadetrab" name="cidadetrab" placeholder="Digite a cidade" readonly>
                    </div>

                    <div class="form-group">
                        <label for="bairro">Bairro</label>
                        <input type="text" maxlength="60" class="form-control" onkeypress="return letras(event)" id="bairrotrab" name="bairrotrab" placeholder="Digite o bairro" readonly>
                    </div>
                </div>
                <hr>
                <input type="submit" id="criarvaga" name="criarvaga" onclick="return validahora()" class="btn btn-primary btn-lg btn-block" value="Criar vaga">
            </div>
        </div>
        <br>
            </form>
            <footer>
        <p>Acesse nossas redes sociais e fique por dentro.</p>
        <p class="one">
            <a href="https://twitter.com/humanhelpbr"><img src="img/twitter.png"></a>
            <a href="https://instagram.com/humanhelpbr"><img src="img/instagram.png"></p>
        </a>
        <p>Equipe Human Help Copyright &copy; 2019</p>
    </footer>
    </section>
    
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/valida/ceptrabalho.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.validate.js"></script>
    <script type="text/javascript" src="js/jquery.maskedinput-1.1.4.pack.js"></script>
    <script type="text/javascript">
      $(document).ready( function() {
      $('#vaga').validate({
        rules:{ 
          dttrab:{ 
            required: true
          },
          hrinicio:{ 
            required: true
          },
          hrfim: {
            required: true
          },
          dstrab: {
            required: true
          },
          dsvaga: {
            required: true
          },
          qtvaga: {
            required: true
          },
          ceptrab: {
            required: true,
            minlength: 8
          },
          logradourotrab: {
            required: true,
            minlength: 5
          },
          numerotrab: {
            required: true
          },
          bairrotrab: {
            required: true,
            minlength: 4
          },
          cidadetrab: {
            required: true,
            minlength: 4
          }
        },
        messages:{
          dttrab:{ 
            required: "O campo data do trabalho é inválido."
          },
          hrinicio:{ 
            required: "O campo hora do início é obrigatório."
          },
          hrfim: {
            required: "O campo hora do fim é obrigatório."
          },
          dstrab:{ 
            required: "O campo título do trabalho é obrigatório."
          },
          dsvaga: {
            required: "O campo descrição da vaga é obrigatório."
          },
          qtvaga:{ 
            required: "O campo quantidade de vagas é obrigatório."
          },
          ceptrab: {
            required: "O campo CEP é obrigatório.",
            minlength: "O campo CEP deve conter 8 caracteres."
          },
          logradourotrab: {
            required: "O campo logradouro é obrigatório.",
            minlength: "O campo logradouro deve conter no mínimo 5 caracteres."
          },
          numerotrab: {
            required: "O campo número é obrigatório (caso não haja número, digite 0)."
          },
          bairrotrab: {
            required: "O campo bairro é obrigatório.",
            minlength: "O campo bairro deve conter no mínimo 4 caracteres."
          },
          cidadetrab: {
            required: "O campo cidade é obrigatório.",
            minlength: "O campo cidade deve conter no mínimo 4 caracteres."
          },
        }
      });
    });
    $(document).ready(function(){
        $("#ceptrab").mask("99999-999");
        });
    </script>
</body>

</html>