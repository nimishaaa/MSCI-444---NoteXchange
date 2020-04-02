<?php
include 'connect.php';
session_start();
if (isset($_GET['Note_Finder']))
{
$note_finder = $_GET['Note_Finder'];
$get_note_finder = $mysqli->query("SELECT * FROM Note_Finder WHERE nt_id = '$note_finder'");
if ($get_note_finder->num_rows == 1)
{
    $profile_data = $get_note_finder->fetch_assoc();
           
}
       
} 
?>
<!DOCTYPE html>
<html>    
<head>        
	<meta charset="UTF-8">
	        <title><?php echo $profile_data['nf_name'] ?>'s Profile</title>
</head>
<body>
    <a href="index.html">Home</a> | <?php echo $profile_data['nf_id'] ?>'s Profile        
    <h3>Personal Information | <? php            $visitor = $_SESSION['nf_id'];
           if ($note_taker == $visitor)
{ ?>            <a href="nf_edit-profile.php?user=<?php echo $profile_data['nf_id'] ?>">Edit Profile</a>            <?php
}
        ?>        </h3>        
        <table>
                    <tr>                
						<td>Account Number:</td><td><?php echo $profile_data['nf_id']?></td> 
                    </tr>
					<tr>                
                    	<td>Name:</td><td><?php echo $profile_data['nf_name'] ?></td>   
                    </tr>       
        </table> 
    </body>
</html> 
?>