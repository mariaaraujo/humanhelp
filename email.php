<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

		$nome = $_POST['nomeduvida'];
		$email = $_POST['emailduvida'];
		$mensagem = $_POST['duvida'];

        use PHPMailer\src\PHPMailer;
		use PHPMailer\src\Exception;
		
		$mailer = new PHPMailer(true);
		
		try{
			
			$mailer->setLanguage('br');
			$mailer->CharSet = "utf8";
			$mailer->IsSMTP();
			
			$mailer->SMTPAuth = true;
			$mailer->SMTPSecure = 'tls';
			/*bota o servidor ae pls e a porta que eles usam pra enviar email*/
			$mailer->Host = "o servidor aqui";
			$mailer->Port = 587;/*Muda pra a porta certinha*/
			
			$mailer->Username = "Usuario email criaado na hospedagem";/*Usuario email criaado na hospedagem*/
			$mailer->Password = "Senha do seu email criado na hospedagem";/*Senha do seu email criado na hospedagem*/
			$mailer->Priority = 1;
			
			$mailer->setFrom("email que está enviando", "Nome para identificar");/*email que está enviando", "Nome para identificar*/
			$mailer->AddAddress("humanhelp@algumacoisa.com");/*humanhelp@algumacoisa.com, email de voces ae*/
			$mailer->IsHTML(true);
			$mailer->Subject = "Email: ".$email." - Nome: ".$nome;
			$mailer->Body = "Conteudo: ".$mensagem;
			
			$mailer->Send();
			
			echo "Mensagem enviada com sucesso
			<a href='index.html'>Início</a>
			";
			
			
		} catch(Exception $e){
		
			echo "Mensagem NÃO enviada, erro:".$e."
			<a href='index.html'>Início</a>
			";
		
		}
		
        ?>
    </body>
</html>
