

<?php
session_start();

include 'connection.php';
$conn=connect();
$email_post=$_SESSION["email"];
$sql ="SELECT user_id FROM user WHERE email='$email_post'";
$result = mysqli_query( $conn,$sql);
$row =mysqli_fetch_array($result);
$userId=$row["user_id"];

$query1 = "UPDATE `friends` SET `relation` = '1' WHERE `friends`.`friend_id` ='$userId' and user_id='{$_SESSION['idela']}';";
$result1= mysqli_query( $conn,$query1);
if($result1){
	echo "you are friends now mbrouuk";
}

else{
	echo"eb3at tany";
}
 $conn->close();
?>
