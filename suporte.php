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
    <header class="header-suporte">
        <div class="container">
            <input type="checkbox" id="chk">
            <label for="chk" class="show-menu-btn">
                <i class="fas fa-bars"></i>
            </label>
            <ul class="menu">
                <a href="index.html">Início</a>
                <a href="sobre.html">Sobre</a>
                <a href="voluntario.php">Voluntários</a>
                <a href="ong.php">ONGs/Instituições</a>
                <a href="suporte.php" class="active">Suporte</a>
                <label for="chk" class="hide-menu-btn">
                    <i class="fas fa-times"></i>
                </label>
            </ul>
            <div id="branding">
                <a href="index.html"><img src="img/logotipotcc1.png" class="logo"></a>
            </div>
        </div>
        <br>
        <section id="showcase">
            <div class="container">
                <h1 class="text-1">Suporte</h1>
                <br>
                <p class="text-1">Tire suas dúvidas aqui.</p>
            </div>
        </section>
    </header>

    <section id="boxes">
        <div class="container">
            <h2 id="topico">Voluntário, qual o tipo de dúvida? </h2>
            <div class="box">
                <img src="img/trab.png" class="image" title="Ongs">
                <h3 class="text-2">Como localizar os trabalhos voluntários?</h3>
                <p>O voluntário, ao efetuar seu login será redirecionado a página principal e em seguida após rolar a página terá a opção encontrar trabalho voluntário.
                </p>
            </div>
            <div class="box">
                <img src="img/trab2.png" class="image" title="Ongs">
                <h3 class="text-2">De que forma posso saber hora, dia ou local do trabalho?</h3>
                <p>Ao encontrar o trabalho voluntário desejado, você terá todas informações de dia, hora e local fornecido pela ONG/Instituição.
                </p>
            </div>
            <div class="box">
                <img src="img/trab1.png" class="image" title="Ongs">
                <h3 class="text-2">Será possível cancelar o trabalho?</h3>
                <p>Caso você não possa estar presente no dia do trabalho ou qualquer outra situação, poderá cancelar o trabalho que iria realiza-lo.
                </p>
            </div>
        </div>
    </section>

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

    <header class="header-inicio-sobre">
        <section id="showcase">
            <div class="container">
                <h1 class="text-1">Mande sua dúvida</h1>
                <p class="text-1">Basta enviar-nos para obter respostas sobre sua dúvida.</p>
            </div>
        </section>
    </header>

    <section id="boxes" class="suporte">
        <div class="container">
            <div class="box">
            </div>
            <div class="box">
                <h3 class="text-2">Preencha o formulário</h3>
                <form method="POST" action="email.php">
                    <div class="form-group">
                        <label for="nomeduvida">Nome</label>
                        <input type="text" class="form-control" id="nomeduvida" name="nomeduvida" placeholder="Digite seu nome">
                    </div>
                    <div class="form-group">
                        <label for="emailduvida">E-mail</label>
                        <input type="email" maxlength="100" class="form-control" id="emailduvida" name="emailduvida" placeholder="Digite seu email">
                    </div>
                    <div class="form-group">
                        <label for="duvida">Sua dúvida</label>
                        <textarea class="form-control" id="duvida" name="duvida" rows="3"></textarea>
                    </div>
                    <input type="submit" class="btn btn-info btn-lg btn-block" value="Enviar dúvida">
                </form>
            </div>
        </div>

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
</body>

</html>