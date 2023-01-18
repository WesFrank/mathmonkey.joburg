<?php

// The information in this file should be stored in a .env file

if (isset($_POST['submit'])) {
        
        // Redirect user anyway
        
        header("location: index.php");
        exit;
    
} else {
    
    header("location: index.php");
    exit;
    
}

// Public Yoco API Key's
// Live Public Key
$pk_live = pk_live_a6f71ca7WkY856L441d4;
// Test Public Key
$pk_test = pk_test_39cffbcfWkY856L3ae94;


// Private Yoco API Key's
// Live Secret Key
$sk_live = sk_live_45868de7W4kr2Y0bf30409f9e1ee;
// Test Secret Key
$sk_test = sk_test_73e180a7W4kr2Y0a16c44a68b78f;

?>