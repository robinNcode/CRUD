
<!doctype html>
<html lang="en">
  <head>
  	<title>Crud</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
</head>
 
<body>
	<?php require_once 'proccess.php'; ?>
  <?php 
    $conn = new mysqli('localhost', 'root','', 'robin')or 
              die("Connection failed: " . $conn->connect_error);

  ?>
	<form action="proccess.php" method="POST" class="">
  	<div class="form-group container" >
  		<div class="row">
  			<div class="col-3">
  				<label for="name">Name :</label>
  			</div>
  			<div class="col-5">
  				<input class="form-control" id="name" name="naam" type="text" placeholder="Input your name">
  			</div>
  		</div>
  		<div class="row">
  			<div class="col-3">
  				<label for="Phone">Phone No :</label>
  			</div>
  			<div class="col-5">
  				<input class="form-control" id="Phone" name="ph" type="text" placeholder="input Phone number">
  			</div>
  		</div>
  		<div class="row">
  			<div class="col-3">
    			<label for="exampleFormControlInput1">Email address :</label>
    		</div>
    	    <div class="col-5">
    			<input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="name@example.com">
    		</div>
    	</div>

  	</div>
  	<div style="">
  		<center>
		<button type="submit" name="save" class="btn btn-primary mb-2">Confirm</button>
	    </center>
	</div>
</form>
</body>
</html>