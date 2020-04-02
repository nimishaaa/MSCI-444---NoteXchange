<?php
include 'connect.php';
session_start();
if (isset($_GET['Note_Finder']))
{
$note_finder = $_GET['Note_Finder'];
$get_note_taker = $mysqli->query("SELECT * FROM Note_Finder WHERE nf_id = '$note_finder'");
$profile_data = $get_note_taker->fetch_assoc();
    } else {
	   header("Location: index.php");
    }?>
<!DOCTYPE html>
<html>
    <head>  
	<meta charset="UTF-8">
		<title><?php echo $note_finder['nf_id'] ?>'s Profile Settings</title>
    </head> 
	<body>        <a href="index.php">Home</a> | Back to <a href="profile.php?user=<?php echo $note_finder['nf_id'] ?>"><?php echo $note_finder['nf_id'] ?></a>'s Profile         
		<h3>Update Profile Information</h3> 
		       <form method="post" action="update-profile-action.php?user=<?php echo $note_finder['nf_id'] ?>">            			
				   
			         <label>Name:</label><br> 
			         <input type="text" name="nf_name" value="<?php echo $note_finder['nf_name'] ?>" /><br> 
				   
			         <input type="submit" name="update_profile" value="Update Profile" />        
		</form>    
	</body>
</html>