
<?php
 
require_once('../PHPMailerAutoload.php');
 
$correo = new PHPMailer();
 
$correo->IsSMTP();
 
$correo->SMTPAuth = true;
 
$correo->SMTPSecure = 'tls';
 
$correo->Host = "smtp.gmail.com";
 
$correo->Port = 587;
 
$correo->Username   = "facoovalle@gmail.com";
 
$correo->Password   = "misisipi.62522";
 
$correo->SetFrom("facoovalle@gmail.com", "Mi Codigo PHP");
 
$correo->AddReplyTo("facoovalle@gmail.com","Mi Codigo PHP");
 
$correo->AddAddress("facoovalle@hotmail.es", "Jorge");
 
$correo->Subject = "Mi primero correo con PHPMailer";
 
$correo->MsgHTML("Mi Mensaje en <strong>HTML</strong>");

 //$correo->AddAttachment("images/phpmailer.gif");
 
if(!$correo->Send()) {
  echo "Hubo un error: " . $correo->ErrorInfo;
} else {
  echo "Mensaje enviado con exito.";
}
 
?>