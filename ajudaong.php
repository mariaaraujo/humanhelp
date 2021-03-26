<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
require_once('banco.inc');
require_once('checa_ong.php');
$cd_instituicao = $_SESSION['codigo_instituicao'];
$home = $con->query("SELECT nm_instituicao, nm_email FROM tb_instituicao WHERE cd_instituicao = '$cd_instituicao'");
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
                    <br>
                    <br>
                    <br>
                    <h1 class="text-1">Tire suas dúvidas aqui</h1>
                    <br>
                    <br>
                </div>
            </section>
        </header>

    <section id="boxes">
        <div class="container">
            <h2 id="topico">ONGs e Instituições, qual o tipo de dúvida? </h2>
            <div class="box" id="informar">
                <img src="img/trab3.png" class="image" title="Ongs">
                <h3 class="text-2">Como criar os trabalhos voluntários?</h3>
                <p>A opção de criar trabalhos voluntários será efetuada após o cadastro ou login da Instituição/ONG, redirecionando para para página principal, assim terá a opção de criar.
                </p>
            </div>
            <div class="box" id="informar">
                <img src="img/trab4.png" class="image" title="Ongs">
                <h3 class="text-2">Posso limitar quantidade de voluntários?</h3>
                <p>Sim, você pode colocar o número de voluntários que possam estar presentes no trabalho criado, dessa forma quando a quantidade atingir o total não será mais aceito voluntários.
                </p>
            </div>
        </div>
    </section>

    <section id="boxes" class="suporte">
        <div class="container">
            <div class="box">
            </div>
            <div class="box">
                <h3 class="text-2">Preencha o formulário</h3>
                <form method="POST" action="email.php">
                    <div class="form-group">
                        <label for="nomeduvida">Nome</label>
                        <input type="text" class="form-control" id="nomeduvida" name="nomeduvida" value="<?php echo $home[0][0]; ?>" aria-describedby="emailHelp" placeholder="Digite seu nome" disabled>
                    </div>
                    <div class="form-group">
                    <label for="emailduvida">E-mail</label>
                    <input type="email" maxlength="100" class="form-control" id="emailduvida" name="emailduvida" value="<?php echo $home[0][1]; ?>" placeholder="Digite seu email" disabled>
                    </div>
                    <div class="form-group">
                        <label for="duvida">Sua dúvida</label>
                        <textarea class="form-control" id="duvida" name="duvida" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-info btn-lg btn-block">Enviar dúvida</button>
                </form>
            </div>
        </div>
    

     <footer>
        <p>Acesse nossas redes sociais e fique por dentro.</p>
        <p class="one">
            <a href="https://twitter.com/humanhelpbr"><img src="img/twitter.png"></a>
            <a href="https://instagram.com/humanhelpbr"><img src="img/instagram.png"></p>
        </a>
        <p>Equipe Human Help Copyright &copy; 2019</p>
    </footer>
    </section>
</body>

</html>