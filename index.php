
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

  <!-- Sesssion Messege -->
  <?php if(isset($_SESSION['messege'])): ?>

  <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
    <?php 
      echo "<center><marquee><h3>".$_SESSION['messege']."</h3></marquee></center>";
      unset ($_SESSION['messege']);
    ?>
  </div>
  <?php endif; ?>


  <?php 
    include 'db_connection.php'; //creating connection with DB
    
    $show = $conn->query("SELECT * FROM info") or die ("Failed ". $conn->error);
    $show->fetch_assoc();
  ?>
<!--Result Table -->
  <div class="container bg-dark">
    <table class="table table-hover ">
  <thead>
    <tr>
      <th scope="col">Serial No</th>
      <th scope="col">Name</th>
      <th scope="col">Phone No</th>
      <th scope="col">Email</th>
      <th scope="col" colspan="2">Action</th>
    </tr>
  </thead>

<?php while ($row=$show->fetch_assoc()): ?>
  <tbody>
    <tr>
      <td><?php echo $row['id']; ?> </td>
      <td><?php echo $row['Name']; ?> </td>
      <td><?php echo $row['phone']; ?> </td>
      <td><?php echo $row['Email']; ?> </td>
      <td>
        <a href="index.php?edit=<?php echo $row['id']; ?>" class="btn btn-warning">EDIT </a>
        <a href="proccess.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">DELETE</a>
       </td>
      
    </tr>
    <?php endwhile; ?>
  </tbody>
</table>
</div>
  <!-- Form -->
	<form action="proccess.php" method="POST" class="">
    <input type="hidden" name ="id" value ="<?= $id ?>">
  	<div class="form-group container" >
  		<div class="row">
  			<div class="col-3">
  				<label for="name">Name :</label>
  			</div>
  			<div class="col-5">
  				<input class="form-control" id="name" value="<?= $name; ?>" name="naam" type="text" placeholder="Input your name">
  			</div>
  		</div>
  		<div class="row">
  			<div class="col-3">
  				<label for="Phone">Phone No :</label>
  			</div>
  			<div class="col-5">
  				<input class="form-control" id="Phone" value="<?= $phone; ?>" name="ph" type="text" placeholder="input Phone number">
  			</div>
  		</div>
  		<div class="row">
  			<div class="col-3">
    			<label for="exampleFormControlInput1">Email address :</label>
    		</div>
    	    <div class="col-5">
    			<input type="email" class="form-control" value="<?= $email; ?>" id="exampleFormControlInput1" name="email" placeholder="name@example.com">
    		</div>
    	</div>

  	</div>
  	<div style="">
  		<center>
        <?php if ($update == true): ?>
		     <button type="submit" name="update" class="btn btn-primary mb-2">UPDATE</button>
        <?php else: ?>
          <button type="submit" name="save" class="btn btn-success mb-2">SAVE</button>
        <?php endif; ?>
	    </center>
	</div>
</form>
</body>
</html>