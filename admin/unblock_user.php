<?php require_once("config/config.php"); ?>
<?php 

 $_POST['val'];
 $_POST['user_id'];

 $change_status_query = mysqli_query($conn,"UPDATE `userlogin` SET `isBlocked`= '".$_POST['val']."' WHERE `id`= '".$_POST['user_id']."' ");
 if($change_status_query){
 	echo "Unblock";

 }
 
?>