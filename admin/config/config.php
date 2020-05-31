<?php 
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "block_unblock_by_admin";
$conn = mysqli_connect($db_host,$db_user,$db_password,$db_name);
if($conn){
	
	//echo "Connected";

}
else{
	echo "Failed to Connect";
}

?>