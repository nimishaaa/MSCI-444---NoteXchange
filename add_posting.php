<!DOCTYPE html>
<html>
<head>
<title> Note-Taker Add Posting!</title>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css
">
</head>
	<h0> <a href="index.php">Logout</a></h0>
	<br><br>

	<h0> <a href="index.php">Return Home</a></h0>
	<br>
	<h0> <a href="search.php">Search Postings</a></h0>
	
<br><br>
	
<body>
	
<div class="container">
		
		<h2> Add a new Posting </h2>	
		<form action="add_posting.php" method="post">
		
		<div class="form-group">
		
		<label>Note-Taker ID:</label>
		<input type="text" name="nt_id" placeholder="Enter NT Username" class="form-control" required>
			
		</div>
		<div class="form-group">
		
		<label>Professor who taught this course:</label>
		<input type="text" name="p_prof" placeholder="Enter Professor Name" class="form-control" required>
	
		</div>
		<div class="form-group">
		
		<label>Course Name:</label>
		<input type="text" name="c_name" placeholder="MSCI444.." class="form-control" required>
	
		</div>
		<div class="form-group">
		
		<label>Posting Price:</label>
		<input type="text" name="p_price" placeholder="Enter amount.." class="form-control" required>
	
		</div>
		<div class="form-group">
		
		<label>Year:</label>
		<input type="text" name="p_year" placeholder="yyyy" class="form-control" required>
	
		</div>
		<div class="form-group">
		
		<label>Date:</label>
		<input type="text" name="p_date" placeholder="yyyy-mm-dd" class="form-control" required>
	
		</div>

		<button type="submit" class="btn btn-success">POST</button>
		
		</form>
	<br>
		
		</div>

 <!--PHP Script to Get the MySQLi connection-->
<?php

    //Enable Error Logging:
	error_reporting(E_ALL ^ E_NOTICE);

	//MySQLi Connection via User-Defined Function
	include('./connect.php');
	$mysqli = get_mysqli_conn();

	//SQL Statement to Insert Record
	$sql = "INSERT INTO Posting (nt_id,p_prof, p_price, p_year,p_date, c_id) SELECT ?, ?, ?, ?, ?, c.c_id FROM (Select Course.c_id,Course.c_name From Course Where c_name = ?)as c";

	//Prepare Statement, Stage 1: Prepare
	$stmt = $mysqli->prepare($sql);

	//Prepare Statement, Stage 2: Bind Variable and Execute
	$id = $_POST['nt_id'];
	$prof = $_POST['p_prof'];
	$price = $_POST['p_price'];
	$year = $_POST['p_year'];
	$date = $_POST['p_date'];
	$c_name = $_POST['c_name'];

	//Bind Parameters and Execute Statement
	$stmt->bind_param("ssiiis", $id, $prof, $price, $year, $date, $c_name);
	if ($stmt->execute()){
		echo '<span style="font-color:#00FF00;text-align:center;">Once posted, you may check it in <a href="search_withcontact.php">Search</a></span>';
	}else{
		echo "Please contact database designer for any support! - fosterxhelp@uwaterloo.ca";
	}
	
	//Close connection for Insert Record Statement
	$stmt->close();
?>
	
</body>
</html>