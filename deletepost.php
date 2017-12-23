<?php
include'connection.php';
session_start();
    $email_post=$_SESSION["email"];

$conn=connect();
$query ="SELECT user_id FROM user WHERE email='$email_post'";
$result = mysqli_query($conn,$query);
$row =mysqli_fetch_array($result);
$udd=$row["user_id"];

 $query6=("SELECT post_time from posts WHERE user_id='$udd'");
    $result6= mysqli_query( $conn,$query6);
    if($result6){
      if(mysqli_num_rows($result6)>0){

        while($row6=mysqli_fetch_array($result6)){
         $time=$row6['post_time'];}}}


$query2 = "DELETE FROM posts WHERE (user_id= '$udd' and post_time='$time')  ";

$result2= mysqli_query( $conn,$query2);
if($result2){
	header("location: index.php");
}

else{
	echo"error when delet";
}



 $conn->close();