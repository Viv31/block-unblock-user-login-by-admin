<?php require_once("config/config.php"); ?>
<?php
$username = $_POST['username'];
$user_password = md5($_POST['user_password']);


$login_query = $conn->prepare("SELECT `username`, `user_password`, `isBlocked` FROM `userlogin` WHERE `username` = ? AND  `user_password` = ?");
$login_query->bind_param("ss",$username, $user_password);
$login_query->execute();
$login_query->bind_result($username,$user_password,$isBlocked);
$login_query->store_result();
if($login_query->num_rows > 0){

    $login_query->fetch();
    if($isBlocked!=1){
        echo "Login";

    }
    else if($isBlocked == 1){
        echo "blocked";

    }
}
else{
    echo "failed";
}





?>