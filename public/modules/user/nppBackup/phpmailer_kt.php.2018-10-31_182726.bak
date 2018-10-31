<?php
require 'vendor/autoload.php';


        function sendemail($email, $subject, $mailmessage) {

            $mail = new PHPMailer;                              // Passing `true` enables exceptions
            try {
                //server settings
                $mail->SMTPDebug = 2;                                
                $mail->isSMTP();                                      
                $mail->Host = 'smtp.gmail.com';    
                $mail->SMTPAuth = true;                            
                 
                $mail->Username = 'test@mail.com';
                $mail->Password = 'password';
                $mail->SMTPSecure = 'tls';                             
                $mail->Port = 587;   
                $addr = explode(', ', $email);
            
        
                for ($i = 0; $i< count($addr); $i++) {    
                    
                  // $link=rootlink."public/unsubscribe.php?id={$id}&subscribe={$subscribe} ";
                    $mail->isHTML(true); 
                    $mail->Subject = $subject;
                    $mail->Body = $mailmessage ;
                    $mail->AltBody = "This is the plain text version of the email content";
                    $mail->setFrom('kerenteo@gmail.com', 'Admin');
                    $mail->addAddress($addr[0]);   
                }
        
                $mail->send();
                echo 'Message has been sent successfully to'.$email;
            } catch (Exception $e) {
                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            }
        }
     
    
        $email = "test1@mail.com, test2@mail.com";
        $subject = "hello";
        $mailmessage = "testing";
        sendemail($email, $subject, $mailmessage);
    
