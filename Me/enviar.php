<?php

// Mudar Aqui

$email_envio = 'andressa.uiux@gmail.com'; // E-mail receptor
$email_pass = '96303022andressa'; // Senha do e-mail

$site_name = 'Contato Meu Site'; // Nome do Site
//$site_url = 'https://dragonflycorp.com.br/teste-df/dragonfly-Corp/contato.php'; // URL do Site

$host_smtp = 'andressabelem.com.br'; // HOST SMTP Ex: smtp.domain.com.br
$host_port = '587'; // Porta do Host
//Obs.: 80 ou 55 porta http
//		587 porta https 

// Variáveis do Formulário
	/* $nome desse arquivo está recebendo nome do formulário */

$nome = $_POST['name'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];

// Conteúdo do Formulário

$body_content = "De: $nome \n E-mail: $email \n Mensagem: $mensagem";

// Não mudar a partir daqui

if ($_POST['leaveblank'] != '' or $_POST['dontchange'] != 'http://') {

  echo "<h2
	style=\"
	font-size: 1em;
	margin-top: 20%;
	text-align: center;
	font-family: 'Helvetica', 'Arial', 'Sans-Serif';
	font-weight: normal;
	\"><center><span>Erro</span><p>Você pode tentar denovo ou enviar direto para " . $email_envio . "!</p></center><h2>";
	
	echo "<html style=\"background: #fff;\"></html>";
	echo "<meta HTTP-EQUIV='Refresh' CONTENT='10;URL=" . $site_url . "'>";
}

else if (isset($_POST['nome'])){

require ('./PHPMailer/PHPMailerAutoload.php');

$mail = new PHPMailer;
$mail->CharSet = 'UTF-8';

$mail->isSMTP();
$mail->Host = $host_smtp;
$mail->SMTPAuth = true;
$mail->Username = $email_envio;
$mail->Password = $email_pass;
$mail->Port = $host_port; 

$mail->From = $email_envio;

$mail->addAddress($email_envio);

$mail->FromName = 'Formulário de Contato';
$mail->AddReplyTo($_POST['email'], $_POST['nome']);

$mail->WordWrap = 70;

$mail->Subject = 'Formulário - ' . $site_name . ' - ' . $_POST['nome'];

$mail->Body = $body_content;

/*if(!$mail->send()){
	echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=" . "http://localhost/dragonfly-corp/contato.php" . "'>";
	echo "<script type='text/javascript' language='javascript'>

	window.alert('teste');

	</script>";
}*/
if(!$mail->send()) {
  
  echo "<h2
	style=\"
	font-size: 1.5em;
	margin-top: 20%;
	text-align: center;
	font-family: Inconsolata', 'Helvetica', 'Arial', 'sans-serif';
	font-weight: normal;
	\"><span>Erro</span><h2>";
	
//	echo "<html style=\"background: #fff;\"></html>";
//	echo "<meta HTTP-EQUIV='Refresh' CONTENT='10;URL=" . $site_url . "'>";
  
} else {

  echo "<h2
	style=\"
	font-size: 1.5em;
	margin-top: 20%;
	text-align: center;
	font-family: 'Raleway', 'sans-serif';
	font-weight: normal;
	\"><center><span>Enviado</span></center><h2>";
	
	echo "<html style=\"background: #fff;\"></html>";
	echo "<meta HTTP-EQUIV='Refresh' CONTENT='2;URL=" . $site_url . "'>";
}
}
?>