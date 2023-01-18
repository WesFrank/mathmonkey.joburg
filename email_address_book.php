<?php

    // Check whether client obtained entry to this file by submitting an html form, otherwize redirect user. This form does not have to exist, because client should not be able to access this file. This is just a security measure for no one to be able to access the file.
    
    // if (isset($_POST['submit'])) {
            
    //         // Redirect user anyway
            
    //         header("location: index.php");
    //         exit;
        
    // } else {
        
    //     header("location: index.php");
    //     exit;
        
    // }

    // Mailing List
    
    // $mail->addAddress('punishertrapswag@gmail.com');
    // $mail->addAddress('admin@mathmonkey.joburg');
    // $mail->addAddress('louiswessels0415@gmail.com');
    // $mail->addAddress('ingridw205@gmail.com');
    // $mail->addAddress('andersongarreth9@gmail.com');
    // $mail->addAddress('ramaboeamm@gmail.com');
    // $mail->addAddress('yeziskywlkr@gmail.com');
    // $mail->addAddress('scpreston8510@gmail.com');
    // $mail->addAddress('ras2rikus@gmail.com');
    // $mail->addAddress('j.nstevens90@gmail.com');
    // $mail->addAddress('mickymitchell05@gmail.com');
    // $mail->addAddress('arsalanwasim6@gmail.com');
    // $mail->addAddress('ras2rikus@hotmail.com');
    // $mail->addAddress('sufiyanmallu1@gmail.com');
    
    const email_address_book = [
        
            'Kagiso Modupe'=> 'punishertrapswag@gmail.com',
            'Louis Wessels'=> 'louiswessels@gmail.com',
            'Ingrid Wessels'=> 'ingridw205@gmail.com'
     
    ];
    
    echo email_address_book['Kagiso Modupe'];
    echo "<br>";
    echo email_address_book['Ingrid Wessels'];
    echo "<br>";
    echo email_address_book['Louis Wessels'];
    echo "<br>";

?>