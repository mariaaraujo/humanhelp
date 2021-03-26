<?php
session_start();
?>
<!DOCTYPE html>
<link rel="shortcut icon" href="img/icon.png" />
<html>

<head>
    <style>        
        #causasocial {
            width: 295x;
            height: 35px;
            background-color: #fff;
            border-radius: 5px;
        }
        
        #rdn {
            margin-left: 0px;
        }
        
        #rds {
            margin-right: 0px;
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
    <header class="header-cadastro-ongs">
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
                <a href="voluntario.php">Voluntários</a>
                <a href="ong.php" class="active">ONGs/Instituições</a>
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
                <br><a href="loginong.php" class="btn btn-info btn-lg">Fazer login</a>
            </div>
        </section>
    </header>

    <section id="boxes">
    <?php
             if (isset($_SESSION['data_erro'])) {
                echo '<b><div class="alert alert-danger" align="center" role="alert">A data de criação é inválida!</div></b>';
            }
            unset($_SESSION['data_erro']);

            if (isset($_SESSION['cadastro_erro'])) {
              echo '<b><div class="alert alert-danger" align="center" role="alert">Email ou CNPJ já cadastrado! <a href="loginong.php" class="alert-link"> Clique aqui para fazer login</a></div></b>';
            }
          unset($_SESSION['cadastro_erro']);
        ?>
        <form id="ong" name="ong" method="post" action="cadastrar_ong.php">
            <div class="container">
                <h2 id="topico">ONGs/Instituições</h2>
                <div class="box">
                    <img src="img/geraisong.png" class="image" title="Ongs">
                    <h3 class="text-2">Passo 1</h3>
                    <p class="text-1">Informações gerais:</p>

                    <div class="form-group">
                        <label id="nome">Nome da instituição</label>
                        <input type="text" maxlength="70" class="form-control" id="nomeo" name="nomeo" placeholder="Digite o nome">
                    </div>

                    <div class="form-group">
                        <label id="dtcria">Data da criação</label>
                        <input type="date" min="1900-01-01" max="2019-09-24" class="form-control" id="dtcriao" name="dtcriao">
                    </div>

                    <div class="form-group">
                        <label id="cnpj">CNPJ</label>
                        <input type="text" maxlength="18" class="form-control" onkeypress="return numeros(event)" id="cnpjo" name="cnpjo" placeholder="Digite o CNPJ">
                    </div>

                    <div class="form-group">
                        <label id="desc">Breve descrição da ong</label>
                        <textarea maxlength="500" class="form-control" id="descricao" name="descricao" placeholder="Digite uma breve descrição"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Causa da ONG/Instituição</label>
                        <br>
                        <select id="causasocial" name="causasocial">
                            <option value="1">Assistência Social</option>
                            <option value="2">Cultura</option>
                            <option value="3">Saúde</option>
                            <option value="4">Meio ambiente</option>
                            <option value="5">Desenvolvimento e defesa de direitos</option>
                            <option value="6">Habitação</option>
                            <option value="7">Educação e pesquisa</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>A ONG/Instituição arrecada algo para realizar doações?</label>
                        <input type="radio" name="rd" id="rdn" onClick="habilitar()" checked> Não
                        <input type="radio" name="rd" id="rds" onClick="habilitar()"> Sim
                        <br>
                        <br>
                        <input type="text" class="form-control" onkeypress="return letras(event)" name="arrecadacao" id="arrecadacao" placeholder="Informe o(s) item(s) arrecadado(s)" disabled>
                    </div>
                </div>

                <div class="box">
                    <img src="img/endereçoong.png" class="image" title="Ongs">
                    <h3 class="text-2">Passo 2</h3>
                    <p class="text-1">Endereço:</p>

                    <div class="form-group">
                        <label id="cep">CEP</label>
                        <input type="text" maxlength="9" class="form-control" onkeypress="return numeros(event)" id="cepo" name="cepo" placeholder="Digite o CEP">
                    </div>

                    <div class="form-group">
                        <label id="logradouro">Logradouro</label>
                        <input type="text" maxlength="100" class="form-control" onkeypress="return letras(event)" id="logradouroo" name="logradouroo" placeholder="Digite o logradouro" readonly>
                    </div>

                    <div class="form-group">
                        <label id="numero">Número</label>
                        <input type="text" maxlength="5" class="form-control" onkeypress="return numeros(event)" id="numeroo" name="numeroo" placeholder="Digite o número">
                    </div>

                    <div class="form-group">
                        <label id="complemento">Complemento (opcional)</label>
                        <input type="text" maxlength="12" class="form-control" id="complementoo" name="complementoo" placeholder="Digite o complemento (opcional)">
                    </div>

                    <div class="form-group">
                        <label>Estado</label>
                        <input type="text" id="estadoo" name="estadoo" class="form-control" placeholder="Digite o estado" readonly>
                    </div>

                    <div class="form-group">
                        <label id="cidade">Cidade</label>
                        <input type="text" maxlength="40" class="form-control" onkeypress="return letras(event)" id="cidadeo" name="cidadeo" placeholder="Digite a cidade" readonly>
                    </div>

                    <div class="form-group">
                        <label id="logradouro">Bairro</label>
                        <input type="text" maxlength="60" class="form-control" onkeypress="return letras(event)" id="bairroo" name="bairroo" placeholder="Digite o bairro" readonly>
                    </div>


                </div>

                <div class="box">
                    <img src="img/contatoong.png" class="image" title="Ongs">
                    <h3 class="text-2">Passo 3</h3>
                    <p class="text-1">Contato:</p>

                    <div class="form-group">
                        <label id="nomeo">Telefone</label>
                        <input type="text" maxlength="16" class="form-control" onkeypress="return numeros(event)" id="telefoneo" name="telefoneo" placeholder="Informe o telefone">
                    </div>

                    <div class="form-group">
                        <label id="nomeo">Facebook (opcional)</label>
                        <input type="text" maxlength="150" class="form-control" id="facebooko" name="facebooko" placeholder="Insira aqui a URL da página">
                    </div>

                    <img src="img/loginong.png" class="image" title="Ongs">
                    <h3 class="text-2">Passo 4</h3>
                    <p class="text-1">Informações para o login:</p>

                    <div class="form-group">
                        <label id="emailo">E-mail</label>
                        <input type="text" maxlength="100" class="form-control" id="emailo" name="emailo" placeholder="Digite o email">
                    </div>

                    <div class="form-group">
                        <label id="senhao">Senha</label>
                        <input type="password" maxlength="25" class="form-control" id="senhao" name="senhao" placeholder="Digite a senha">
                    </div>

                </div>

                <input type="submit" id="botaoOng" class="btn btn-primary btn-lg btn-block" value="Cadastrar agora">
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
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/valida/cepong.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.validate.js"></script>
    <script type="text/javascript" src="js/jquery.maskedinput-1.1.4.pack.js"></script>
    <script type="text/javascript" src="js/valida/validaong.js"></script>
    <script type="text/javascript">
    
        function habilitar() {
            if (document.getElementById('rdn').checked == true) {
                document.getElementById('arrecadacao').disabled = true;
                document.getElementById('arrecadacao').value = "";
            }
            if (document.getElementById('rds').checked == true) {
                document.getElementById('arrecadacao').disabled = false;
            }
        }
        $(document).ready(function(){
        $("#cepo").mask("99999-999");
        });
        $(document).ready(function(){
	    $("#telefoneo").mask("(99) 9999-9999");
        });
        $(document).ready(function(){
	    $("#cnpjo").mask("99.999.999/9999-99");
        });
        
    </script>

</body>

</html>