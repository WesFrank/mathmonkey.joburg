<?php

    // Error Reporting
    
    error_reporting(E_ALL);
    ini_set('display_errors', 2);

    // Fetch credentials from .env file

    require_once __DIR__ . '/../vendor/autoload.php';
    
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
    
    $dotenv->required(['DB_HOST', 'DB_USER', 'DB_PASSWORD', 'DB_NAME', 'SECRET_KEY', 'PUBLIC_KEY']);
    
    // Set database connection variables
    
    $dbServer = $_ENV["DB_HOST"];
    $dbUser = $_ENV["DB_USER"];
    $dbPassword = $_ENV["DB_PASSWORD"];
    $dbName = $_ENV["DB_NAME"];
    
    echo $dbServer;
    echo "<br>";
    echo $dbUser;
    echo "<br>";
    echo $dbPassword;
    echo "<br>";
    echo $dbName;
    
    echo "<br>";
    echo "<br>";
    
    // Create connection
    $conn = new mysqli($dbServer, $dbUser, $dbPassword, $dbName);
    
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    // sql to create table
    $sql = "CREATE TABLE Users (
        id INT(6) AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(50)
    )";
    
    if ($conn->query($sql) === TRUE) {
      echo "Table Users created successfully";
    } else {
      echo "Error creating table: " . $conn->error;
    }
    
    $conn->close();
    
    echo "<br>";
    echo "<br>";
    
    $secretKey = $_ENV["SECRET_KEY"];
    $publicKey = $_ENV["PUBLIC_KEY"];
    
    echo $secretKey;
    echo "<br>";
    echo $publicKey;
    echo "<br>";

?>