<?php

    include 'header.php';

?>

<body style='display: flex; flex-direction: column'>
    
    <div style="position: relative; left: 10%; width: 80%">

        <h2 style='width: 95%; margin-top: 40px; margin-bottom: 30px; margin-left: auto; margin-right: auto;'> Configuring SMTP Mail Relay Library to Authenticate Emails </h2>
        
        <form id="myForm">

            <fieldset>
                
                <legend> Choose a Voice Guide: </legend>
                
                <label><input type="radio" name="radioName" value="1" /> George</label> <br />
                
                <label><input type="radio" name="radioName" value="2" /> Alice</label> <br />

            </fieldset>
            
        </form>
        
        <br>
        
        <audio controls id="george" hidden>
            <source src="audio/smtp_authentication_config_guide/george.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
        
        <audio controls id="alice" hidden>
            <source src="audio/smtp_authentication_config_guide/alice.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
        
        <!-- Write a javascript function that sets attribute hidden for one but removes this hidden attribute for the other, based on the selection of the radio inputs above -->
        
        <p> Download & Install <a target='_blank' rel='noopener noreferrer' href='https://getcomposer.org/download/'> Composer</a>. </p>
        
        <br>
        
        <p> Install PHPMailer (a Mail Library) via composer (php Package Manager) on your local machine, in the same directory as your project (which will be uploaded with the rest of your project files & subdirectories) by running the following command on your terminal, launched from your projects main directory: </p>

        <br>

        <code> composer require phpmailer/phpmailer </code>
        
        <br>
        <br>
        <br>
        
        <p> This will install the PHPMailer Library files and subdirectories under folder named "vendor" in your project directory root folder. Only once you are done writing the PHPMailer authentication script, you will upload this project, together with all installed library files and subdirectories to your hosting provider. </p> 
        
        <p> Alternatively, you could install the PHPMailer Library by doing the steps that follow - In the main directory of the project folder, create a file called <code> composer.json </code> and paste the contents from this <a target='_blank' rel='noopener noreferrer' href='https://www.mathmonkey.joburg/composer.json'>link</a> in it. Within the same folder of your project directory, create a file called <code> composer.lock </code> & paste the code in it from this <a target='_blank' rel='noopener noreferrer' href='https://www.mathmonkey.joburg/composer.lock'>link</a>. </p>
        
        <p> As a last resort, you could visit the PHPMailer github repository at <a target='_blank' rel='noopener noreferrer' href='https://github.com/PHPMailer/PHPMailer'> https://github.com/PHPMailer/PHPMailer</a> and just download the zip folder to try and follow along the same steps as described hereafter. </p>

        <p> The <code> composer.lock </code> file locks the dependencies of your project to a known state/version and is required for the project to remain stable. </p>

        <p> The file <code> composer.json </code> contains all the details about the dependencies for your projects, such as where to download it from, the author(s) of the library software, etc. </p>
        
        <br>
        <br>
        
        Once the <code>composer.json</code> & <code>composer.lock</code> files have been saved to your project directory, run the following command to install the Library: </p>
        
        <br>
        
        <code> composer update phpmailer/phpmailer </code>
        
        <br>
        <br>
        
        <p> Start a new php script, say "phpsmtpauthenticationscript.php" </p>
        
        <p> Make sure error_reporting is set to E_ALL </p>
        
        <code>
        
            error_reporting(E_ALL);
            <br>
            ini_set('display_errors', 2);
            <br>
            <br>
            ob_start();
            <br>
            require_once('vendor/autoload.php');
            <br>
            $result = ob_get_contents();
            <br>
            <br>
            echo gettype($result);
            <br>
        
        </code>
        
        <br>
        <br>
        
        <p>
            
            The above code will return the following result(s) on your screen:
            
        </p>
        
        <b> String </b>
        
        <br>
        <br>
        
        <p>
            
            If you see any errors, it is most likely a directory <a href="https://www.google.com/search?q=cul+de+sac&rlz=1C1VDKB_enZA987ZA987&oq=cul+de+sac&aqs=chrome.0.69i59j0i512l5j46i175i199i512j46i512j46i175i199i512j0i512.2055j0j7&sourceid=chrome&ie=UTF-8" target="blank_">cul de sac</a>. Repeat the Library installation process carefully.
        
        </p>
        
        <p> A common error caused by file directory cul de sac/dead-end: </p>
        
        <p> <a target='_blank' rel='noopener noreferrer' style='position: relative; left: 1.5%' href='https://www.google.com/search?q=Warning%3A+require_once(vendo%2Fautoload.php)%3A+failed+to+open+stream%3A+No+such+file+or+directory+in+%2Fhome%2Fmathmaem%2Fpublic_html%2Fsmtp_authentication_documentation.php&rlz=1C1VDKB_enZA987ZA987&oq=Warning%3A+require_once(vendo%2Fautoload.php)%3A+failed+to+open+stream%3A+No+such+file+or+directory+in+%2Fhome%2Fmathmaem%2Fpublic_html%2Fsmtp_authentication_documentation.php&aqs=chrome..69i57j69i58.18453j0j7&sourceid=chrome&ie=UTF-8'> result </a> </p>
        
        <p style='position: relative; left: 1.5%'>
            
            <b> Warning: require_once(vendor/autoload.phd): failed to open stream: No such file or directory in /home/mathmaem/public_html/smtp_authentication_documentation.php on line 60
            </b>
            
        </p>
        
        <p>
            
            <a target='_blank' rel='noopener noreferrer' style='position: relative; left: 1.5%' href='https://www.google.com/search?q=Fatal+error%3A+require_once()%3A+Failed+opening+required+%27vendor%2Fautoload.phd%27+(include_path%3D%27yourfilepath%27)&rlz=1C1VDKB_enZA987ZA987&oq=Fatal+error%3A+require_once()%3A+Failed+opening+required+%27vendor%2Fautoload.phd%27+(include_path%3D%27yourfilepath%27)&aqs=chrome.0.69i59.1113j0j7&sourceid=chrome&ie=UTF-8'> result </a>
        
        </p>
        
        <p style='position: relative; left: 1.5%'>
            
            <b>
                Fatal error: require_once(): Failed opening required 'vendor/autoload.phd' (include_path='yourfilepath')
            </b>
        
        </p>
        
        <br>
    
        <p> Make sure to call the pages from the PHPMailer Library that will be used in this project, from the folder "vendor" by running the commands below: </p>
        
        <br>
        <br>
        
        <code>
            
            use PHPMailer\PHPMailer\PHPMailer;
            <br>
            use PHPMailer\PHPMailer\Exception;
            <br>
            <br>
            require 'vendor/phpmailer/phpmailer/src/Exception.php';
            <br>
            require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
            <br>
            require 'vendor/phpmailer/phpmailer/src/SMTP.php';
        
        </code>
        
        <br>
        <br>
        
        <p> Next, run the command below in your php script </p>
        
        <br>
        <br>
        
        <code>
        
             $mail = new PHPMailer(true);
        
        </code>
        
        <br>
        <br>

    
        <p>
            We can check whether or not php has loaded the variable <code> $mail </code> into memory (subsequently all other required files and subdirectories from the file "vendor") using the following short conditional statement to check for the existence of the object by running the code below in our php script:
            
        </p>
        
        <code>
        
            if (!$mail) {
            <br>
            &nbsp; &nbsp; echo "PHPMailer.php does not exist";
            <br>
            } else if ($mail) {
            <br>
            &nbsp; &nbsp; echo "PHPMailer(true)";
            <br>
            };
        
        </code>
        
        <br>
        <br>
        
        <p> Next, copy and paste all <a href="set_email_parameters.txt" target="blank_">this</a> code to your mail authentication php script (the same file in which you pasted the above code). We will change the credentials and server settings manually. In this code, be sure to replace the variable <code> $recipient_email_address </code> to any other email address of your choice. </p>
        
        <br>
        
        Try it Yourself:
        
        <br>
        <br>
        
        <form ACTION="includes/email_demo.inc.php" METHOD="POST">
            
            <input name="email" type="text" placeholder="Your email address" required>
        
            <br>
            <br>
            
            Click the submit button below to receive a demonstration email:
            
            <br>
            <br>
            
            <input name="submit" type="submit">
            
        </form>
        
        <br>
        <br>
        
        <script src="scripts/audio_controls.js"></script>
        
    </div>
    
</body>