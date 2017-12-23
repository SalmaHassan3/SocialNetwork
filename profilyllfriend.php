<?php 
include 'nav.php';

//session_start();
$conn=connect();

$userId=$_GET['nameid'];/////mn elserachbget

$_SESSION['idela']=$userId;




$query1=("SELECT nickname FROM user WHERE user_id='$userId' and nickname!=' '");
$result1= mysqli_query( $conn,$query1);
if(mysqli_num_rows($result1)>0){
  $row1 =mysqli_fetch_array($result1);
  $user=$row1["nickname"];
}else {

  $query2=("SELECT firstname,lastname FROM user WHERE user_id='$userId'");
  $result2= mysqli_query( $conn,$query2);
  if(mysqli_num_rows($result2)>0){
    while($row2=mysqli_fetch_array($result2)){
      $userfirst=$row2["firstname"];
      $usersecond=$row2["lastname"];
      $user=$userfirst.' '.$usersecond;
    }
  }
}
$query3=("SELECT firstname,lastname FROM user WHERE user_id='$userId'");
$result3= mysqli_query( $conn,$query3);
if(mysqli_num_rows($result3)>0){
  while($row3=mysqli_fetch_array($result3)){
    $userfirst=$row3["firstname"];
    $usersecond=$row3["lastname"];

  }
}
echo $user;
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
  <form action="deletereq.php" method="post" >
  <button class="friendBtn unfriend" name="unfriend" data-uid='<?php echo "{$_SESSION['idela']}";?>' data-type="ufriend"> Unfriend</button> 

</form>



<!--////////////////////////////////////////////////-->
   <div id="all_comments">

  <div id="searchforpost">
    <?php
$conn=connect();

    $query6=("SELECT poster_name,caption,post_time,image from posts WHERE user_id='$userId' order by post_id desc");
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
 
     $conn->close();
     ?>

   </div>

 </div>

</body>
</html>