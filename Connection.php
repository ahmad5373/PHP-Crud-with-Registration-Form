<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "first php";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn)
{

    // echo "success <br> ";
    
}
else
{
    die("Connection failed: " . $conn->connect_error);
}
?>
