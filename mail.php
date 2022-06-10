<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


use Rakit\Validation\Validator;

$validator = new Validator;
if ($_GET['api']==true){
    $_POST = json_decode(file_get_contents('php://input'), true);
}

$validation = $validator->make($_POST + $_FILES, [
    'host'            => 'required',
    'port'            => 'required|numeric',
    'username'            => 'required',
    'password'            => 'nullable',
    'from'                 => 'required|email',
    'to'                 => 'required|email',
    'name'                 => 'nullable',
    'subject'                 => 'required',
    'body'                 => 'required',
    'auth'                 => 'nullable|boolean',
    'encryption'                 => 'nullable'
]);
$validation->validate();

if ($validation->fails()) {
    header("Content-Type: application/json");
    $errors = $validation->errors();
    echo json_encode(["message"=>$errors->firstOfAll(), "success"=>false]);
    exit;
} else {
    $validation = (object) $validation->getValidatedData();

    $mail = new PHPMailer(true);
    try {
        $mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER                 
        $mail->isSMTP();
        $mail->CharSet = 'UTF-8';                           
        $mail->Host       = $validation->host ?? $_ENV['MAIL_HOST'];
        $mail->SMTPAuth   = (boolean) $validation->auth ?? true;
        $mail->Username   = $validation->username ?? $_ENV['MAIL_USERNAME'];
        $mail->Password   = $validation->password ?? $_ENV['MAIL_PASSWORD'];
        $mail->SMTPSecure = $validation->encryption ?? PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = (int) $validation->port ?? $_ENV['MAIL_PORT'];

        $from = $validation->from ?? $_ENV['MAIL_FROM_ADDRESS'];
        $name = $validation->name ?? $_ENV['MAIL_FROM_NAME'];
        $mail->setFrom($from, $name);
        $mail->addAddress($validation->to);
        

        //Content
        $mail->isHTML(true);
        $mail->Subject = $validation->subject;
        $mail->Body    = $validation->body;
        
        
        $mail->send();
        header("Content-Type: application/json");
        echo json_encode(["message"=>"Envioo realizado com sucesso", "success"=>true]);
        exit();
    } catch (Exception $e) {
        header("Content-Type: application/json");
        echo json_encode(["message"=>"Message could not be sent. Mailer Error: {$mail->ErrorInfo}", "main"=>$mail, "success"=>false]);
        exit();
    }

}