
<?php
session_start();


include 'connection.php';
$conn=connect();
$email_post=$_SESSION["email"];

//$id=8;////dhellyna2es
$sql ="SELECT user_id FROM user WHERE email='$email_post'";
$result = mysqli_query( $conn,$sql);
$row =mysqli_fetch_array($result);
$userId4=$row["user_id"];

require'classes/friends.php';
/*$query="SELECT*from user";
$result=mysqli_query($conn,$query);
if($result){

if(mysqli_num_rows($result)>0)
{
	while($row=mysqli_fetch_array($result))
{
$username=$row['firstname'];
?>
<?php
}

}}*/
if($_SESSION['idela']!=$userId4){

$f=new friends;

$insert1="DELETE FROM friends WHERE (friend_id = '{$_SESSION['idela']}'&& user_id='$userId4') or (user_id = '{$_SESSION['idela']}'&& friend_id ='$userId4')";
/*$insert1="DELETE FROM friends WHERE (friend_id = '8'&& user_id='$userId4') or (user_id = '8'&& friend_id ='$userId4')";*/

$result2=mysqli_query($conn,$insert1);

}
 $conn->close();
 header("location: friendslist.php");
?>
