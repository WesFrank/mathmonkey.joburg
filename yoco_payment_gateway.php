<?php

    include 'header.php';
    
    // Error Reporting
    error_reporting(E_ALL);
    ini_set('display_errors', 2);
    
?>

<body style='display: flex; flex-direction: column'>

    <h2 style='width: 60%; margin-top: 40px; margin-bottom: 30px; margin-left: auto; margin-right: auto;'> Yoco Payment Gateway Integration </h2>
    
    <div style="position: relative; left: 10%; width: 80%">
        
        
        <p>
            
            Yoco is a Payment Gateway API, which means that Yoco's servers host a merchant account and manage the software/data/policies for processesing transactions between a client's bank and an e-commerce site. This allows clients to provide their card details to perform online transactions with extreme eaze. To integrate Yoco into your very own web application, you first need a thorough understanding of how the transaction system works.
            
        </p>
        
        <p>
            
            First up, create a <a href="https://www.yoco.com/za" target="_blank"> Yoco </a> account. Creating this account is an important step, because each Yoco account is linked to a unique set of API keys which will be used to connect your website files to the Yoco profile for credit transactions. The income can then later be transferred and managed from inside the Yoco profile user-console. This console has an extremely simple user interface (UX), perfect for small businesses. Your Yoco API keys are stored in your online Yoco business account, under the tab "Sell Online" and its subtab "Payment Gateway". You will find your API keys in this directory as illustrated in the picture below:
            
        </p>
        
        <br>
        
        </div>
        
        <image src="images/documentation/Yoco_Navigation_Bar_API_Keys.jpg" style="position: relative; left: 10%; width: 80%">  </image>
        
        <div style="position: relative; left: 10%; width: 80%">
        
        <br>
        <br>
        
        <p>
            
            Under this tab you will see that there are four API keys. Two of these keys are labelled as strings similar to "pk_test_xasge3vd492wqwPo0" (public test) & "sk_test_dfH873f052fgo18f" (secret test). These keys are for testing purposes while integrating the Yoco payment gateway into your website. The other two keys labelled as strings similar to "pk_live_asAJKlO001011HsT" (public live) & "sk_live_aUiLPGH997tSr5iL" (secret live) are used once your e-commerce site is ready to be launched. This is sensitive information and should not be revealed to anyone you do not trust.
        
        </p>
        
        <p>
            
            The documentation you are about to read, serves as supplement for Yoco's well detailed <a href="https://developer.yoco.com/" target="_blank">installation guidelines</a>. They provide the code and guidelines on how to integrate Yoco's payment gateway API into your very own online business web application, allowing you to receive and send payments to/from clients at a very low cost of less than 3% of the transaction total, which should already be incorporated together with rates & taxes/VAT/admin & delivery fees) as markup on your prices.
            
        </p>
        
        <p>
            
            From here-on out, you will be doing mostly coding, file management, reading, clicking and navigating the browser tabs, all while carefully following our detailed instructions:
        
        </p>
        
        <p>
            
            Create a php script in your project folder called "check_out.php". In this script, paste the code from <a href="yoco_payment_gateway_browser_integration_javascript_code.txt" target="_blank">this</a></a> file. After rendering this code, you should see a picture like the one below:
            
        </p>
        
        <br>
        <br>
        
        <!-- Yoco API Link -->
        
        <head>
          <script src="https://js.yoco.com/sdk/v1/yoco-sdk-web.js"></script>
        </head>
        
        <div style='width: 50%; margin-top: auto; margin-bottom: auto; margin-left: auto; margin-right: auto; border: solid lightblue 3px; border-radius: 20px;'>
        
            <!-- Form -->
            <form id="payment-form" method="POST" style='padding: 50px;'>
                
                    <input type="text" name='recipient_name' placeholder="Recipient Name" required style='width: 100%'>
                    
                    <br>
                    <br>
                    
                    <input type="tel" name='recipient_mobile' placeholder="Recipient Mobile" required style='width: 100%'>
                    
                    <br>
                    <br>
                    
                    <input type="text" name="recipient_address" placeholder="Recipient Address" required style='width: 100%'>
                
                <br>
                <br>
                <br>
                
                <div class="one-liner">
                    
                    <div id="card-frame">
                        <!-- Yoco Inline form will be added here -->
                    </div>
                    
                    <br>
                    <br>
                    
                    <?php $total = 200; ?>
                    
                    <button id="pay-button">
                      PAY ZAR <?php echo $total;?>
                    </button>
                    
                </div>
                
                <!--<p class="success-payment-message"></p>-->
              
                <input id="token" type="hidden" value="">
                
                <input type="hidden" id="total" name="total" value="<?php echo $total; ?>">
            
            </form>
        
        </div>
        
        <div id="response" style='margin-top: auto; margin-left: auto; margin-right: auto; width: 70%;'></div>
        
        <br>
        <br>

        <p>
            
            Create a folder in your project directory called "includes". Inside of this folder, create a file called "process_order.inc.php". Your file directory should thus read "includes/process_order.inc.php". Inside of this file, paste <a href="includes/process_order.inc.txt" target="_blank">this</a> code.
            
        </p>
        
        <p> It is advised that your Yoco API keys are stored within a .env (hidden environment) file. This is a security measure so that the file containing your API keys is inaccessible to public visitors but can still be passed to a php file for gaining access to API services such and other sensitive information such as your database credentials, etc. To tell the website server that php needs to interact with a .env file, we need to install the package called "phpdotenv" by running the command below in your terminal: </p>
        
        <br>
        
        <code>

            composer require vlucas/phpdotenv

        </code>
        
        <br>
        <br>
        <br>
        
        <p> This process will create a new folder called 'vendor'. If the folder 'vendor' already exists, it should automatically download and organize the data into this folder. I would advise you to download this package into your offline project folder before you integrate it into your live website code. </p>
        
        <br>
        <br>
        
        <p> The most difficult task of building the Yoco payment gateway is complete. We will now link the Yoco business account to the website, by assigning the Yoco API keys to the correct variables in your scripts. </p>
        
        
        
        <p> To process orders using the Yoco payment gateway using php, grab the item(s) details from the basket/cart stored in a database table in order to complete the payment process/transaction. </p>
        
        <p> 
            The idea is essentially that; we have to pass in the product details into our yoco API back-end. To do this, we use <a href="https://en.wikipedia.org/wiki/Ajax_(programming)" target="_blank">AJAX</a> (Asyncronous Javascript and <a href="https://en.wikipedia.org/wiki/XML" target="_blank">XML</a>).
        
        </p>
        
        <p>
            
            What AJAX will do is; it will send the front-end check-out form-data to the backend payment-processing (cURL) php-script (cURL is just a fancy acronym for a technology which is a command-line tool for getting or sending data including files using URL syntax - Uniform Resource Locator). Once submitted, the check_out.php page will wait for the AJAX response from the process_order.php script. Once the "check_out.php" has received a response from the "includes/process_order.php" page, the transaction is essentially complete.
            
        </p>
        
        <p> Keep track of orders, manage and filter details later for processing and other practical and theoretical purposes. </p>
        
    </div>
    
    <br>
    
    <div style="position: relative; left: 10%; width: 75%">
    
        <p> Assign a value to the variable $total in the php script where your payment box will appear. This variable $total is calculated as the sum of the individual ammounts of the items in the cart/basket fetched from the database table </p>
        
        $total = 200;
        
        <br>
        <br>
        
        <p> This same variable $total will be passed to the Yoco API to process payments, deduct from your clients account and credit your bank account, with the click of a button. </p>
        
        <br>
        
        <p> This same variable $total will be passed to the Yoco API to process payments, deduct from your clients account and credit your bank account, with the click of a button. </p>
    
    <div>
    
    <br>
    <br>

</body>

<footer>
    
    copyright 2022
    
</footer>

<!-- Mount SDK -->
<script>
var total = document.getElementById("total").value;
  // Replace the supplied `publicKey` with your own.
  // Ensure that in production you use a production public_key.
  var sdk = new window.YocoSDK({
    publicKey: 'pk_test_ed3c54a6gOol69qa7f45'
  });

  // Create a new dropin form instance
  var inline = sdk.inline({
    layout: 'plain',
    amountInCents: total*100,
    currency: 'ZAR'
  });
  // this ID matches the id of the element we created earlier.
  inline.mount('#card-frame');
</script>

<!-- Tokenize the Payment -->
<script>
  // Run our code when your form is submitted
  var form = document.getElementById('payment-form');
  var submitButton = document.getElementById('pay-button');
  form.addEventListener('submit', function (event) {
    event.preventDefault()
    // Disable the button to prevent multiple clicks while processing
    submitButton.disabled = true;
    // This is the inline object we created earlier with the sdk
    inline.createToken().then(function (result) {
      // Re-enable button now that request is complete
      // (i.e. on success, on error and when auth is cancelled)
      submitButton.disabled = false;
      if (result.error) {
        const errorMessage = result.error.message;
        errorMessage && alert("error occured: " + errorMessage);
      } else {
          
        // This is where you write the code to send the data to another script for processing
        
        var token = result;

        console.log(token.id);
        
        // Set value o the HTML indput 
        
        var tokenInput = document.getElementById("token");
        
        tokenInput.value = token;
        
        var token_string = JSON.stringify(token.id);
        
        $.ajax({
            
            url: 'includes/process_order.inc.php',
            method: 'post',
            data: $('form').serialize()+"&process_order=true"+"&token_string="+token_string,
            
            success: function(response) {
                
                $("#response").html(response);
                
            }
            
        })
        
      }
    }).catch(function (error) {
      // Re-enable button now that request is complete
      submitButton.disabled = false;
      alert("error occured: " + error);
    });
  });
  // Any additional form data you want to submit to your backend should be done here, or in another event listener
</script>