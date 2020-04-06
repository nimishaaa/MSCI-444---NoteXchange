<!DOCTYPE html>
<html>
<head>
<title> Note-Taker Login/Register </title>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css
">
</head>

	<h0> <a href="index.php">Return Home</a></h0>
	<br>
	<h0> <a href="search.php">Search Postings</a></h0>
	
<br>
	
<body>
	
<div class="container">
	
	<div class="row">
	
		<div class="col-md-6">
		
		<h2> Login </h2>	
		<form action="nt_profile.php" method="post">
		
		<div class="form-group">
		
		<label>Username:</label>
		<input type="text" name="name2" placeholder="Enter Username" class="form-control" required>
	
		</div>
		<div class="form-group">

		<label>Password:</label>
		<input type="password" name="password2" placeholder="Enter Password" class="form-control" required>
		</div>
		<button type="submit" name="submit2" class="btn btn-primary">Login</button>

		</form>
		
		</div>
		
		<div class="col-md-6">
		
			
		<h2> Register here </h2>	
		<form action="nt_login_register.php" method="post">
		
		<div class="form-group">
		
		<label>Username:</label>
		<input type="text" name="name" placeholder="Enter Username" class="form-control" required>
			
		</div>
		<div class="form-group">
		
		<label>Email:</label>
		<input type="text" name="email" placeholder="Enter Email" class="form-control" required>
	
		</div>
		<div class="form-group">
		
		<label>Program:</label>
		<select class="custom-select my-1 mr-sm-2" name="program" class="form-control" required>>
		  <option value="Engineering">Engineering</option>
		  <option value="Arts">Arts</option>
		  <option value="Science">Science</option>
		  <option value="Math">Math</option>
		</select>
	
		</div>
		<div class="form-group">
		
		<label>Phone Number:</label>
		<input type="text" name="phone" placeholder="Enter Phone Number" class="form-control" required>
	
		</div>
		<div class="form-group">

		<label>Password:</label>
		<input type="password" name="password" placeholder="Enter Password" class="form-control" required>
		</div>
			
		<div class="form-group">
		<div class="form-check">
		<input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
		<label class="form-check-label" for="invalidCheck"> Agree to <a href="#" id="agree-terms">terms &amp; conditions</a></label>
		<div class="invalid-feedback">
		You must agree before submitting.
		</div>
		</div>
	  	</div>
		
		<div id="myModal" class="modal">

		<!-- Popup content -->
		<div class="modal-content">
			<span class="close">&times;</span>
			<p>All content covered in courses is the intellectual property of the instructor and/or the University of Waterloo. It is your responsibility to ask your instructor for permission before sharing course materials, and reviewing the University's guidelines surrounding students entering relationships with organizations offering access to course materials. If an Intellectual Copyright violation is observed, you will be held accountable. Please proceed at your own discretion.</p>
		</div>

		<script>
		// Get the modal
		var modal = document.getElementById("myModal");

		// Get the button that opens the modal
		var btn = document.getElementById("agree-terms");

		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close")[0];

		// When the user clicks the button, open the modal 
		btn.onclick = function() {
		  modal.style.display = "block";
		}

		// When the user clicks on <span> (x), close the modal
		span.onclick = function() {
		  modal.style.display = "none";
		}

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
		  if (event.target == modal) {
			modal.style.display = "none";
		  }
		}
		
		</script>
		</div>

		<button type="submit" class="btn btn-success">Register</button>
		
		</form>
		
		</div>

	</div>
	</div>

 <!--PHP Script to Get the MySQLi connection-->
<?php

    //Enable Error Logging:
	error_reporting(E_ALL ^ E_NOTICE);

	//MySQLi Connection via User-Defined Function
	include('./connect.php');
	$mysqli = get_mysqli_conn();

	//SQL Statement to Insert Record
	$sql = "insert into Note_Taker(nt_id, nt_name, nt_pass, nt_prog, nt_phone, nt_email) "
		  . "values (NULL, ?, ?, ?, ?, ?)";

	//Prepare Statement, Stage 1: Prepare
	$stmt = $mysqli->prepare($sql);

	//Prepare Statement, Stage 2: Bind Variable and Execute
	$name = $_POST['name'];
	$password = $_POST['password'];
	$prog = $_POST['program'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];

	//Bind Parameters and Execute Statement
	$stmt->bind_param("sssss", $name, $password, $prog, $phone, $email);
	if ($stmt->execute()){
		echo '<span style="background-color:#00FF00;text-align:center;">Registration complete, you may login now.</span>';
	}else{
		echo "Please contact database designer for any support! - fosterxhelp@uwaterloo.ca";
	}
	
	//Close connection for Insert Statement
	$stmt->close();
?>
	
</body>
</html>