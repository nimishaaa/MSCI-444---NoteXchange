<?php

	session_start();

	include('./connect.php');
	$mysqli = get_mysqli_conn();
	
 	if(isset($_POST['submit2'])) {

    $name1 = $_POST['name2'];
	$password1 = $_POST['password2'];

	$query= " SELECT * FROM Note_Taker WHERE nt_name='".$name1."' && nt_pass='".$password1."'";
            
    if ($result = $mysqli->query($query)) {
      	$row = $result->fetch_assoc();
		$_SESSION['ID'] = $row["nt_id"];
		$username = $row["nt_name"];
		$id = $row["nt_id"];
		$prog = $row["nt_prog"];
		$email = $row["nt_email"];
		$phone = $row["nt_phone"];
		
	}else{
		echo "Looks like there is a problem, please contact FOSTERX for more support - help@fosterx.com";
	}
            $result->free();
			}
?>

<!DOCTYPE html>
<html>
<head>
<title> Note-Taker Profile </title>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css
">
</head>
	<h0> <a href="index.php">Logout</a></h0>
	<br><br>
<body>
<h1>Welcome to <?php echo $username ?> 's Profile!</h1>
<h0> <a href="search_withcontact.php">Search Postings</a></h0>
<br>
<h0> <a href="submit_payment.php">Submit Payment Info</a></h0>
<br>
<h0> <a href="add_posting.php">Add a Posting</a></h0>
<br><br>
	
<div class="container">
<div class="card" style="width: 20rem;">
  <div class="card-header">
    Current Note-Taker Information
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"> Name: <b><?php echo $username ?></b></li>
    <li class="list-group-item">ID: <b><?php echo $id ?></b></li>
	<li class="list-group-item">Program: <b><?php echo $prog ?></b></li>
    <li class="list-group-item">Phone Number: <b><?php echo $phone ?></b></li>
	<li class="list-group-item">Email: <b><?php echo $email ?></b></li>
  </ul>
	</div>

	<br>
	<br>
	
<div class="col-md-6">
		
			
		<h3> Edit Profile here </h3>	
		<form action="nt_profile.php" method="post">
		
		<div class="form-group">
		
		<label>Username:</label>
		<input type="text" name="update-name" placeholder="Enter Username" class="form-control" required>
			
		</div>
		<div class="form-group">
		
		<label>Email:</label>
		<input type="text" name="update-email" placeholder="Enter Email" class="form-control" required>
	
		</div>
		<div class="form-group">
		
		<label>Program:</label>
		<select class="custom-select my-1 mr-sm-2" name="update-program" class="form-control" required>
		  <option value="Engineering">Engineering</option>
		  <option value="Arts">Arts</option>
		  <option value="Science">Science</option>
		  <option value="Math">Math</option>
		</select>
	
		</div>
		<div class="form-group">
		
		<label>Phone Number:</label>
		<input type="text" name="update-phone" placeholder="Enter Phone Number" class="form-control" required>
	
		</div>
		<div class="form-group">

		<label>Password:</label>
		<input type="password" name="update-password" placeholder="Enter Password" class="form-control" required>
		</div>

		<button type="submit3" class="btn btn-info">Update</button>
		
		</form>
		
		</div>
	</div>
	
</body>
</html>
