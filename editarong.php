<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
require_once('banco.inc');
require_once('checa_ong.php');
$instituicao = $_SESSION['codigo_instituicao'];

$editar = $con->query("SELECT i.nm_instituicao, i.ds_instituicao, i.ds_arrecadacao, e.cd_cep, e.nm_logradouro, e.cd_numero, e.nm_complemento, e.nm_estado, e.nm_cidade, e.nm_bairro, c.cd_telefone, c.nm_facebook, i.nm_email, i.nm_senha FROM tb_instituicao as i
JOIN tb_endereco as e
on e.cd_endereco = i.cd_endereco
JOIN tb_contato_instituicao as c
on c.cd_instituicao = i.cd_instituicao
WHERE i.cd_instituicao = '$instituicao'");
$editar = $editar->fetch_all();

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
                    <a>
                        <?php echo $editar[0][0]; ?>
                            <a>
                                <a href="homeong.php">Home <span class="badge badge-primary" title="Home">🏠</span></a>
                                <a href="editarong.php">Editar <span class="badge badge-warning" title="Editar conta">⚙</span></a>
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
                <div class="container">
                    <br><br><br>
                    <h1 class="text-1">Editar dados</h1>
                    <br><br>
                </div>
            </section>
        </header>

        <section id="boxes">
            <form id="ong" name="ong" method="post" action="editar_ong.php">
                <div class="container">
                    <div class="box">
                    <img src="img/ong.png" class="image" title="Ongs">
                    <h3 class="text-2">Editando dados</h3>
                    <p class="alterar">Caso houver alguma alteração de seus dados, basta editá-los.</p>
                    <br>
                        <h5 align="center">Informações gerais:</h5>
                        <br>

                        <div class="form-group">
                            <label id="nome">Nome da instituição</label>
                            <input type="text" maxlength="70" class="form-control" value="<?php echo $editar[0][0]; ?>" id="nomeo" name="nomeo" placeholder="Digite o nome">
                        </div>

                        <div class="form-group">
                            <label id="desc">Breve descrição da ong</label>
                            <textarea class="form-control" id="descricao" name="descricao" placeholder="Digite uma breve descrição" rows="4">
                                <?php echo $editar[0][1]; ?>
                            </textarea>
                        </div>

                        <div class="form-group">
                            <label>Arrecadações</label>
                            <input type="text" class="form-control" value="<?php echo $editar[0][2]; ?>" name="arrecadacao" id="arrecadacao" placeholder="Informe o(s) item(s) arrecadado(s)">
                        </div>
                    </div>

                    <div class="box">
                        <h5 align="center">Endereço:</h5>
                        <br>

                        <div class="form-group">
                            <label id="cep">CEP</label>
                            <input type="text" maxlength="9" class="form-control" value="<?php echo $editar[0][3]; ?>" id="cepo" name="cepo" placeholder="Digite o CEP">
                        </div>

                        <div class="form-group">
                            <label id="logradouro">Logradouro</label>
                            <input type="text" maxlength="100" class="form-control" value="<?php echo $editar[0][4]; ?>" onkeypress="return letras(event)" id="logradouroo" name="logradouroo" placeholder="Digite o logradouro" readonly>
                        </div>

                        <div class="form-group">
                            <label id="numero">Número</label>
                            <input type="text" maxlength="5" class="form-control" value="<?php echo $editar[0][5]; ?>" onkeypress="return numeros(event)" id="numeroo" name="numeroo" placeholder="Digite o número">
                        </div>

                        <div class="form-group">
                            <label id="complemento">Complemento (opcional)</label>
                            <input type="text" maxlength="12" class="form-control" value="<?php echo $editar[0][6]; ?>" id="complementoo" name="complementoo" placeholder="Digite o complemento (opcional)">
                        </div>

                        <div class="form-group">
                            <label for="estadoo">Estado</label>
                            <input type="text" maxlength="100" class="form-control" value="<?php echo $editar[0][7]; ?>" id="estadoo" name="estadoo" placeholder="Digite o estado" readonly>
                        </div>

                        <div class="form-group">
                            <label id="cidade">Cidade</label>
                            <input type="text" maxlength="40" class="form-control" value="<?php echo $editar[0][8]; ?>" onkeypress="return letras(event)" id="cidadeo" name="cidadeo" placeholder="Digite a cidade" readonly>
                        </div>

                        <div class="form-group">
                            <label id="logradouro">Bairro</label>
                            <input type="text" maxlength="60" class="form-control" value="<?php echo $editar[0][9]; ?>" onkeypress="return letras(event)" id="bairroo" name="bairroo" placeholder="Digite o bairro" readonly>
                        </div>

                    </div>

                    <div class="box">
                        <h5 align="center">Contato:</h5>
                        <br>

                        <div class="form-group">
                            <label id="nomeo">Telefone</label>
                            <input type="text" maxlength="16" class="form-control" value="<?php echo $editar[0][10]; ?>" id="telefoneo" name="telefoneo" placeholder="Informe o telefone" OnKeyPress="formato('##-#########', this)">
                        </div>

                        <div class="form-group">
                            <label id="nomeo">Facebook (opcional)</label>
                            <input type="text" maxlength="150" class="form-control" value="<?php echo $editar[0][11]; ?>" id="facebooko" name="facebooko" placeholder="Insira aqui a URL da página">
                        </div>
                        <br>
                        <h5 align="center">Informações para o login:</h5>
                        <br>

                        <div class="form-group">
                            <label id="emailo">E-mail</label>
                            <input type="text" maxlength="100" class="form-control" value="<?php echo $editar[0][12]; ?>" id="emailo" name="emailo" placeholder="Digite o email">
                        </div>

                        <div class="form-group">
                            <label id="senhao">Senha</label>
                            <input type="password" maxlength="25" class="form-control" value="<?php echo $editar[0][13]; ?>" id="senhao" name="senhao" placeholder="Digite a senha">
                        </div>

                    </div>

                    <input type="submit" id="botaoOng" class="btn btn-primary btn-lg btn-block" value="Editar dados">
                    <br>
                    <?php $cdoong = $_SESSION['codigo_instituicao']; echo "<center><a href=\"excluir_ong.php?idong=$cdoong\" onClick=\"return confirm('Deseja realmente excluir sua conta?')\">Excluir conta</a></center>" ?>
                        </p>
                </div>
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

        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/valida/validaong.js"></script>
        <script type="text/javascript" src="js/cepdaong.js"></script>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/validacnpj.js"></script>
        <script type="text/javascript" src="js/jquery.validate.js"></script>
        <script type="text/javascript" src="js/jquery-1.2.6.pack.js"></script>
        <script type="text/javascript" src="js/jquery.maskedinput-1.1.4.pack.js"></script>
        
        <script>
        $(document).ready(function(){
        $("#cepo").mask("99999-999");
        });
        $(document).ready(function(){
	    $("#telefoneo").mask("(99) 9999-9999");
        });
        $(document).ready(function() {
				
                function limpa_formulário_cep() {
            
                    $("#cepo").val("");
                    $("#logradouroo").val("");
                    $("#bairroo").val("");
                    $("#cidadeo").val("");
                    $("#estadoo").val("");
                }
            
                $("#cepo").blur(function() {
            
                    var cep = $(this).val().replace(/\D/g, '');
            
                    if (cep != "") {
            
                        var validacep = /^[0-9]{8}$/;
            
                        if(validacep.test(cep)) {
            
                            $("#logradouroo").val("...");
                            $("#bairroo").val("...");
                            $("#cidadeo").val("...");
                            $("#estadoo").val("...");
            
                            $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
            
                                if (!("erro" in dados)) {
                                    $("#logradouroo").val(dados.logradouro);
                                    $("#bairroo").val(dados.bairro);
                                    $("#cidadeo").val(dados.localidade);
                                    $("#estadoo").val(dados.uf);
                                    $("#numeroo").focus();
                                }
                                else {
                                    limpa_formulário_cep();
                                    alert("O CEP: "+cep+" não foi encontrado");
                                }
                            });
                        }
                        else {
                            limpa_formulário_cep();
                            alert("O CEP: "+cep+" é inválido.");
                        }
                    }
                    else {
                        limpa_formulário_cep();
                    }
                });
            });
        </script>
    </body>

</html>