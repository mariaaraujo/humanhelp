<?php
session_start();
include_once('banco.inc');
include_once('checa_voluntario.php');
date_default_timezone_set('America/Sao_Paulo');

$voluntario = $_SESSION['codigo_voluntario'];
$hoje = date('Y-m-d');
$vagas = $con->query("SELECT t.dt_trabalho, t.hr_inicio, t.hr_fim, t.ds_trabalho, t.ds_vaga, t.qt_vaga, i.nm_instituicao, e.nm_logradouro, e.cd_numero, e.nm_bairro, e.nm_cidade, e.nm_estado, t.cd_trabalho FROM tb_trabalho as t 
JOIN tb_instituicao as i
on i.cd_instituicao = t.cd_instituicao
JOIN tb_endereco as e
on e.cd_endereco = t.cd_endereco
WHERE t.qt_vaga > 0 and t.dt_trabalho > '$hoje'
ORDER BY t.dt_trabalho");
$linhas = $vagas->num_rows;



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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    <link rel="stylesheet" href="css/bootstrapmin.css">
    <style>
    
        </style>
</head>

<body>
    <header class="header-trabalhocriado">
        <div class="container">
            <input type="checkbox" id="chk">
            <label for="chk" class="show-menu-btn">
                <i class="fas fa-bars"></i>
            </label>
            <ul class="menu">
                <a><?php echo $home[0][0]; ?></a>
                <a href="homevoluntario.php">Home <span class="badge badge-primary" title="Editar Conta">🏠</span></a>
                <a href="editarvoluntario.php ">Editar <span class="badge badge-warning" title="Editar Conta">⚙</span></a>
                <a href="logout_voluntario.php">Sair <span class="badge badge-danger" title="Editar Conta">🚪</span></a>
                <label for="chk" class="hide-menu-btn">
                    <i class="fas fa-times"></i>
                </label>
            </ul>
            <div id="branding">
                <a href="homevoluntario.php"><img src="img/logotipotcc1.png" class="logo"></a>
            </div>
        </div>
        <section id="showcase">
            <div class="container"><br>
                <h1 class="text-1">Encontre ONGs/Instituições</h1><br><br>
                <form method="POST" id="form-busca" action="">
                    <div class="form-group">
                      <label for="pesquisa">Buscar</label>
                      <input type="search" name="pesquisa" id="pesquisa" class="form-control" placeholder="Digite a ONG/Instituição que está procurando">
                    </div>
                    <input type="submit" name="buscar" id="buscar" class="btn btn-info btn-lg btn-block" value="Buscar">
                </form>
            </div>
        </section>
    </header>
    <div id="resultado" class="resultado">

    </div>
    <section id="boxes" class="vaga"><br>
    <h2 id="topico-b">Vagas recentes
    </h2>
    <div class="container">
    <?php
        
        for($i=0; $i<$linhas; $i++)
        {
        $validaExibicao = true;
        $dados = $vagas->fetch_row();
        $data = $dados[0];
        $hr_inicio = $dados[1];
        $hr_fim = $dados[2];
        $trabalho = $dados[3];
        $vaga = $dados[4];
        $qt_vaga = $dados[5];
        $nome_instituicao = $dados[6];
        $logradouro = $dados[7];
        $numero = $dados[8];
        $bairro = $dados[9];
        $cidade = $dados[10];
        $estado = $dados[11];
        $cd_trabalho = $dados[12];
        $validaP = $con->query("select cd_trabalho from tb_vaga where cd_voluntario = $voluntario");
        while($dadosP = $validaP->fetch_assoc()){
            if($cd_trabalho == $dadosP["cd_trabalho"]){
                $validaExibicao = false;
            }
        }
        
        if($validaExibicao == true){

        $aux = explode("-", $data);
        $ano = $aux[0];
        $mes = $aux[1];
        $dia = $aux[2];
        echo "
            <div id=\"boxes\" class=\"vagas\">
            <div class=\"box\" id=\"caixinha\">
            <h3 align=\"center\">$trabalho</h3>
            <br>
            <p><b>Vaga: </b>$vaga</p>
            <p><b>ONG/Instituição: </b>$nome_instituicao</p>
            <p><b>Quantidade de vaga: </b>$qt_vaga</p>
            <p><b>Data: </b>$dia/$mes/$ano</p>
            <p><b>Horário do início: </b>$hr_inicio</p>
            <p><b>Horário do fim: </b>$hr_fim</p>
            <p><b>Endereço: </b>$logradouro, $numero - $bairro, $cidade, $estado</p>

            <center><a href=\"candidatar_vaga.php?cdtrabalho=$cd_trabalho\" class=\"btn btn-success btn-lg\">Candidatar-se a vaga</a></center></div></div>";
        }
    }
    $con->close();
    ?>
    </div><br>
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
    <script type="text/javascript" src="js/busca.js"></script>
</body>

</html>