<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 1/1/2018
 * Time: 3:27 PM
 */


require_once('libs/phpmailer/class.phpmailer.php');
require_once("libs/phpmailer/class.smtp.php");
require ("libs/phpmailer/PHPMailerAutoload.php");


function sendMail($name, $email, $id){

    $mailer = new PHPMailer();
    $mailer->IsSMTP();
    $mailer->SMTPSecure = 'tls';
    $mailer->Host = 'smtp.zoho.com';
    $mailer->SMPTDebug = 2;
    $mailer->Port = 587;
    $mailer->Username = "contact@logisparktech.com";
    $mailer->Password = "LogiSpark@123";
    $mailer->SMTPAuth = true;
    $mailer->From = "contact@logisparktech.com";
    $mailer->FromName = "Contact";
    $mailer->Subject = 'Activate your Off-the-Stove account';
    $mailer->isHTML(true);
    $mailer->Body="<p>Hello ".$name.",</p><p>To activate your account click <a href=\"login/validateAccount.php?id=".$id."\">here</a>. </p><p>Hope you will have a great day.</p><p>Best Regards,</p>";
    $mailer->AddReplyTo( 'contact@logisparktech.com', 'Contact' );

    $mailer->AddAddress($email,'Contact');


    $mailer->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

//    $data['full_name']=$name;
//    $data['email'] = $email;
//    $data['message'] = $message;
//    $data['phNumber'] = $phoneNo;


    if($mailer->Send()){
        $_SESSION['Feedback'] = "Your leave was sent";
    }else{
        echo "e";
        $_SESSION['Feedback'] = "Some error occured. Try again!!";
    }
}

//sendMail($_POST['name'], $_POST['email'], $_POST['message'], $_POST['phNumber']);
//http_response_code(200);



?>