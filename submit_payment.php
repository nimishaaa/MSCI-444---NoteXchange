<!DOCTYPE html>
<html>
<head>
<title> Note-Taker Submit Payment!</title>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css
">
</head>
	<h0> <a href="index.php">Return Home</a></h0>
	<br>
	<br>
	<h0> <a href="nt_login_register.php">Return to Login</a></h0>
	
<br><br>
	
<body>
	
<div class="container">
	
		<h2> Submit Payment Confirmation </h2>	
		<form action="submit_payment.php" method="post">
		
		<div class="form-group">
		
		<label>Posting ID:</label>
		<input type="text" name="p_id" placeholder="Enter Posting ID" class="form-control" required>
			
		</div>
		<div class="form-group">
		
		<label>Note-Taker ID:</label>
		<input type="text" name="nf_id" placeholder="Enter NT ID" class="form-control" required>
	
		</div>
		<div class="form-group">
		
		<label>Posting Price:</label>
		<input type="text" name="p_price" placeholder="Enter Amount" class="form-control" required>
	
		</div>
		<div class="form-group">
		
		<label>Purchase Price:</label>
		<input type="text" name="$pur_amount" placeholder="Enter Amount" class="form-control" required>
	
		</div>	
		<div class="form-group">
		
		<label>Purchase Date:</label>
		<input type="text" name="$pur_date" placeholder="yyyy-mm-dd" class="form-control" required>
	
		</div>

		<button type="submit" class="btn btn-warning">Submit</button>
		
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
	$sql = "INSERT INTO Note_Sold (p_id, nt_id, p_price, pur_amount, pur_date, nf_id, c_id)
SELECT c.p_id, ?, ?, ?, ?,c.nf_id, c.c_id
FROM (Select Note_Finder.nf_id,Posting.p_id, Posting.c_id
     	 From Note_Finder JOIN Posting
      				ON Posting.nf_id= Note_Finder.nf_id
     	 Where Posting.p_id = ?)as c
";

	//Prepare Statement, Stage 1: Prepare
	$stmt = $mysqli->prepare($sql);

	//Prepare Statement, Stage 2: Bind Variable and Execute
	$nt_id = $_POST['nt_id'];
	$p_id = $_POST['p_id'];
	$p_price = $_POST['p_price'];
	$pur_amount = $_POST['pur_amount'];
	$pur_date = $_POST['pur_date'];

	//Bind Parameters and Execute Statement
	$stmt->bind_param("sssss", $nt_id, $p_id, $p_price, $pur_amount, $pur_date);
	if ($stmt->execute()){
		echo '<span style="font-color:#00FF00;text-align:center;">Once submission is complete, please return to home page!</span>';
	}else{
		echo "Please contact database designer for any support! - fosterxhelp@uwaterloo.ca";
	}
	
	//Close connection for Insert Record Statement
	$stmt->close();
?>
	
</body>
</html>