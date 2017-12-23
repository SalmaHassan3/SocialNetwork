<?php
$email=$_POST['email'];
//$password=$_POST['password'];
$password= crypt($_POST['password'],"st");


session_start();
$_SESSION["email"] = $email;

include 'connection.php';
$conn=connect();



$sql ="SELECT * FROM User WHERE email='$email'";
$result = mysqli_query( $conn,$sql);
$row =mysqli_fetch_array($result);

if(mysqli_num_rows($result)<=0)
 {
  echo "Email is incorrect!";
 }
  //else if(!password_verify($password, $row['password']))
 else if($password != $row['password'])
 {
  echo "Password is incorrect";
 }
else 
{
	header('Location: indexhome.php');
}
$conn->close();

?>