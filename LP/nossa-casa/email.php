<?php 
    require("mailer/src/PHPMailer.php");
    require("mailer/src/SMTP.php");
    require("mailer/src/Exception.php");
        
    if (isset($_POST['nome']) && !empty($_POST['nome'])) {
        $nome = $_POST['nome'];
    }
    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $email = $_POST['email'];
    }
    if (isset($_POST['telefone']) && !empty($_POST['telefone'])) {
        $telefone = $_POST['telefone'];
    }
    if (isset($_POST['unidade']) && !empty($_POST['unidade'])) {
        $unidade = $_POST['unidade'];
    }
        
    $mail = new PHPMailer\PHPMailer\PHPMailer();
     
    $mail->isSMTP();
    $mail->Host = 'in-v3.mailjet.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Username = '9ce14ce59a33e2f37aed16e735b3706a';
    $mail->Password = '5c4005b9024f7d383cec33c800415ab9';
    $mail->Port = 587;
     
    $mail->setFrom('contato@nossacasaresidencial.com.br', 'Contato');
    $mail->addAddress('moema@nossacasaresidencial.com.br');
    $mail->addAddress('fabio@followupcomunicacao.com.br');
     
    $mail->isHTML(true);
     
    $mail->Subject = 'Contato Nossa Casa residencial';
    $mail->Body .= "Um novo contato de Nossa casa residencial foi recebido <br>";
    $mail->Body .= " Nome: ".$nome."
    "; // Texto da mensagem
    $mail->Body .= "<br> E-mail: ".$email."
    "; // Texto da mensagem
    $mail->Body .= "<br> Telefone: ".$telefone."
    "; // Texto da mensagem
    $mail->Body .= "<br> Unidade: ".$unidade."
    ";
     
    if(!$mail->send()) {
       echo 'Não foi possível enviar a mensagem.<br>';
       echo 'Erro: ' . $mail->ErrorInfo;
    } else {
        header('Location: conversao.html');
   }
?>