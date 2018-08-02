<?php
    echo 'angora si';
    //die();
    header("Content-type: application/json");
    
        // $objDatos = json_decode(file_get_contents("php://input"));
    // $name = @trim(stripslashes($objDatos->name));
    // $email = @trim(stripslashes($objDatos->email));
    // $phone = @trim(stripslashes($objDatos->phone));
    // $message = @trim(stripslashes($objDatos->msj));
    $name = $_POST['name'];
    $email = $_POST['email'];
    $empresa = $_POST['company'];
    $service =$_POST['select-service'];
    $proyect = $_POST['proyect'];
    echo $name;

require 'class.phpmailer.php';
$mail=new PHPMailer();
$mail->CharSet = 'UTF-8';

//$body = 'Correo: '.$email.' Empresa:  '.$phone.' Mensaje:  '.$message;

$body = <<<EOT
Titular: $name <br>
Empresa: $empresa <br>
Teléfono: $service <br>
Correo: $email <br>

-------------------------------------------<br>
<br>
$proyect
<br>
EOT;

$mail->IsSMTP();
$mail->Host       = 'smtp.gmail.com';

$mail->SMTPSecure = 'tls';
$mail->Port       = 587;
$mail->SMTPDebug  = 1;
$mail->SMTPAuth   = true;

$mail->Username   = 'bmarkt.studio@gmail.com';
$mail->Password   = 'bmarkt162216';

$mail->SetFrom($email, $name);
$mail->AddReplyTo('bmarkt.studio@gmail.com','no-reply');
$mail->Subject    = 'Campaña BigBang USA';
$mail->MsgHTML($body);


$mail->AddAddress('heraldflores95@gmail.com', 'Herald');
// $mail->AddAddress('marvingutierrezjr@gmail.com', 'Marvin');
// $mail->AddAddress('jenniercruz90@gmail.com', 'Jennier');
$mail->AddAddress('contacto@bigbang.studio', 'BigBang Studio');
// $mail->AddAddress('duviedh22@gmail.com', 'Jerson');
// $mail->AddAddress('bahrdiseno@gmail.com', 'Byron');

echo $body;
//die();
if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    header("Location: https://bigbang.studio/USA/gracias.html");
    die();
    echo 'Message has been sent';
}

?>
