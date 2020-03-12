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

session_start();
    $update = false;
    $id = 0;
    $name = '';
 	$phone = '';
 	$email = '';
 if (isset($_POST['save'])){

 	$name = $_POST['naam'];
 	$phone = $_POST['ph'];
 	$email = $_POST['email'];

 	$conn-> query("INSERT INTO info(Name,phone,Email) VALUES('$name','$phone','$email')")or die("Connection failed: " . $conn->connect_error);

 	$_SESSION ['messege'] = "Information has been Saved!";
 	$_SESSION ['msg_type'] = "success";
 	header("location: index.php");

 }

 if (isset($_GET['delete'])){

 	$id = $_GET['delete'];
 	
 	$conn->query("DELETE FROM info WHERE id=$id")or die("Deletion failed: " .$conn->connect_error);

 	$_SESSION ['messege'] = "Information has been removed!";
 	$_SESSION ['msg_type'] = "danger";
 	header("location: index.php");
 }

 if (isset($_GET['edit'])){
 	$id =$_GET['edit'];
 	$update = true;
 	$result = $conn->query("SELECT * FROM info WHERE id =$id") or die ("Failed ". $conn->error);
 	if(count($result==true)){
 		$row=$result->fetch_array();
 		 	$name = $row['Name'];
 			$phone = $row['Phone'];
 			$email = $row['Email'];
 	}
 }

if (isset($_POST['update'])){

    $id=$_POST['id'];
 	$name = $_POST['naam'];
 	$phone = $_POST['ph'];
 	$email = $_POST['email'];

 	$conn-> query("UPDATE info SET Name='$name',Phone='$phone',Email='$email' WHERE id=$id")or die("Connection failed: " . $conn->connect_error);

 	$_SESSION ['messege'] = "Information has been Updated!";
 	$_SESSION ['msg_type'] = "info";
 	header("location: index.php");

 }



 ?>