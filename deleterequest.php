<?php
session_start();
$radio=$_POST['submit'];
$_SESSION['delete']=$radio;
include 'connection.php';
$conn=connect();
$email_post=$_SESSION["email"];
$sql ="SELECT user_id FROM user WHERE email='$email_post'";
$result = mysqli_query( $conn,$sql);
$row =mysqli_fetch_array($result);
$userId=$row["user_id"];
require'classes/friends.php';

$query1="SELECT user_id from Friends where friend_id='$userId'AND relation='0'";
$result1=mysqli_query($conn,$query1);
if($result1){

if(mysqli_num_rows($result1)>0)
{

while($row1=mysqli_fetch_array($result1))
{
	$elly3mlreq1=$row1["user_id"];
	
}
}

}
else{

	echo "error in deleterequest";
}


$query2 = "DELETE FROM friends WHERE (friend_id = '$userId' and user_id='{$_SESSION['delete']}')  ";

$result2= mysqli_query( $conn,$query2);
if($result2){
	echo "deleted";
}

else{
	echo"error when delet";
}



 $conn->close();
?>

