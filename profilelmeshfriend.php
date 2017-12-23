<?php 
include 'nav.php';

//session_start();
$conn=connect();

$userIdm=$_SESSION['idela'];

$email_post=$_SESSION["email"];

//$id=8;
$sql ="SELECT user_id FROM user WHERE email='$email_post'";
$result = mysqli_query( $conn,$sql);
$row =mysqli_fetch_array($result);
$userId11=$row["user_id"];

$query4=("SELECT nickname FROM user WHERE user_id='$userIdm' and nickname!=' '");
$result4= mysqli_query( $conn,$query4);
if(mysqli_num_rows($result4)>0){
  $row4 =mysqli_fetch_array($result4);
  $user=$row4["nickname"];
  echo $user;
}

else {

  $query2=("SELECT firstname,lastname FROM user WHERE user_id='$userIdm'");
  $result2= mysqli_query( $conn,$query2);

  if(mysqli_num_rows($result2)>0){
    while($row2=mysqli_fetch_array($result2)){
      $userfirst=$row2["firstname"];
      $usersecond=$row2["lastname"];
      $user=$userfirst.' '.$usersecond;
      echo $user;
    }
  }
}
$query3=("SELECT firstname,lastname FROM user WHERE user_id='$userIdm'");
$result3= mysqli_query( $conn,$query3);
if(mysqli_num_rows($result3)>0){
  while($row3=mysqli_fetch_array($result3)){
    $userfirst=$row3["firstname"];
    $usersecond=$row3["lastname"];

  }
}

    $conn->close();
?>
<html>
<head>
  <title>Instant Comment</title>
  <link rel="stylesheet" type="text/css" href="css/profilePage.css"/>
  <link rel="stylesheet" type="text/css" href="css/homePage.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>

  <!--
<div class="profile">

  <img src="userprofilepicture" height="250" width="200"/>
  
</div>-->


<!--/////////////////////////////////////////////-->
  
<?php
require'classes/friends.php';
if($userIdm !=$userId11){//msh bisaw ba3d
if(friends::renderfriendship($userId11,$userIdm,'isthererequestpending')==1){//feh pending mwgood

?>
<form action="deletereq.php" method="post" >
<button class="request_pending" name="Request Pending" > request sent(cancel)</button> 
</form>
<?php
}

else if(friends::renderfriendship($userId11,$userIdm,'anaelfriendreq')==1){
?>

<form action="acceptforfriendinhisprofile.php" method="post" >
<button class="request_pending" name="accept" > Accept</button> 
</form>
<form action="deletereq.php" method="post" >
<button class="request_pending" name="delete" > Delete</button> 
</form>



<?php


}



else if(friends::renderfriendship($userId11,$userIdm,'isthererequestpending')==0){
?>

<form action="pageelcancel.php" method="post" >
<button class="friendBtn add"  name="Request Pending" data-uid='<?php echo "{$_SESSION['idela']}";?>' data-type="addfriend"> Add Friend</button> 


</form>
<?php
}


}
else{


  header("location: index.php");
}
?>




<!--////////////////////////////////////////////////-->
   <div id="all_comments">

  <div id="searchforpost">
    <?php
$conn=connect();

    $query6=("SELECT poster_name,caption,post_time,image from posts WHERE user_id='$userIdm' && ispublic='1'order by post_id desc");
    $result6= mysqli_query( $conn,$query6);
    if($result6){
      if(mysqli_num_rows($result6)>0){

        while($row6=mysqli_fetch_array($result6)){
         $name=$row6['poster_name'];
         $comment=$row6['caption'];
         $time=$row6['post_time'];
         $image=$row6['image'];
         ?>
         <p class="name"><strong>Posted By:</strong> <?php echo $name;?> <span style="float:right"><?php echo date("j-M-Y g:ia", strtotime($time)) ?></span></p>
         <p class="comments"><?php echo $comment;?></p> 
<?php
if($image!=null)
echo "<img src='". $image."' width='100' heigh='100'/>";



 ?>

         <?php
       }
     }}
     else{

echo"No Posts TO Show";

     }
     $conn->close();
     ?>

   </div>

 </div>

</body>
</html>