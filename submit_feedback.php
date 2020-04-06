<!DOCTYPE html>
<html>
<head>
<title> Note-Finder Submit Feedback!</title>
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
	
		<h2> Submit Feedback </h2>	
		<form action="submit_feedback.php" method="post">
		
		<div class="form-group">
		
		<label>Posting ID:</label>
		<input type="text" name="p_id" placeholder="Enter Posting ID" class="form-control" required>
			
		</div>
		<div class="form-group">
		
		<label>Note-Finder ID:</label>
		<input type="text" name="nf_id" placeholder="Enter NF ID" class="form-control" required>
	
		</div>
		<div class="form-group">
		
		<label>Feedback Description:</label>
		<input type="text" name="f_text" placeholder="Add Text" class="form-control" required>
	
		</div>
		<div class="form-group">
		
		<label>Stars:</label>
		<select class="custom-select my-1 mr-sm-2" name="f_stars" class="form-control" required>
		  <option value="1">1 STAR</option>
		  <option value="2">2 STAR</option>
		  <option value="3">3 STAR</option>
		  <option value="4">4 STAR</option>
		<option value="5">5 STAR</option>
		</select>
		</div>

		<button type="submit" class="btn btn-warning">Submit Feedback</button>
		
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
	$sql = "INSERT INTO Feedback (nf_id,p_id,f_text,f_stars, nt_id) SELECT '?', '?', '?', '?',c.nt_id FROM (Select Note_Taker.nt_id From Note_Taker JOIN Posting ON Posting.nt_id=Note_Taker.nt_id Where Posting.p_id = '?')as c";

	//Prepare Statement, Stage 1: Prepare
	$stmt = $mysqli->prepare($sql);

	//Prepare Statement, Stage 2: Bind Variable and Execute
	$nf_id = $_POST['nf_id'];
	$p_id = $_POST['p_id'];
	$f_text = $_POST['f_text'];
	$f_stars = $_POST['f_stars'];
	$nt_id = $_POST['p_id'];

	//Bind Parameters and Execute Statement
	$stmt->bind_param("sssss", $nf_id, $p_id, $f_text, $f_stars, $nt_id);
	if ($stmt->execute()){
		echo '<span style="font-color:#00FF00;text-align:center;">Once completed, you may return to home page</span>';
	}else{
		echo "Please contact database designer for any support! - fosterxhelp@uwaterloo.ca";
	}
	
	//Close connection for Insert Record Statement
	$stmt->close();
?>
	
</body>
</html>