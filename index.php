<?php 
include 'nav.php';

//session_start();
$email_post=$_SESSION["email"];

$conn=connect();
/////////get image//////////////
$sql0 ="SELECT image FROM user WHERE email='$email_post'";
$result0 = mysqli_query( $conn,$sql0);
$row0 =mysqli_fetch_array($result0);

echo "<img src='".$row0["image"]."' width='25' heigh='15'/>";
////////////////////////

$sql ="SELECT user_id FROM user WHERE email='$email_post'";
$result = mysqli_query( $conn,$sql);
$row =mysqli_fetch_array($result);
$userId=$row["user_id"];
 
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

echo "<div id= chosen >  " . $user . "</div>";
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

$conn->close();

?>
<html>
<head>
  <title>Instant Comment</title>
  <link rel="stylesheet" type="text/css" href="css/profilePage.css"/>
  <link rel="stylesheet" type="text/css" href="css/homePage.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript">
    function post()
    {
      var comment = document.getElementById("comment").value;
         var image = document.getElementById("image").src;
      var rbutton1 = $('input[name=opt]:checked').val();
      if(comment)
      {
        $.ajax
        ({
          type: 'post',
          url: 'post_comments.php',
          data: 
          {
           user_comm:comment,
          user_image:image,
           va: rbutton1
           
         },
         success: function (response) 
         {
          document.getElementById("all_comments").innerHTML=response+document.getElementById("all_comments").innerHTML;
          document.getElementById("comment").value="";
          
        }
      });
      }
      
      return false;
    }
  </script>
</head>

<body>

<div id="editProfile" >  
      <form id="editform" action="editProfile.php" method="post" onsubmit="return validateSignupForm()">
        
        <input id="editProfileButton" type ="submit" value = "Edit Profile">
      </form>
      </div>  

  <div class="elpostelkbeer">
    <form method='post' action="" onsubmit="return post();" id="container">
     <textarea id="comment" placeholder="Write Your Comment Here....."></textarea> 
     <input type="file" name="image" id="image" accept="image/*" />
     <div>
       <input type="radio" name="opt" value="public" />public <br />  
       <input type="radio" name="opt" value="private" checked="checked" />private <br />  
     </div>
     <input type="submit" value="Post Comment" id="submit">
   </form>

   <div id="all_comments">
    <?php
    $conn=connect();  
?>
  <div id="searchforpost">
    <?php

    $query6=("SELECT poster_name,caption,post_time,image from posts WHERE user_id='$userId' order by post_id desc");
    $result6= mysqli_query( $conn,$query6);
    if($result6){
      if(mysqli_num_rows($result6)>0){
 
        while($row6=mysqli_fetch_array($result6)){
         $name=$row6['poster_name'];
         $comment=$row6['caption'];
         $time=$row6['post_time'];
         $image1=$row6['image'];

         ?>
         <form action="deletepost.php"><input type="submit" value="Delete" id="submit"></form>
         <p class="name"><strong>Posted By:</strong> <?php echo $name;?> <span style="float:right"><?php echo date("j-M-Y g:ia", strtotime($time)) ?></span></p>
         <p class="comments"><?php echo $comment;?></p> 

         <?php
         /////////get image//////////////
if($image1 != null)
echo "<img src='".$image1."' width='100' heigh='100'/>";
////////////////////////


         ?>

         <?php
       }
     }}
     $conn->close();
     ?>

   </div>

 </div>


 <div class="profile">

  <img src="userprofilepicture" height="250" width="200"/>
<form action="infoelmsh.php">
  <input type="submit" name="submit" value="Info">
</form>
  <div class="head">
    <?php echo "numoffriends";?>
  </div>

  <div class="info">
    <img src="friendspic" height="40" width="40"/>&nbsp; &nbsp;
    <img src="friendspic" height="40" width="40"/>&nbsp; &nbsp;
    <img src="friendspic" height="40" width="40"/>&nbsp; &nbsp;
    <img src="friendspic" height="40" width="40"/>&nbsp; &nbsp;
    <img src="friendspic" height="40" width="40"/>&nbsp; &nbsp;
    <img src="friendspic" height="40" width="40"/>&nbsp; &nbsp;
    <img src="friendspic" height="40" width="40"/>&nbsp; &nbsp;
    <img src="friendspic" height="40" width="40"/>&nbsp; &nbsp;
  </div>

</div>




</body>
</html>