<?php
date_default_timezone_set('America/Sao_Paulo');
#inclui a classe PHPMAILER
require("phpmailer/src/PHPMailer.php");
require("phpmailer/src/SMTP.php");
#instancia o objeto
$mail = new PHPMailer\PHPMailer\PHPMailer();
#enviar via SMTP
$mail->IsSMTP();
#seu servidor smtp / dominio no meu caso "mail" mas pode mudar verifique o seu!
$mail->Host = "smtp.gmail.com";
#habilita smtp autenticado
$mail->SMTPAuth = true;
#usuário deste servidor smtp. Aqui esta a solucao
$mail->Username = "timebeta.dsi@gmail.com";
$mail->Password = "adminbeta"; // senha
#email utilizado para o envio, pode ser o mesmo de username
$mail->From = "timebeta.dsi@gmail.com";
$mail->FromName = "Time Beta";

#Enderecos que devem receber a mensagem
$mail->AddAddress("timebeta.dsi@gmail.com", "Contato");
//$mail->AddAddress("timebeta.dsi@financeiro.com", "Financeiro");
#wrap seta o tamanhdo do texto por linha
$mail->WordWrap = 50;
#anexando arquivos no email (supondo estar no mesmo diretorio)
// $mail->AddAttachment("arquivo.zip");
// $mail->AddAttachment("foto.jpg");
$mail->IsHTML(true); //enviar em HTML

#recebendo os dados do formulario
if (isset($_POST['nome'])) {

  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $telefone = $_POST['tel'];
  $mensagem = $_POST['mensagem'];
  $data_envio = date('d/m/Y');
  $hora_envio = date('H:i:s');

  // Compo E-mail
  $arquivo = "
<style type='text/css'>
body {
margin:0px;
font-family:Verdane;
font-size:12px;
color: #666666;
}
a{
color: #666666;
text-decoration: none;
}
a:hover {
color: #FF0000;
text-decoration: none;
}
</style>
  <html>
      <table width='510' border='1' cellpadding='1' cellspacing='1' bgcolor='#CCCCCC'>
        <tr>
          <td>
            <tr>
              <td width='500'>Nome:$nome</td>
            </tr>
            <tr>
              <td width='320'>E-mail:<b>$email</b></td>
            </tr>
            <tr>
              <td width='320'>Telefone:<b>$telefone</b></td>
            </tr>
            <tr>
              <td width='320'>Mensagem:$mensagem</td>
            </tr>
          </td>
        </tr>  
        <tr>
          <td>Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b></td>
        </tr>
      </table>
  </html>
";

  $mail->AddReplyTo("$email", "$nome");
  #criando o codigo html para enviar no email, voce pode utilizar qualquer tag html
}

$mail->Subject = "Contato - Time Beta";
#adicionando o html no corpo do email
$mail->Body = $arquivo;
#enviando e retornando o status de envio
if (!$mail->Send()) {
  echo "Houve um erro ao  enviar o email! erro: $mail->ErrorInfo";
  #$mail->ErrorInfo informa onde ocorreu o erro, o uso opcional
  header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));
  exit;
}
echo "Mansagem enviada com sucesso!";
header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));
ob_end_flush();
