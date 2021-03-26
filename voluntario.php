<?php
session_start();
?>
<!DOCTYPE html>
<link rel="shortcut icon" href="img/icon.png" />
<html>

<head>
    <style>
        
        .erro {
            color: red;
        }
        
        label {
            color: #262626;
        }
        .error,
        label.error {
            color: red;
            font-size: 15px;
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title> Human Help - Cadastre-se Voluntários</title>
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    <link rel="stylesheet" href="css/bootstrapmin.css">
</head>

<body>
    <header class="header-cadastro-voluntario">
    <?php
        if (isset($_SESSION['excluir_conta'])) {
            echo '<b><div class="alert alert-warning" align="center" role="alert">Sua conta foi excluída com sucesso! :/</div></b>';
        }
        unset($_SESSION['excluir_conta']);
    ?>
        <div class="container">
            <input type="checkbox" id="chk">
            <label for="chk" class="show-menu-btn">
                <i class="fas fa-bars"></i>
            </label>
            <ul class="menu">
                <a href="index.html">Início</a>
                <a href="sobre.html">Sobre</a>
                <a href="voluntario.php" class="active">Voluntários</a>
                <a href="ong.php">ONGs/Instituições</a>
                <a href="suporte.php">Suporte</a>
                <label for="chk" class="hide-menu-btn">
                    <i class="fas fa-times"></i>
                </label>
            </ul>
            <div id="branding">
                <a href="index.html"><img src="img/logotipotcc1.png" class="logo"></a>
            </div>
        </div>
        <section id="showcase">
            <div class="container">
                <h1 class="text-1">Cadastre-se agora</h1>
                <br><br>
                <p class="text-1">Trabalhamos com um único objetivo oferecer um portal para Voluntários e ONGs/Instituições, encontrar trabalhos de voluntariado oferecido pelas instituições. Procure agora o serviço que mais combina com você.</p>
                <br><br>
                <a href="loginvoluntario.php" class="btn btn-info btn-lg">Fazer login</a>
            </div>
        </section>
    </header>

    <section id="boxes">
    <?php
             if (isset($_SESSION['data_erro'])) {
                echo '<b><div class="alert alert-danger" align="center" role="alert">A data de nascimento é inválida!</div></b>';
            }
            unset($_SESSION['data_erro']);

            if (isset($_SESSION['cadastro_erro'])) {
              echo '<b><div class="alert alert-danger" align="center" role="alert">Email ou CPF já cadastrado! <a href="loginvoluntario.php" class="alert-link"> Clique aqui para fazer login</a></div></b>';
            }
          unset($_SESSION['cadastro_erro']);
        ?>
        <form id="volunt" name="volunt" method="post" action="cadastrar_voluntario.php">
            <div class="container">
                <h2 id="topico">Voluntários </h2>
                <div class="box">
                    <img src="img/gerais.png" class="image" title="Voluntarios">
                    <h3 class="text-2">Passo 1</h3>
                    <p class="text-1">Informações gerais:</p>

                    <div class="form-group">
                        <label for="nomev">Nome completo</label>
                        <input type="text" maxlength="70" class="form-control" id="nomev" name="nomev" placeholder="Digite seu nome completo" onKeyPress="letra()">
                    </div>

                    <div class="form-group">
                        <label for="cpfv">CPF</label>
                        <input type="text" maxlength="14" class="form-control" onkeypress="return numeros(event)" id="cpfv" name="cpfv" placeholder="Digite seu CPF" OnKeyPress="formato('###.###.###-##', this)">
                    </div>

                    <div class="form-group">
                        <label for="dtnasc">Data de Nascimento</label>
                        <input type="date" class="form-control" min="1917-01-01" max="2005-01-01" id="dtnascv" name="dtnascv" placeholder="Digite seu nome">
                    </div>
                </div>

                <div class="box">
                    <img src="img/endereço.png" class="image" title="Ongs">
                    <h3 class="text-2">Passo 2</h3>
                    <p class="text-1">Endereço:</p>

                    <div class="form-group">
                        <label for="cepv">CEP</label>
                        <input type="text" maxlength="9" class="form-control" onkeypress="return numeros(event)" id="cepv" name="cepv" placeholder="Digite seu CEP">
                    </div>

                    <div class="form-group">
                        <label for="logradourov">Logradouro</label>
                        <input type="text" maxlength="100" class="form-control"  id="logradourov" name="logradourov" placeholder="Digite o logradouro" readonly>
                    </div>

                    <div class="form-group">
                        <label for="numerov">Número</label>
                        <input type="text" maxlength="5" class="form-control" onkeypress="return numeros(event)" id="numerov" name="numerov" placeholder="Digite o número" onKeyPress="return numero(event)">
                    </div>

                    <div class="form-group">
                        <label for="complementov">Complemento (opcional)</label>
                        <input type="text" maxlength="12" class="form-control" id="complementov" name="complementov" placeholder="Digite o complemento (opcional)">
                    </div>

                    
                    <div class="form-group">
                      <label for="estadov">Estado</label>
                      <input type="text" class="form-control" id="estadov" name="estadov" placeholder="Digite o estado" readonly>
                    </div>
                        
                        <div class="form-group">
                          <label id="cidade">Cidade</label>
                          <input type="text" maxlength="40" class="form-control" id="cidadev" name="cidadev" placeholder="Digite a cidade" onKeyPress="letra()" readonly>
                        </div>
                        
                        <div class="form-group">
                            <label for="bairrov">Bairro</label>
                            <input type="text" maxlength="40" class="form-control"  id="bairrov" name="bairrov" placeholder="Digite o bairro" readonly>
                        </div>
                    <br>
                </div>
                <div class="box">
                    <img src="img/usuario.png" class="image" title="Ongs">
                    <h3 class="text-2">Passo 3</h3>
                    <p class="text-1">Informações para o login:</p>

                    <div class="form-group">
                        <label id="emailv">E-mail</label>
                        <input type="text" maxlength="100" class="form-control" id="emailv" name="emailv" placeholder="Digite seu email">
                    </div>

                    <div class="form-group">
                        <label id="senhav">Senha</label>
                        <input type="password" maxlength="25" class="form-control" id="senhav" name="senhav" placeholder="Digite sua senha">
                    </div>
                    <br>
                    <div class="form-group">  
                      <input type="checkbox" id="termovoluntariado" name="termovoluntariado"> Eu li e aceito o <a href="arquivos/termo_adesao_voluntario.pdf" target="_blank">Termo de Adesão do Voluntário</a>
                    </div>
                </div>
                <br><br>
                <input type="submit" id="cadastrar" name="cadastrar" class="btn btn-primary btn-lg btn-block" value="Cadastrar agora">
              </p>

            </div>
        </form>

    <footer>
        <p class="one">Informações adicionais:</p>
        <p><a href="sobre.html">Sobre o projeto</a></p>
        <p>Acesse nossas redes sociais e fique por dentro.</p>
        <p class="one">
            <a href="https://twitter.com/humanhelpbr"><img src="img/twitter.png"></a>
            <a href="https://instagram.com/humanhelpbr"><img src="img/instagram.png"></p>
        </a>
        <p>Equipe Human Help Copyright &copy; 2019</p>
    </footer>
    </section>

    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/validacpf.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/valida/cepvoluntario.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.validate.js"></script>
    <script type="text/javascript" src="js/jquery.maskedinput-1.1.4.pack.js"></script>
    <script type="text/javascript" src="js/valida/validavoluntario.js"></script>
    <script type="text/javascript">
    
    $(document).ready(function(){
	$("#cpfv").mask("999.999.999-99");
	});
    
    $(document).ready(function(){
	$("#cepv").mask("99999-999");
    });
    
    jQuery.validator.addMethod("cepv", function(value, element) {
    return this.optional(element) || /^[0-9]{5}-[0-9]{3}$/.test(value);
    }, "Por favor, digite um CEP válido");

    </script>
</body>

</html>