<?php 
include 'nav.php';

//session_start();
$email_post=$_SESSION["email"];

$conn=connect();

$sql ="SELECT user_id FROM user WHERE email='$email_post'";
$result = mysqli_query( $conn,$sql);
$row =mysqli_fetch_array($result);
$userId111=$row["user_id"];


$query3=("SELECT firstname,lastname FROM user WHERE user_id='$userId111'");
$result3= mysqli_query( $conn,$query3);
if(mysqli_num_rows($result3)>0){
  while($row3=mysqli_fetch_array($result3)){
    $userfirst=$row3["firstname"];
    $usersecond=$row3["lastname"];
  }
}




$query4="SELECT * FROM user WHERE firstname='$userfirst' and lastname='$usersecond'";
$result4= mysqli_query( $conn,$query4);
if(mysqli_num_rows($result4)>0){

  while($row4=mysqli_fetch_array($result4)){
    $u_email=$row4["email"];
    $u_gender=$row4["gender"];
    $u_image=$row4["image"];
    $u_hometown=$row4["hometown"];
    $u_marital_status=$row4["marital_status"];
  }
}
else {
  echo'no data for user';
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>info</title>
	 <link rel="stylesheet" type="text/css" href="css/profilePage.css"/>
  <link rel="stylesheet" type="text/css" href="css/homePage.css"/>
</head>
<body>

  <div class="info">
    <p>
    
      <ul><li><?php  echo  $u_email;  ?></li></ul>
      <ul><li><?php echo  $u_gender;  ?></li></ul>
      <ul><li><?php  echo $u_hometown;  ?></li></ul>
      <ul><li><?php echo $u_marital_status;  ?></li></ul>

      <?php

      ?>
    </p>
</body>
</html>
    
  </div>


