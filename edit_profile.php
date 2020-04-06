<!DOCTYPE html>
<html>
<head>
<title> Note-Taker Login/Register </title>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css
">
</head>

	<h0> <a href="index.php">Logout</a></h0>
	<br>
	<h0> <a href="search.php">Search Postings</a></h0>
	<br>
	<h0> <a href="profile.php">Back to Profile</a></h0>
<br>
	
<body>
	
		<div class="col-md-6">
		
			
		<h2> Edit Profile here </h2>	
		<form action="edit_profile.php" method="post">
		
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
		<select class="custom-select my-1 mr-sm-2" name="update-program" class="form-control" required>>
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

		<button type="submit3" class="btn btn-success">Update</button>
		
		</form>
		
		</div>
	
<?php

	include('./connect.php');
	$mysqli = get_mysqli_conn();
	
 	if(isset($_POST['submit3'])) {

    $name = $_POST['update-name'];
	$password = $_POST['update-password'];
	$prog = $_POST['update-program'];
	$email = $_POST['update-email'];
	$phone = $_POST['update-phone'];

	$query= " UPDATE Note_Taker SET nt_name='$name', nt_prog='$prog’, nt_phone='$phone’, nt_email='$email’, nt_pass=’$password’ WHERE nt_id='$_SESSION['ID]'";
            
    if ($result = $mysqli->query($query)) {
      	$row = $result->fetch_assoc();
		echo "Update Successful! Please login <a href='nt_login_register.php'>here</a> again! !";
		
	}else{
		echo "Looks like there is a problem, please contact FOSTERX for more support - help@fosterx.com";
	}
            $result->free();
			}
?>
	
	</body>
</html>
