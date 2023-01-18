<?php

  include 'header.php';

?>

<html lang="en">
  <body>
  <!-- partial:index.partial.html -->
  <!DOCTYPE html>

    <head>
        
        <title>Math Monkey Website Launch Countdown Page</title>
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

    </head>

    <body>
        
        <div class="big-div">

            <br>
            
            <h4> Math Monkey Website Launch Countdown </h4>
            <br>
            
            <p> This website is in the process of being constructed and will be launched on January 1<superscript>st</superscript> 2023. The time remaining before the website will be made live for public, is indicated in the countdown timer below: </p>
            
            <br>
            <br>
          
            <div class="wrapper">
        
                <span class="container"> Days: &nbsp; <span id="d"> 00 </span> dd </span>
                
                <br>
        
                <span class="container"> Hours: &nbsp; <span id="h"> 00 </span> hh </span>
                
                <br>
        
                <span class="container"> Minutes: &nbsp; <span id="m">00</span> mm </span>
                
                <br>
                
                <span class="container"> Seconds: &nbsp; <span id="s">00</span> ss </span>
                
            </div>
        
        </div>
        
        <!-- Javascript Link -->
        <script  src="scripts/countdown_timer.js"></script>
        
    </body>

</html>