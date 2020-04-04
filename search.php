
 <!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Explore</title>
    
</head>
<body>

<h5> <a href="nf_login.html">Log in/Sign up</a> </h5>
<div class="center"> 
<form action ="" method = "post" style="color:black;font-size: 20px;">

         <label>Search</label>
        <input name="amount" type="text" size="50" placeholder="Search for eg. MSCI444"/>

        <input type="submit" value="Search"/>

</form> 
</div>
<?php
 $mysqli = new mysqli("localhost", "dcelebi", "Winter-=@*%2020", "dcelebi");
 if ($mysqli->connect_errno) {
     echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
 }
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
            echo "<b> <center> Here's the list of postings.</center> </b> <br> <br>";

            echo '<table border="0" cellspacing="2" cellpadding="2"> 
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
                        <td>'.$field1name.'</td> 
                        <td>'.$field2name.'</td> 
                        <td>'.$field3name.'</td> 
                      
                  </tr>';
                }
            
            
            $result->free();
            }
            echo "<b> <center>If you want to choose a posting and view the contact information of the Note Taker, you need to log in/ sign up with an account. </center> </b> <br> <br>";

            }
?>

<style>
    body {
			line-height: 1.7;
			font-weight: 300;
			font-size: 1.1rem;
			color: black; 
			align-items: center;
			margin: auto;
			font-family: Roboto; 


		}
label{
			text-decoration: none;
			font-size: 18px;
			color:  black;
			font-weight: 400;
			

		}
        a{
			text-decoration: none;
			font-size: 18px;
			color:  black;
			font-weight: 200;
			padding-left: 100px;

		}
		a:hover{
			text-decoration: none;
			font-size: 18px;
			color:  red;
			font-weight: 200;

		}
        input[type=text]{
			
			
            width: 830px;
            height: 30px;
            padding: 5px;
            margin-bottom: 30px;
            background: transparent;
            border: none;
            border-bottom: 1px solid grey;
            opacity: 60%;
        }
        input::placeholder{
        font-weight: 200;
        font-size: 16px;
        color: #000;
        opacity: 60%;
    }
    input[type=submit]{
        border-radius: 15px;
        border-width: 1px;
        border-color: transparent;
        width: 380px;
        height: 40px;
        color: white;
        font-family: Roboto; 
        font-weight: 400;
        font-size: 16px;
        display: block;
        background-color:#b30000;
        box-shadow: 2px 2px 2px #888888;
        text-align: center;
        margin-right: 20px;
        margin-top: 10px;
        margin-bottom: 60px;
    }
    .center{
			margin: auto;
			padding-top: 30px;
			text-align: left;
			padding-left: 300px;
			}
</style>
</body>


</html>