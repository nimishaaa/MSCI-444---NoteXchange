<?php
include 'connect.php';
session_start();
if (isset($_GET['Note_Taker']))
{
$note_taker = $_GET['Note_Taker'];
$get_note_taker = $mysqli->query("SELECT * FROM Note_Taker WHERE nt_id = '$note_taker'");
if ($get_note_taker->num_rows == 1)
{
    $profile_data = $get_note_taker->fetch_assoc();
           
}
       
} 
?>
<!DOCTYPE html>
<html>    
<head>        
	<meta charset="UTF-8">
	        <title><?php echo $profile_data['nt_name'] ?>'s Profile</title>
</head>
<body>
    <a href="index.html">Home</a> | <?php echo $profile_data['nt_id'] ?>'s Profile        
    <h3>Personal Information | <? php            $visitor = $_SESSION['nt_id'];
           if ($note_taker == $visitor)
{ ?>            <a href="nt_edit-profile.php?user=<?php echo $profile_data['nt_id'] ?>">Edit Profile</a>            <?php
}
        ?>        </h3>        
        <table>
                    <tr>                
                    	<td>Account Number:</td><td><?php echo $profile_data['nt_id']?></td>   
                    </tr>
					<tr>                
                    	<td>Name:</td><td><?php echo $profile_data['nt_name'] ?></td>   
                    </tr>
                    <tr>                
                    	<td>Program:</td><td><?php echo $profile_data['nt_program'] ?></td> 
                    </tr> 
                    <tr>
                        <td>Phone:</td><td><?php echo $profile_data['nt_phone'] ?></td>
                    </tr>
                    <tr>
                        <td>Email:</td><td><?php echo $profile_data['nt_email'] ?></td> 
                    </tr>        
        </table> 
    </body>
</html> 
?>