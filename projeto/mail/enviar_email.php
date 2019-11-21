<?php ob_start(); ?>
<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<?php

		require_once('phpmailer/class.phpmailer.php');
		
		$nome = $_POST['name'];
		$telefone = $_POST['phone'];
		$email = $_POST['email'];
		$mensagem = $_POST['message'];
	 
		// Instancia o objeto $mail a partir da Classe PHPMailer
		$mail = new PHPMailer();

		//Recupera dados do formulário.
		$assunto = "";
		$assunto .= "<strong>Contato do site Pizzaria SI</strong><br><br>";
		$assunto .= utf8_decode("<strong>Nome:</strong> $nome<br />");
		$assunto .= utf8_decode("<strong>Email:</strong> $email<br />");
		$assunto .= utf8_decode("<strong>Telefone:</strong> $telefone<br />");
		$assunto .= utf8_decode("<p><strong>Mensagem:</strong> $mensagem</p>");

		$mail->IsHTML(true);
		//Informa que será utilizado o SMTP para envio do e-mail
		$mail->IsSMTP();
		//Informa que a conexão com o SMTP será autênticado
		$mail->SMTPAuth = true;
		// Porta para autenticação smtp;
		$mail->Port = '587';
		//Configuração de HOST do SMTP
		$mail->Host = "smtp.lucasflorence.com.br"; //Verifique qual o SMTP do seu domínio
		//Usuário para autênticação do SMTP
		$mail->Username = "noreply@lucasflorence.com.br";
		//Senha para autênticação do SMTP
		$mail->Password =   "creative120"; //Sua senha do e-mail
		//Titulo do e-mail que será enviado
		$mail->Subject  = utf8_decode("Contato pelo site Pizzaria SI.");
		
		//Preenchimento do campo FROM do e-mail
		$mail->From = $mail-> Username;
		$mail->FromName = "Pizzaria SI";
		
		//Endereço para a qual o e-mail será enviado
		$mail->AddAddress('teste@lucasflorence.com.br');
		
		//Conteúdo do e-mail
		$mail->Body = "<html>
		<head>
		   <title>Contato pelo site Pizzaria SI</title>
		</head>
		<body>
			<font face=\"Arial\" size=\"4\" color=\"#333333\"><br />
				$assunto
			</font>			
		</body>
		</html>";

		$mail->AddAttachment($arquivo_caminho, $arquivo_nome);
		$mail->AddEmbeddedImage($arquivo_caminho, $arquivo_caminho, $arquivo_nome, "Content-Transfer-Encoding: 8bits\n", "Content-Type: text/html; charset=\"ISO-8859-1\"\n\n");
		$mail->AltBody = $mail->Body;
		
		//Dispara o e-mail
		$enviado = $mail->Send();
		
		//Imprime sucesso.
		if($enviado) {
			// se enviou, da feedback para o usuario e leva para a home
			echo "<script>alert('Enviado com sucesso!');history.back();</script>";
		}
		else 
			//se der erro volta para...
			echo "<script>alert('Ops! Ocorreu um erro ao enviar.');history.back();</script>";
			//echo  header("Location: contato.php"); // se quiser redirecionar usar o header.

	?>
<?php ob_flush(); ?>