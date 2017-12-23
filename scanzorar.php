<!DOCTYPE html>
<html>
<head>
	<title>friends</title>
	<style >
		.hidden{
display: none;
		}
	</style>
</head>
<body>
	<?php
//session_start();
//include 'connection.php';
$conn=connect();
$email_post=$_SESSION["email"];

//$id=8;
$sql ="SELECT user_id FROM user WHERE email='$email_post'";
$result = mysqli_query( $conn,$sql);
$row =mysqli_fetch_array($result);
$userId11=$row["user_id"];
require'classes/friends.php';
$query="SELECT*from user where user_id='{$_SESSION['idela']}'";
$result1=mysqli_query($conn,$query);

if($result1){

if(mysqli_num_rows($result1)>0)
{

while($row1=mysqli_fetch_array($result1))
{

$username=$row1['firstname'];

}}}
?>
<div>
	<h3> <?php echo $username; ?> </h3>
<div class="actions">
<?php
if($_SESSION['idela'] !=$userId11){//msh bisaw ba3d
if(friends::renderfriendship($userId11,$_SESSION['idela'],'isthererequestpending')==1){//feh pending mwgood

?>
<form action="deletereq.php" method="post" >
<button class="request_pending" name="Request Pending" > Request Pending</button> 
</form>
<?php
}

else{


if(friends::renderfriendship($userId11,$_SESSION['idela'],'istherefriendship')==0){

?>
<form action="pageelcancel.php" method="post" >
<button class="friendBtn add"  name="Request Pending" data-uid='<?php echo "{$_SESSION['idela']}";?>' data-type="addfriend"> Add Friend</button> 

<button class="request_pending hidden" name="Request Pending" > Request Pending</button> 
</form>
<?php

}

}

}
else{
?>
<button class="friendBtn unfriend hidden" name="unfriend" data-uid='<?php echo "{$_SESSION['idela']}";?>' data-type="ufriend"> Unfriend</button> 
<button class="friendBtn add hidden" name="Add Friend" data-uid='<?php echo "{$_SESSION['idela']}";?>' data-type="addfriend"> Add Friend</button> 
<button class="request_pending hidden" name="Request Pending" > Request Pending</button> 
<?php
}
 $conn->close();
?>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.1/jquery.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
</body>

</html>