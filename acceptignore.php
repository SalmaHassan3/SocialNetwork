<?php
session_start();

include 'connection.php';
$conn=connect();
$email_post=$_SESSION["email"];
$radio=$_POST['submit'];
$_SESSION['accept']=$radio;
$sql ="SELECT user_id FROM user WHERE email='$email_post'";
$result = mysqli_query( $conn,$sql);
$row =mysqli_fetch_array($result);
$userId=$row["user_id"];

require'classes/friends.php';

$query4="SELECT user_id from Friends where friend_id='$userId'AND relation='0'";
$result4=mysqli_query($conn,$query4);
if($result4){

if(mysqli_num_rows($result4)>0)
{

while($row4=mysqli_fetch_array($result4))
{
	$elly3mlreq4=$row4["user_id"];

$query=("SELECT *from user where user_id='$elly3mlreq4'");
$result1= mysqli_query( $conn,$query);
if($result1){
	if(mysqli_num_rows($result1)>0){
while($row1=mysqli_fetch_array($result1)){
$userfirst=$row1['firstname'];
$usersecond=$row1["lastname"];
$user=$userfirst.' '.$usersecond;
?>

<?php
}

}

}
}
}

}

$query1 = "UPDATE `friends` SET `relation` = '1' WHERE `friends`.`friend_id` ='$userId' and user_id='{$_SESSION['accept']}';";
$result1= mysqli_query( $conn,$query1);
if($result1){
	echo "you are friends now mbrouuk";
}

else{
	echo"eb3at tany";
}
 $conn->close();
?>

