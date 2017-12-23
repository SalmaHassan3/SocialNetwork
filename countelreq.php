<?php 
//include 'nav.php';

session_start();
$conn=connect();


$email_post=$_SESSION["email"];

//$id=8;
$sql ="SELECT user_id FROM user WHERE email='$email_post'";
$result = mysqli_query( $conn,$sql);
$row =mysqli_fetch_array($result);
$userId12=$row["user_id"];



$query1="SELECT friend_id from Friends where((friend_id='$userId12'))AND (relation='0')";
$friend1=mysqli_query($conn,$query1);
if($friend1){

  $row_cnt = $friend1->num_rows;
  echo' '.$row_cnt;
  //echo"<a href='accept.php'>$row_cnt</a>";
	}


	else{
		echo' '.$row_cnt;
		 // echo"<a href='accept.php'>0</a>";
	}
$_SESSION['count']=$row_cnt;
$conn->close();