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
    $mail->Host = 'smtp.robertzwirn.com.br';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = false; // Define se é utilizado SSL/TLS - Mantenha o valor "false"
    $mail->SMTPAutoTLS = false;
    $mail->Username = 'robertzwirn@robertzwirn.com.br';
    $mail->Password = 'fup@robert';
    $mail->Port = 587;
     
    $mail->setFrom('robertzwirn@robertzwirn.com.br', 'Contato');
    $mail->addAddress('robertzwirn@robertzwirn.com.br');
    $mail->addAddress('robertzwirn2@gmail.com');
    $mail->addAddress('fabio@followupcomunicacao.com.br');
    $mail->addAddress('igor@followupcomunicacao.com.br');
     
    $mail->isHTML(true);
    if($unidade == 'Momento'){
        $mail->Subject = "Contato Site Momento";
    }else if($unidade == 'Artisan'){
        $mail->Subject = "Contato Site Artisan";
    }else if($unidade == 'Todas'){
        $mail->Subject = "Contato Site Robert Zwirn"; 
    }
    else if($unidade == 'Float'){
        $mail->Subject = "Contato Site Float"; 
    }
    $mail->Body .= "Um novo contato de Robert foi recebido <br>";
    $mail->Body .= " Nome: ".$nome." "; // Texto da mensagem
    $mail->Body .= "<br> E-mail: ".$email." "; // Texto da mensagem
    $mail->Body .= "<br> Telefone: ".$telefone." "; // Texto da mensagem
    $mail->Body .= "<br> Empreendimento: ".$unidade." ";
     
    if(!$mail->send()) {
       echo 'Não foi possível enviar a mensagem.<br>';
       echo 'Erro: ' . $mail->ErrorInfo;
    } else {
        if($unidade == 'Momento'){
            header('Location: momento/conversao.html');
        }else if($unidade == 'Artisan'){
            header('Location: artisan/obrigado.html');
        }else if($unidade == 'Todas'){
            header('Location: obrigado.html');
        }
        else if($unidade == 'Float'){
            header('Location: float/conversao.html');
        }
        else if($unidade == 'Moou'){
            header('Location: moou/conversao.html');
        }
        else if($unidade == 'Nomad'){
            header('Location: nomad/conversao.html');
        }
        
   }
?>