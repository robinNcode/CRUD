<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "robin";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

 if (isset($_POST['save'])){

 	$name = $_POST['naam'];
 	$phone = $_POST['ph'];
 	$email = $_POST['email'];

 	$conn-> query("INSERT INTO info(Name,phone,Email) VALUES('$name','$phone','$email')")or 
 			die("Connection failed: " . $conn->connect_error);

 }

 else echo "hoy nai";
 ?>