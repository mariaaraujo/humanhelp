<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
require_once('banco.inc');
require_once('checa_voluntario.php');

$ong = $_GET['cdong'];
$voluntario = $_SESSION['codigo_voluntario'];

$instituicao = $con->query("SELECT i.nm_instituicao, i.dt_criacao, i.ds_instituicao, i.ds_arrecadacao, e.nm_logradouro, e.cd_numero, e.nm_bairro, e.nm_cidade, e.nm_estado, c.cd_telefone, c.nm_facebook FROM tb_instituicao as i
JOIN tb_endereco as e
on e.cd_endereco = i.cd_endereco
JOIN tb_contato_instituicao as c
on c.cd_instituicao = i.cd_instituicao
WHERE i.cd_instituicao = '$ong'");
$linhas = $instituicao->num_rows;

$qt_vaga = $con->query("SELECT count(cd_trabalho) FROM tb_trabalho WHERE cd_instituicao = '$ong'");
$qt_vaga = $qt_vaga->fetch_all();
$qt_vaga = $qt_vaga[0][0];

$qt_voluntario = $con->query("SELECT count(v.cd_vaga) FROM tb_vaga AS v JOIN tb_trabalho AS t ON t.cd_trabalho = v.cd_trabalho WHERE t.cd_instituicao = '$ong'");
$qt_voluntario = $qt_voluntario->fetch_all();
$qt_voluntario = $qt_voluntario[0][0];

$arrecadacao = $con->query("SELECT ds_arrecadacao FROM tb_instituicao WHERE cd_instituicao='$ong'");
$arrecadacao = $arrecadacao->fetch_all();
$arrecadacao = $arrecadacao[0][0];

$nome = $con->query("SELECT nm_voluntario FROM tb_voluntario WHERE cd_voluntario = '$voluntario'");
$nome = $nome->fetch_all();

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
                        <?php echo $nome[0][0]; ?>
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

            <?php
        
        for($i=0; $i<$linhas; $i++)
        {
        $dados = $instituicao->fetch_row();
        $instituicao = $dados[0];
        $data = $dados[1];
        $descricao = $dados[2];
        $arrecadacao = $dados[3];
        $logradouro = $dados[4];
        $numero = $dados[5];
        $bairro = $dados[6];
        $cidade = $dados[7];
        $estado = $dados[8];
        $telefone = $dados[9];
        $facebook = $dados[10];

        $aux = explode("-", $data);
        $ano = $aux[0];
        $mes = $aux[1];
        $dia = $aux[2];
    }
    
    ?>
            <section id="showcase">
                <div class="container">
                    <br><br><br>
                    <h1 class="text-1"> <?php echo $instituicao; ?> </h1>
                    <br><br>
                </div>
            </section>
        </header>

        <section id="boxes">
        <div class="container">
            <div class="box" id="perfil-button">

                <hr>
                <img src="img/ongs.png" class="image" title="Ongs">
                <h3 class="text-3"><?php echo $instituicao; ?></h3><br>
                <p><b> Tipo de usuário: </b><span class="badge badge-secondary" title="Voluntário">ONG/Instituição</span></p>
                <p><?php echo "<b>Data de criação:</b> ".$dia."/".$mes."/".$ano; ?></p>
                <p><?php echo "<b>Endereço:</b> ".$logradouro.", ".$numero." - ".$bairro.", ".$cidade." - ",$estado; ?></p>
                <p><?php echo "<b>Telefone:</b> ".$telefone; ?></p>
                <br>
                <hr>
            </div>
            <div class="box" id="perfil">
                <hr>
                <h3 class="text-1">Trabalhos criados</h3>
                <p>
                    <h4 class="text-vgcriadas"><?php echo $qt_vaga; ?></h4>
                </p>
                <hr>
                <h3 class="text-1">Descrição da Ong</h3>
                <hr>
                <p class="text-p"><?php echo $descricao; ?></p>
                <hr>
                <br>
            </div>
            <div class="box" id="perfil">
                <hr>
                <h3 class="text-1">Voluntários da ONG</h3>
                <p>
                    <h4 class="text-vgcriadas"><?php echo $qt_voluntario; ?></h4>
                </p>
                <hr>
                <h3 class="text-1">Arrecadação</h3>
                <hr>
                <p class="text-p"><?php if($arrecadacao == null){ $arrecadacao = "<b>A ".$instituicao." não arrecada nada!</b>";
                echo $arrecadacao;}
                else{ echo "<b>".$arrecadacao."</b>";}
                ?></p>
                <hr>
                <br>
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