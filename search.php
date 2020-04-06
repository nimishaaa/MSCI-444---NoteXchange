<!DOCTYPE html>
<html>
<head>
<title> Search Postings </title>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css
">
</head>
<body>	

	<h0> <a href="index.php">Return Home</a></h0>
	<br>
	<h0> <a href="nf_login_register.php">Login/Register</a></h0>
	<br>
	<p> Note: If you want to view the contact information of the Note Taker, you need to Login/Register. </p>

<div class="col-md-6">
<div class="center">
		
	<form class="form-inline" action="search.php" method="post">
  <div class="form-group mx-sm-3 mb-2">
    <label>Search</label>
    <input type="text" class="form-control" name="amount" placeholder="MSCI444.." required>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Search</button>
	</form>
	</div>
	</div>
	</body>
</html>

<?php
	include('./connect.php');
	$mysqli = get_mysqli_conn();
	
 if(isset($_POST['amount'])) {

    $amount = $_POST['amount'];
    
    $amount = preg_replace("#[^0-9a-z]i#","", $amount);
    
         
    $query= " SELECT c_name, p_prof, p_price, p_date, p_year, nt_name, nt_prog, nt_email, nt_phone, nf_name 
        FROM Posting p
        left join Course c
        on c.c_id = p.c_id 
        left join Note_Taker n
        on (n.nt_id = p.nt_id)
        left join Note_Finder f
        on (f.nf_id = p.nf_id) 
        WHERE c.c_name='".$amount."'";
            
	 	echo "<b>Here's the list of postings.. </b> <br> <br>";

        echo '<table border="1" cellspacing="2" cellpadding="2"> 
            
			<tr> 
                <td> <font face="Roboto">Course Name</font> </td> 
                <td> <font face="Roboto">Professor Name</font> </td>
                <td> <font face="Roboto">Price</font> </td>
                  
            </tr>';
	 
            if ($result = $mysqli->query($query)) {
        
                while ($row = $result->fetch_assoc()) {
                    $field1name = $row["c_name"];
                    $field2name = $row["p_prof"];
                    $field3name = $row["p_price"];
          
                    echo '<tr> 
                    <b>    <td>'.$field1name.'</td> </b>
                    <b>   <td>'.$field2name.'</td> </b>
                    <b>   <td>'.$field3name.'</td> 
                    </b>
                  </tr>';
                }
            
            
            $result->free();
			}
 }

?>