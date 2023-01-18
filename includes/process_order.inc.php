<?php

ini_set('display_errors', 2);
ini_set('display_startup_errors', 2);
error_reporting(E_ALL);

if (isset($_POST['process_order'])) {

    if ($_POST['process_order'] === 'true' ) {
        
        if ($_POST['token_string']) {
            
            $json_token = $_POST['token_string'];
            
        } else {
            
            echo "No token has been generated. A Technical error occurred. Please send an email to technical@mathmonkey.joburg";

        };
        
        echo "<br>";
        echo "<br>";
        echo "<br>";
        
        echo "<p> This is an automatically generated response via an AJAX query, transmitting and receiving data to/from the Yoco Payment Gateway System API and should be understood as \"successfully connected.\" </p>";
        
        echo "<br>";
        echo "<br>";
        
        $token = json_decode($json_token);
        
        echo $token;
        
        echo "<br>";
        echo "<br>";
         
        $total = $_POST['total']*100;
        
        echo $total;
        
        echo "<br>";
        echo "<br>";

        $recipient_name = $_POST['recipient_name'];
        
        echo $recipient_name;
        
        echo "<br>";
        echo "<br>";
        
        $recipient_mobile = $_POST['recipient_mobile'];
        
        echo $recipient_mobile;
        
        echo "<br>";
        echo "<br>";
        
        $recipient_address = $_POST['recipient_address'];
        
        echo $recipient_address;
        
        echo "<br>";
        echo "<br>";

        $data = [
            'token' => $token, // Your token for this transaction here
            'amountInCents' => $total, // payment in cents amount here
            'currency' => 'ZAR' // currency here
        ];
        
        echo $data['token'];
        echo "<br>";
        echo $data['amountInCents'];
        echo "<br>";
        echo $data['currency'];
        
        echo "<br>";
        echo "<br>";
        
        // Anonymous test key. Replace with your key.
        $secret_key = 'sk_test_960bfde0VBrLlpK098e4ffeb53e1';
        
        echo $secret_key;
        
        echo "<br>";
        echo "<br>";
        
        // Initialise the curl handle
        $ch = curl_init();
        
        echo $ch;
        
        echo "<br>";
        echo "<br>";
        
        // Setup curl
        curl_setopt($ch, CURLOPT_URL,"https://online.yoco.com/v1/charges/");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        
        // Basic Authentication method
        // Specify the secret key using the CURLOPT_USERPWD option
        curl_setopt($ch, CURLOPT_USERPWD, $secret_key . ":");
        
        echo "<br>";
        echo "<br>";
        
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        
        // send to yoco
        $result = curl_exec($ch);
        // Log::debug(curl_getinfo($ch, CURLINFO_HTTP_CODE));
        
        // close the connection
        curl_close($ch);
        
        // convert response to a usable object
        $response = json_decode($result, true);
        
        // the response is returned to the AJAX function
        var_dump($response);
        
        echo "<br>";
        echo "<br>";
        
        ?>
        
            <h4> Success Message </h4>
            
                array(10) {
                <br><br>
                &nbsp;    ["source"]=> array(7) {
                &nbsp;    <br><br>
                &nbsp;  ["id"]=> string(30) "card_Pnp7zuZgEpNYKgTD6s3GPt2YJ"<br>
                &nbsp;  ["brand"]=> string(4) "visa"<br>
                &nbsp;  ["maskedCard"]=> string(19) "**** **** **** 1111"<br>
                &nbsp;  ["expiryMonth"]=> int(12)<br>
                &nbsp;  ["expiryYear"]=> int(2023)<br>
                &nbsp;  ["fingerprint"]=> string(40) "7bfa0d86c0e82b8476b1044fedc77123161e2672"<br>
                &nbsp;  ["object"]=> string(4) "card"<br>
                &nbsp;  }
                    <br><br>
                &nbsp;    ["captureState"]=> string(8) "captured"<br>
                &nbsp;    ["object"]=> string(6) "charge"<br>
                &nbsp;    ["id"]=> string(28) "ch_kzl5syO1kg1lohvmmSrEktyNL"<br>
                &nbsp;    ["status"]=> string(10) "successful"<br>
                &nbsp;    ["currency"]=> string(3) "ZAR"<br>
                &nbsp;    ["metadata"]=> NULL<br>
                &nbsp;    ["chargeId"]=> string(28) "ch_kzl5syO1kg1lohvmmSrEktyNL"<br>
                &nbsp;    ["amountInCents"]=> int(20000)<br>
                &nbsp;    ["liveMode"]=> bool(false)<br>
                }
                <br><br>
                
            <h4> Decline Message </h4>
            <br><br>
            
            {<br>
            &nbsp;  "errorType": "charge_error",<br>
            &nbsp;  "errorCode": "charge_declined",<br>
            &nbsp;  "errorMessage": "Charge declined by cardholder bank",<br>
            &nbsp;  "displayMessage": "This payment has been declined by your bank, please contact them for more information."<br>
            }
            <br><br>
            
            <h4> Error Message </h4>
            <br><br>
            
            {<br>
            &nbsp;  "errorType": "server_error",<br>
            &nbsp;  "errorCode": "server_error",<br>
            &nbsp;  "errorMessage": "Something went wrong please contact support",<br>
            &nbsp;  "displayMessage": "Payment failed, please try again later"<br>
            }
            <br><br>
            
        <?php
        
        $source_id = $response["source"]["id"];
        $source_brand = $response["source"]["brand"];
        $source_maskedCard = $response["source"]["maskedCard"];
        $source_expiryMonth = $response["source"]["expiryMonth"];
        $source_expiryYear = $response["source"]["expiryYear"];
        $source_fingerprint = $response["source"]["fingerprint"];
        $source_object = $response["source"]["object"];
        
        $captureState = $response["captureState"];
        $object = $response["object"];
        $id = $response["id"];
        $status = $response["status"];
        $currency = $response["currency"];
        $metadata = $response["metadata"];
        $chargeId = $response["chargeId"];
        $amountInCents = $response["amountInCents"];
        $liveMode = $response["liveMode"];
        
        echo $source_id;
        echo "<br>";
        echo $captureState;
        
        echo "<br>";
        echo "<br>";

        ?>
        
        <p> Prepare the script to store all the information generated above by the Yoco API in a database table </p>
        
        <p>  </p>
        
        <?php

        
        // // Database Stuff
        // include 'dbh.inc.php';
        
    }
    
}

?>