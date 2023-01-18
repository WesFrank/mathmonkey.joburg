<?php

    // Check whether client obtained entry to this file by submitting an html form, otherwize redirect user. This form does not have to exist, because client should not be able to access this file. This is just a security measure for no one to be able to access the file.
    
    if (isset($_POST['submit'])) {
            
            // Redirect user anyway
            
            header("location: index.php");
            exit;
        
    } else {
        
        header("location: index.php");
        exit;
        
    }
    
    // Define an array containing all sensitive data for the smtp client

    const credentials = [
     
        'smtp'=>[
            
            'host'=> 'voltar.aserv.co.za',
            'port'=> 465,
            'username'=> 'mathmonkey@mathmonkey.joburg',
            'password'=> '12113sAs12Ww*#',
            'SMTPSecure'=> 'ssl'
            
        ],
     
    ];