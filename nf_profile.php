<?php

	include('./connect.php');
	$mysqli = get_mysqli_conn();
	
 	if(isset($_POST['submit1'])) {

    $name = $_POST['name1'];
	$password = $_POST['password1'];

	$query= " SELECT * FROM Note_Finder WHERE nf_name='".$name."' && nf_pass='".$password."'";
            
    if ($result = $mysqli->query($query)) {
      	$row = $result->fetch_assoc();
		$field1name = $row["nf_name"];
		$field2name = $row["nt_id"];
	}else{
		echo "Looks like there is a problem, please contact FOSTERX for more support - help@fosterx.com";
	}
            $result->free();
			}
?>

<!DOCTYPE html>
<html>
<head>
<title> Note-Finder Profile </title>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css
">
</head>
	<br>
	<h0> <a href="index.php">Logout</a></h0>
	<br>	
<body>
<h1>Welcome to <?php echo $field1name ?> 's Profile!</h1>
<h0> <a href="search_withcontact.php">Search Postings (With Contact Info)</a></h0>
<br>
<h0> <a href="submit_feedback.php">Submit Feedback for Note-Taker here..</a></h0>
</body>
</html>
