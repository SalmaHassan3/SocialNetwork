<?php
session_start();
$radio=$_POST['submit'];
$_SESSION['delete']=$radio;
include 'connection.php';
$conn=connect();
$email_post=$_SESSION["email"];

$_SESSION['uid']=2;////mnannnnnnnnnnnnnnnnnnn????????????????????nn

require'classes/friends.php';
$query2 = "DELETE FROM friends WHERE friend_id = '{$_SESSION['uid']}' and user_id='{$_SESSION['delete']}';";

$result2= mysqli_query( $conn,$query2);
if($result2){
	echo "deleted";
}

else{
	echo"error when delet";
}



 $conn->close();
?>

