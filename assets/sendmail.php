<?php
$email = $_POST['email'];
require_once("phpmailer/class.phpmailer.php");
require_once("phpmailer/class.smtp.php");

$mail = new PHPMailer();

$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'vamosexecutar@gmail.com';          // SMTP username
$mail->Password = 'e1n2c3k4'; // SMTP password
//$mail->SMTPSecure = 'tls'; 
$mail->SMTPSecure = 'ssl';  // SSL REQUERIDO pelo GMail            
$mail->Port = 465;   
$mail->SMTPAutoTLS = false; // Utiliza TLS Automaticamente se disponível
$mail->SMTPAuth = true; # Usar autenticação SMTP - Sim
$mail->AddAttachment("..//", "documento.pdf"); 

# Define o remetente (você)
$mail->From = "vamosexecutar@gmail.com"; # Seu e-mail
$mail->FromName = "llets Perform"; // Seu nome

# Define os destinatário(s)
$mail->AddAddress('marciosilva.mx@gmail.com', 'Fulano da Silva'); # Os campos podem ser substituidos por variáveis
#$mail->AddAddress('webmaster@nomedoseudominio.com'); # Caso queira receber uma copia
#$mail->AddCC('ciclano@site.net', 'Ciclano'); # Copia
#$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); # Cópia Oculta

# Define os dados técnicos da Mensagem
$mail->IsHTML(true); # Define que o e-mail será enviado como HTML
#$mail->CharSet = 'iso-8859-1'; # Charset da mensagem (opcional)

# Define a mensagem (Texto e Assunto)
$mail->Subject = "Mensagem Teste"; # Assunto da mensagem
$mail->Body = "Este é o corpo da mensagem de teste, em <b>HTML</b>! :)";
$mail->AltBody = "Este é o corpo da mensagem de teste, somente Texto! \r\n :)";

# Define os anexos (opcional)
#$mail->AddAttachment("c:/temp/documento.pdf", "documento.pdf"); # Insere um anexo

# Envia o e-mail
$enviado = $mail->Send();

# Limpa os destinatários e os anexos
$mail->ClearAllRecipients();
$mail->ClearAttachments();

# Exibe uma mensagem de resultado (opcional)
if ($enviado) {
 echo 1;
} else {
    echo 2;
}