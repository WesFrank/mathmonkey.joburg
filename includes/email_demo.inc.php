<?php
    
    error_reporting(E_ALL);
    ini_set('display_errors', 2);

?>

<?php

    if (isset($_POST['submit'])) {
        
        if (isset($_POST['email'])) {
            
            // check if email address is valid

            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                
                // Assign this email address to the variable below for further processing
                $recipient_email_address = $_POST['email'];
              
            } else {
                
                // Redirect user 
                echo "<script> location.href='../smtp_authentication_documentation.php?email=invalid'; </script>";
                exit();
              
            }
        
        }
        
    } else {
        
        echo "<script> location.href='../smtp_authentication_documentation.php?access=denied'; </script>";
        exit();
        
    }

?>

<?php
        
    ob_start();
    require_once('../vendor/autoload.php');
    $result = ob_get_contents();
    ob_end_clean();

?>

<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require '../vendor/phpmailer/phpmailer/src/Exception.php';
    require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require '../vendor/phpmailer/phpmailer/src/SMTP.php';

?>

<?php

    $mail = new PHPMailer(true);

?>

<?php

    // Server settings
    $mail->SMTPDebug = true; // Enable Debug
    $mail->isSMTP(); // Send using SMTP
    
    // Set the SMTP Host Server to Send Emails through
    $mail->Host = '';
    
    $mail->SMTPAuth = true;
    
    $mail->Username = 'mathmonkey@mathmonkey.joburg';
    $mail->Password = '';
    
    // Enable SSL encryption
    $mail->SMTPSecure = "ssl";
    
    $mail->Port = 465;
    
    // From
    
    $mail->setFrom('admin@mathmonkey.joburg', 'Mailer');
    $mail->setFrom('mathmonkey@mathmonkey.joburg', 'Mailer');
    
    // To // Recipients
    
    $mail->addAddress($recipient_email_address);
    
    // Headers
    $headers = 'From: mathmonkey@mathmonkey.joburg' . "\r\n";
    $headers .= 'Reply-To: mathmonkey@mathmonkey.joburg' . "\r\n";
    
    // Content
    $body = ' <h3 style="color: red;"> Automail </h3>
                    
                <p> This is an automated email. The backend engineer is busy configuring
                the website email functionality. You may receive this email 
                frequently while the engineer is busy configuring the <a href="mathmonkey.joburg"> website </a> </p>
                
                <p> Feel free to contact us @ <a href="mathmonkey.joburg/contact_form.php"> mathmonkey.joburg/contact_form.php <a> </p>
            
            ';
    
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'Automail';
    $mail->Body = $body;
    
    $mail->AddAttachment('../images/logo/mathmonkey.joburg.jpg' , 'mathmonkey.joburg.jpg');
    
    $mail->send();
    
    sleep(3);
    
    echo "<script> location.href='../smtp_authentication_documentation.php?email=sent'; </script>";
    // header("location: https://www.mathmonkey.joburg/smtp_authentication_documentation.php?email=sent");

    exit();
    
?>
