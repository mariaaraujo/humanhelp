<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
require_once('banco.inc');
require_once('checa_voluntario.php');

$voluntario = $_SESSION['codigo_voluntario'];
$data = date('Y-m-d');

$real = $con->query("SELECT t.dt_trabalho, t.ds_trabalho, e.nm_logradouro, e.cd_numero, e.nm_bairro, e.nm_cidade, e.nm_estado, i.nm_instituicao, t.ds_vaga FROM tb_trabalho as t
JOIN tb_instituicao as i
on i.cd_instituicao = t.cd_instituicao
JOIN tb_endereco as e
on e.cd_endereco = t.cd_endereco
JOIN tb_vaga as v
on v.cd_trabalho = t.cd_trabalho
JOIN tb_voluntario as vo
on vo.cd_voluntario = v.cd_voluntario
WHERE vo.cd_voluntario = '$voluntario' AND t.dt_trabalho <= '$data'
ORDER BY t.dt_trabalho");
$linha = $real->num_rows;

$home = $con->query("SELECT nm_voluntario FROM tb_voluntario WHERE cd_voluntario = '$voluntario'");
$home = $home->fetch_all();
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
            .caixinhano {
                background-color: rgb(204, 89, 89);
                border-radius: 15px;
                padding: 30px;
                line-height: 1;
                margin-left: 500px;
                margin-right: 500px;
                margin-top: 60px;
                margin-bottom: 85px;
            }
            
            .caixinhano h3 {
                color: #fff;
                font-size: 25px;
                text-align: center;
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
                    <br><br><br><br><br>
                    <h1 class="text-1">Trabalhos realizados</h1>
                    <br><br>
                </div>
            </section>
        </header>

        <section id="boxes"><br>
        <div class="container">
        <?php
        
        for($i=0; $i<$linha; $i++)
        {
        $dados = $real->fetch_row();
        $data = $dados[0];
        $trabalho = $dados[1];
        $logradouro = $dados[2];
        $numero = $dados[3];
        $bairro = $dados[4];
        $cidade = $dados[5];
        $estado = $dados[6];
        $ong = $dados[7];
        $vaga = $dados[8];
        
        $aux = explode("-", $data);
        $ano = $aux[0];
        $mes = $aux[1];
        $dia = $aux[2];

        echo "
        <div id=\"boxes\" class=\"vagas\">
        <div class=\"box\" id=\"caixin\">
            <h3 align=\"center\">$ong</h3>
            <p><b>Data: </b>$dia/$mes/$ano</p>
            <p><b>Trabalho: </b>$trabalho</p>
            <p><b>Vaga: </b>$vaga<p>
            <p><b>Endereço: </b>$logradouro, $numero - $bairro, $cidade, $estado</p>
        </div> </div>";
        }
        if($linha == 0){
            echo "<center>
            <div id=\"boxes\" class=\"trab\">
            <div class=\"box\" id=\"possui\">
            <h4 class=\"possuir\">
            Você ainda não realizou nenhum trabalho!<br>
            <a href=\"buscar.php\">Começar agora </a>
            </h4>
            </div></div>
            </center>";
        }
        $con->close();
    ?>
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