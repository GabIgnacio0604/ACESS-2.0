<?php
$servername = "localhost";
$username = "u465284186_ACESS_USER";      
$password = "Acess12345";  
$dbname = "u465284186_ACESS_DB";        

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>