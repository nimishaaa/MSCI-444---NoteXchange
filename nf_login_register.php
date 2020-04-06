<!DOCTYPE html>
<html>
<head>
<title> Note-Finder Login/Register </title>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css
">
</head>

	<h0> <a href="index.php">Return Home</a></h0>
	<br>
	<h0> <a href="search.php">Return to Search</a></h0>
	
<br>
	
<body>
	
<div class="container">
	
	<div class="row">
	
		<div class="col-md-6">
		
		<h2> Login </h2>	
		<form action="nf_profile.php" method="post">
		
		<div class="form-group">
		
		<label>Username:</label>
		<input type="text" name="name1" placeholder="Enter Username" class="form-control" required>
	
		</div>
		<div class="form-group">

		<label>Password:</label>
		<input type="password" name="password1" placeholder="Enter Password" class="form-control" required>
		<br>
		</div>
		<button type="submit" name="submit1" class="btn btn-primary">Login</button>

		</form>
		
		</div>
		
		<div class="col-md-6">
		
		<h2> Register here </h2>	
		<form action="nf_login_register.php" method="post">
		
		<div class="form-group">
		
		<label>Username:</label>
		<input type="text" name="name" placeholder="Enter Username" class="form-control" required>
	
		</div>
		<div class="form-group">

		<label>Password:</label>
		<input type="password" name="password" placeholder="Enter Password" class="form-control" required>
		<br>
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
			<p>All content covered in courses is the intellectual property of the instructor and/or the University of Waterloo. It is illegal to share/exchange course materials, without reviewing the University's guidelines surrounding a student’s access to course materials. If an Intellectual Copyright violation is observed, you will be held accountable. Please proceed at your own discretion.</p>
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

</body>
</html>

 <!--PHP Script to Get the MySQLi connection-->
<?php

    //Enable Error Logging:
	error_reporting(E_ALL ^ E_NOTICE);

	//MySQLi Connection via User-Defined Function
	include('./connect.php');
	$mysqli = get_mysqli_conn();

	//SQL Statement to Insert Patient Record
	$sql = "insert into Note_Finder(nf_id, nf_name, nf_pass) "
		  . "values (NULL, ?, ?)";

	//Prepare Statement, Stage 1: Prepare
	$stmt = $mysqli->prepare($sql);

	//Prepare Statement, Stage 2: Bind Variable and Execute
	$name = $_POST['name'];
	$password = $_POST['password'];

	//Bind Parameters and Execute Statement
	$stmt->bind_param("ss", $name, $password);
	if ($stmt->execute()){
		echo '<span style="background-color:#00FF00;text-align:center;">Registration complete, you may login now.</span>';
	}else{
		echo "Please contact database designer for any support! - fosterxhelp@uwaterloo.ca";
	}
	//Close connection for Insert Record Statement
	$stmt->close();
?>