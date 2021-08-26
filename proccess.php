<?php

session_start();

include 'db_connection.php';

$update = false;
$id = 0;
$name = $phone = $email = '';

//Cretae part
if (isset($_POST['save'])) {

	$name = $_POST['naam'];
	$phone = $_POST['ph'];
	$email = $_POST['email'];

	$conn->query("INSERT INTO info(name, phone, email) VALUES('$name','$phone','$email')") or die("Connection failed: " . $conn->connect_error);

	$_SESSION['messege'] = "Information has been Saved!";
	$_SESSION['msg_type'] = "success";
	header("location: index.php"); //redirect to index.php

}
//Delete Part
if (isset($_GET['delete'])) {

	$id = $_GET['delete']; //getting value from index.php delete button

	$conn->query("DELETE FROM info WHERE id=$id") or die("Deletion failed: " . $conn->connect_error);

	$_SESSION['messege'] = "Information has been removed!";
	$_SESSION['msg_type'] = "danger";
	header("location: index.php"); //redirect to index.php
}

//Update Part
if (isset($_GET['edit'])) {

	$id = $_GET['edit']; //getting value from index.php edit button

	$update = true;
	$result = $conn->query("SELECT * FROM info WHERE id =$id") or die("Failed " . $conn->error);
	if (count($result)) {
		$row = $result->fetch_array(); //getting value from DB for index.php form values
		$name = $row['name'];
		$phone = $row['phone'];
		$email = $row['email'];
	}
}

if (isset($_POST['update'])) {

	$id = $_POST['id']; //getting value from index.php , hidden input field
	$name = $_POST['naam'];
	$phone = $_POST['ph'];
	$email = $_POST['email'];

	$conn->query("UPDATE info SET Name='$name',Phone='$phone',Email='$email' WHERE id=$id") or die("Connection failed: " . $conn->connect_error);

	$_SESSION['messege'] = "Information has been Updated!";
	$_SESSION['msg_type'] = "info";
	header("location: index.php"); //redirect to index.php

}


?>