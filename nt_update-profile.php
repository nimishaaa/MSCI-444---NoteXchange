<?php
include 'connect.php';
session_start();
if (isset($_GET['Note_Taker']))
{
$note_taker = $_GET['Note_Taker'];
$get_note_taker = $mysqli->query("SELECT * FROM Note_Taker WHERE nt_id = '$note_taker'");
$profile_data = $get_note_taker->fetch_assoc();
    } else {
	   header("Location: index.php");
    }?>
<!DOCTYPE html>
<html>
    <head>  
	<meta charset="UTF-8">
		<title><?php echo $user_data['username'] ?>'s Profile Settings</title>
    </head> 
	<body>        <a href="index.php">Home</a> | Back to <a href="profile.php?user=<?php echo $note_taker['nt_id'] ?>"><?php echo $note_taker['nt_id'] ?></a>'s Profile         
		<h3>Update Profile Information</h3> 
		       <form method="post" action="update-profile-action.php?user=<?php echo $note_taker['nt_id'] ?>">            			
				   
			         <label>Name:</label><br> 
			         <input type="text" name="nt_name" value="<?php echo $note_taker['nt_name'] ?>" /><br> 
				   
			         <label>Program:</label><br>
			         <input type="text" name="nt_program" value="<?php echo $note_taker['nt_program'] ?>" /><br> 
				   
			         <label>Phone:</label><br> 
			         <input type="text" name="nt_phone" value="<?php echo $note_taker['nt_phone'] ?>" /><br>
				   
			         <label>Email:</label><br>          
			         <input type="text" name="nt_email" value="<?php echo $note_taker['nt_email'] ?>" /><br><br>  
				   
			         <input type="submit" name="update_profile" value="Update Profile" />        
		</form>    
	</body>
</html>