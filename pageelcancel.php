
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
$id1=$_SESSION['idela'];
//$id1=8;
require'classes/friends.php';
$query="SELECT*from user where user_id!='$userId'";
$result=mysqli_query($conn,$query);
if($result){

if(mysqli_num_rows($result)>0)
{

while($row=mysqli_fetch_array($result))
{

if($id1!=$userId){
$f=new friends;

$check=$f->renderfriendship($id1,$userId,'istherefriendship');
if($check==0){
	
$insert="INSERT INTO friends values ('$userId','$id1','0')";

$result2=mysqli_query($conn,$insert);
}


}
}}}
 $conn->close();

 header("location: profilelmeshfriend.php");
?>