<?php
// Function to obtain mysqli connection.
function get_mysqli_conn()
{
$dbhost = 'localhost';
$dbuser = 'dcelebi';
$dbpassword = 'Winter-=@*%2020';
$dbname = 'dcelebi';
$mysqli = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);
if ($mysqli->connect_errno) 
{
echo 'Failed to connect to MySQL: (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error;
}
return $mysqli;
}
?>
