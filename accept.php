
<?php
session_start();


include 'connection.php';
$conn=connect();

$email_post=$_SESSION["email"];
$flagllrequest=0;
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

<div>
	<h3> <?php echo $user; ?> </h3>

</div>

<form action="acceptignore.php" method="post" >
 		
 <div class="form-input">
 	
 <input type="submit" name="submit"  value= <?php echo $elly3mlreq4  ?> class ="submitbutt">
</div>
 </form>
 <form action="deleterequest.php" method="post" >
 		
 <div class="form-input">
 	
 <input type="submit" name="submit"  value= <?php echo $elly3mlreq4  ?> class ="submitbutt">
 	</div>
 </form>
<?php
}
}

}
else{

	echo"error accept.php in result1";
}

}


}


else{

echo"NO requests";
}
}
else{
echo"errorin accept.php";
}

 $conn->close();
?>
