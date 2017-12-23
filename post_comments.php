<?php
include 'connection.php';
session_start();
$conn=connect();
$checkbox1=$_POST['va'];
$image=$_POST['user_image'];
$query1="SELECT user_id FROM user WHERE email= '{$_SESSION["email"] }'";
$result1 = mysqli_query( $conn,$query1);
if($result1){
  while($row1=mysqli_fetch_array($result1)){
   $userId=$row1["user_id"];
 }
  }

else{
  echo"please check mail no email!!!!";
}


      $query1=("SELECT nickname FROM user WHERE user_id='$userId' and nickname!=' '");
$result1= mysqli_query( $conn,$query1);
if(mysqli_num_rows($result1)>0){
  $row1 =mysqli_fetch_array($result1);
  $user=$row1["nickname"];
}

else {



$query2="SELECT firstname,lastname FROM user WHERE user_id='$userId'";
$result2 = mysqli_query( $conn,$query2);
if($result2){
while($row2=mysqli_fetch_array($result2)){
$userfirst=$row2["firstname"];
$usersecond=$row2["lastname"];
$user=$userfirst.' '.$usersecond;
}
}
}
$name=$user;

if(isset($_POST['user_comm'])&&isset($name))
{

  if($checkbox1=="public"){
  $comment=$_POST['user_comm'];
  $insert="insert into posts (user_id,caption,ispublic,poster_name,image) values($userId,'{$_POST['user_comm']}','1','$name','$image');";
  $result3 = mysqli_query( $conn,$insert);
}


  else if($checkbox1=="private"){
 $insert="insert into posts (user_id,caption,ispublic,poster_name,image) values($userId,'{$_POST['user_comm']}','0','$name','$image');";
 $result3 = mysqli_query( $conn,$insert);
  }


  else{
$insert="insert into posts (user_id,caption,ispublic,poster_name,image) values($userId,'{$_POST['user_comm']}','1','$name','$image');";
 $result3 = mysqli_query( $conn,$insert);

}
 
  }
  else{

    echo"error";
  }

  $select="select poster_name,caption,post_time,image from posts where poster_name='$name' and caption='{$_POST['user_comm']}';";

   $result4 = mysqli_query( $conn,$select);
if($result4){
  if($row3=mysqli_fetch_array($result4))
  {
    $name=$row3['poster_name'];
    $comment=$row3['caption'];
      $time=$row3['post_time'];
      $image2=$row3['image'];

  ?>
<div class="comment_div"> 
 <p class="name"><strong>Posted By:</strong> <?php echo $name;?> <span style="float:right"><?php echo date("j/m/Y g:ia", strtotime($time)) ?></span></p>
 <p class="comments"><?php echo $comment;?></p> 
 
 <?php
if($image2!=null)
echo "<img src='". $image2."' width='100' heigh='100'/>";



 ?>


</div>
  <?php

  }}
  else{

    echo"eror";
  }
$conn->close();
exit;


?>