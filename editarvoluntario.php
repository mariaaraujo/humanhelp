<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
require_once('banco.inc');
require_once('checa_voluntario.php');

$cdvoluntario = $_SESSION['codigo_voluntario'];

$qt_trabalho = $con->query("SELECT count(cd_voluntario) FROM tb_vaga WHERE cd_voluntario ='$cdvoluntario'");
$qt_trabalho = $qt_trabalho->fetch_all();
$qt_trabalho = $qt_trabalho[0][0];

$home = $con->query("SELECT v.nm_voluntario, v.nm_email, v.nm_senha, e.cd_cep, e.nm_logradouro, e.cd_numero, e.nm_complemento, e.nm_estado, e.nm_cidade, e.nm_bairro FROM tb_voluntario as v 
JOIN tb_endereco as e
on e.cd_endereco = v.cd_endereco
WHERE cd_voluntario = '$cdvoluntario'");
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
        <a> {
        color: red;
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
                        <?php echo $home[0][0]; ?>
                            <a>
                                <a href="homevoluntario.php">Home <span class="badge badge-primary" title="Home">🏠</span></a>
                                <a href="editarvoluntario.php">Editar <span class="badge badge-warning" title="Editar conta">⚙</span></a>
                                <a href="logout_voluntario.php">Sair <span class="badge badge-danger" title="Sair">🚪</span></a>
                                <label for="chk" class="hide-menu-btn">
                                    <i class="fas fa-times"></i>
                                </label>
                </ul>
                <div id="branding">
                    <a href="homevoluntario.php"><img src="img/logotipotcc1.png" class="logo"></a>
                </div>
            </div>
            <section id="showcase">
                <div class="container">
                    <br><br><br>
                    <h1 class="text-1">Editar dados</h1>
                    <p class="text-1">Alterar dados cadastrados</p>
                    <br><br>
                </div>
            </section>
        </header>

        <section id="boxes">
        <form id="volunt" method="post" action="editar_voluntario.php">
            <div class="container">
                <br>
                <div class="box">
                <img src="img/ong.png" class="image" title="Ongs">
                <h3 class="text-2">Editando seus dados</h3>
                <p class="alterar">Você voluntário, caso houver mudanças em seus dados basta alterar.</p>
                
                <h3 class="text-1">Trabalhos realizados</h3>
                <p><h4 class="text-vgcriadas"><?php echo $qt_trabalho; ?></h4></p>
                <br>
                <hr>
                
                <h3>Busque ONGs/Instituições</h3>

                <p class="alterar">Encontre trabalhos criados e visite os perfis das ONGs/Instituições quando desejar.
                </p>
                <img src="img/localizar.png" class="image" title="Ongs">
                <a href="buscar.php" class="btn btn-info btn-lg btn-block" >Explorar</a>
                <br>

                <h3 class="text-1">Trabalhos em andamento</h3>

                <p class="alterar">Veja os trabalhos em andamento criados pelas ONGs/Instituições.
                </p>
                <img src="img/andamento1.png" class="image" title="Ongs">
                <a href="trabalhosandamentovoluntario.php" class="btn btn-info btn-lg btn-block">Visualizar</a>
                </div>
                <div class="box">
                    <h5 align="center">Endereço:</h5><br>

                    <div class="form-group">
                        <label for="cepv">CEP</label>
                        <input type="text" maxlength="9" class="form-control" value="<?php echo $home[0][3]; ?>" onkeypress="return numeros(event)" id="cepv" name="cepv" placeholder="Digite seu CEP" OnKeyPress="formato('#####-###', this)">
                    </div>

                    <div class="form-group">
                        <label for="logradourov">Logradouro</label>
                        <input type="text" maxlength="100" class="form-control"  value="<?php echo $home[0][4]; ?>" id="logradourov" name="logradourov" placeholder="Digite o logradouro" readonly>
                    </div>

                    <div class="form-group">
                        <label for="numerov">Número</label>
                        <input type="text" maxlength="5" class="form-control" value="<?php echo $home[0][5]; ?>" onkeypress="return numeros(event)" id="numerov" name="numerov" placeholder="Digite o número" onKeyPress="return numero(event)">
                    </div>

                    <div class="form-group">
                        <label for="complementov">Complemento (opcional)</label>
                        <input type="text" maxlength="12" class="form-control" value="<?php echo $home[0][6]; ?>" id="complementov" name="complementov" placeholder="Digite o complemento (opcional)">
                    </div>

                    
                    <div class="form-group">
                        <label for="estadov">Estado</label>
                        <input type="text" maxlength="50" class="form-control"  value="<?php echo $home[0][7]; ?>" id="estadov" name="estadov" placeholder="Digite o estado" readonly>
                    </div>

                    <div class="form-group">
                      <label id="cidade">Cidade</label>
                      <input type="text" maxlength="40" class="form-control" value="<?php echo $home[0][8]; ?>" id="cidadev" name="cidadev" placeholder="Digite a cidade" onKeyPress="letra()" readonly>
                    </div>
                    
                    <div class="form-group">
                        <label for="bairrov">Bairro</label>
                        <input type="text" maxlength="40" class="form-control" value="<?php echo $home[0][9]; ?>" id="bairrov" name="bairrov" placeholder="Digite o bairro" readonly>
                    </div>
                    <br>
                </div>
                <div class="box">
                    <h5 align="center">Informações para o login:</h5><br>

                    <div class="form-group">
                        <label id="emailv">E-mail</label>
                        <input type="text" maxlength="100" class="form-control" value="<?php echo $home[0][1]; ?>" id="emailv" name="emailv" placeholder="Digite seu email">
                    </div>

                    <div class="form-group">
                        <label id="senhav">Senha antiga</label>
                        <input type="password" maxlength="25" class="form-control" value="<?php echo $home[0][2]; ?>" id="senhav" name="senhav" placeholder="Digite sua senha antiga">
                    </div>
                    <br>
                    <h3 class="text-1">Trabalhos realizados</h3>

                    <p class="alterar">Veja todos os trabalhos que você realizou e que já tiveram seu encerramento.
                    </p>
                    <img src="img/realizados.png" class="image" title="Ongs">
                    <a href="trabalhosrealizados.php" class="btn btn-info btn-lg btn-block">Visualizar</a>
                </div>

                <input type="submit" id="cadastrar" name="cadastrar" class="btn btn-primary btn-lg btn-block" value="Editar dados"><br>
                <?php $cdvoluntario = $_SESSION['codigo_voluntario']; echo "<center><a href=\"excluir_voluntario.php?idvoluntario=$cdvoluntario\" onClick=\"return confirm('Deseja realmente excluir sua conta?')\">Excluir conta</a></center>" ?>
      </p>
            </div>
        </form>
        </p>
        
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
        <script type="text/javascript" src="js/cepvoluntario.js"></script>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery.validate.js"></script>
        <script type="text/javascript">
         $(document).ready( function() {
      $('#volunt').validate({
        rules:{
          cepv: {
            required: true,
            minlength: 8
          },
          logradourov: {
            required: true,
            minlength: 5
          },
          numerov: {
            required: true
          },
          bairrov: {
            required: true,
            minlength: 4
          },
          cidadev: {
            required: true,
            minlength: 4
          },
          emailv: {
            required: true,
            email: true
          },
          senhav: {
            required: true
          }
        },
        messages:{
          cepv: {
            required: "O campo CEP é obrigatório.",
            minlength: "O campo CEP deve conter 8 caracteres."
          },
          logradourov: {
            required: "O campo logradouro é obrigatório.",
            minlength: "O campo logradouro deve conter no mínimo 5 caracteres."
          },
          numerov: {
            required: "O campo número é obrigatório (caso não haja número, digite 0)."
          },
          bairrov: {
            required: "O campo bairro é obrigatório.",
            minlength: "O campo bairro deve conter no mínimo 4 caracteres."
          },
          cidadev: {
            required: "O campo cidade é obrigatório.",
            minlength: "O campo cidade deve conter no mínimo 4 caracteres."
          },
          emailv: {
            required: "O campo email é obrigatório.",
            email: "O campo email deve conter um email válido."
          },
          senhav: {
            required: "O campo senha é obrigatório."
          }
        }
      });
    });
        </script>
    </body>

    </html>