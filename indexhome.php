<?php 
include 'nav.php';
 ?>
<?php 
//session_start();
$email_post=$_SESSION["email"];

//include 'connection.php';
$conn=connect();
/////////get image//////////////
$sql2 ="SELECT image FROM user WHERE email='$email_post'";
$result2 = mysqli_query( $conn,$sql2);
$row2 =mysqli_fetch_array($result2);

echo "<img src='".$row2["image"]."' width='75' height='75' id='image'/>";
////////////////////////

$sql ="SELECT user_id FROM user WHERE email='$email_post'";
$result = mysqli_query($conn,$sql);
$row =mysqli_fetch_array($result);
$userIdd=$row["user_id"];
 
 
$query1=("SELECT nickname FROM user WHERE user_id='$userIdd' && nickname!=' '");
$result1= mysqli_query( $conn,$query1);
if(mysqli_num_rows($result1)>0){
$row1 =mysqli_fetch_array($result1);
$user=$row1["nickname"];}
else {
$query1=("SELECT firstname,lastname FROM user WHERE user_id='$userIdd'");
$result1= mysqli_query( $conn,$query1);
if(mysqli_num_rows($result1)>0){
while($row1=mysqli_fetch_array($result1)){
$userfirst=$row1["firstname"];
$usersecond=$row1["lastname"];
$user=$userfirst.' '.$usersecond;
}
}
}

$query2=("SELECT firstname,lastname FROM user WHERE user_id='$userIdd'");
$result2= mysqli_query( $conn,$query2);
if(mysqli_num_rows($result2)>0){

while($row2=mysqli_fetch_array($result2)){

$userfirst=$row2["firstname"];
$usersecond=$row2["lastname"];
}
}

echo "<div id= chosen >  " . $user . "</div>";
  $conn->close();
 ?>
<html>
<head>

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
  document.getElementById("image").style.display = "none";
  
      }
    });
  }
  
  return false;
}
</script>
</head>

<body>
<link rel="stylesheet" type="text/css" href="css/home.css" />
<div class=elpostelkbeer>
<div id=post>
  <form method='post' action="" onsubmit="return post();" id="container">
   <!-- <input type="text" id="username" placeholder="Your Name" autocomplete="off">-->
    <textarea id="comment" placeholder="WHAT IS ON YOUR MIND?"></textarea> <br/><br/>
    <!-- <div> -->

   <input type="file" name="image" id="image" accept="image/*" />
   <input type="radio" name="opt" value="public" />public
      <input type="radio" name="opt" value="private" checked="checked" />private <br/><br/>
 <!--   </div> -->
    <input type="submit" value="POST" id="submit">
  </form>

  </div>

  <div id="all_comments">
  <?php
  $conn=connect();
  
/////////////////////////////////////////////////////////////////
/*$query11=(select * from posts where ispublic='1' union all
 select * from posts where ispublic='0'
  and user_id value in() select user_id from friend where friend_id='$userIdd' union all select friend_id from friend where user_id='$userIdd' ))

order by post_id desc;)
*/

 /*$query15="SELECT friend_id from Friends where (user_id='$userIdd'AND relation='1') ";
$friend4=mysqli_query($conn,$query15);
if($friend4){

if(mysqli_num_rows($friend4)>0){
while($row4=mysqli_fetch_array($friend4)){
//$row=mysqli_fetch_array($friend);
$friendId4=$row4["friend_id"];

 $query18="SELECT user_id from Friends where (friend_id='$userIdd'AND relation='1') ";
$friend41=mysqli_query($conn,$query18);
if($friend41){

if(mysqli_num_rows($friend41)>0){
while($row4=mysqli_fetch_array($friend41)){
//$row=mysqli_fetch_array($friend);
$friendId41=$row4["user_id"];
 $query11=("SELECT  post_id from posts WHERE user_id='$friendId41'or user_id='$friendId4' or user_id='$userIdd' or ispublic='1' ");
    $result11= mysqli_query( $conn,$query11);
    if($result11){
      if(mysqli_num_rows($result11)>0){

        while($row11=mysqli_fetch_array($result11)){
         $postid=$row11['post_id'];


$sql =  "UPDATE posts set friend='1' WHERE post_id= '$postid'";
    mysqli_query($conn,$sql);

 $query11=("SELECT  poster_name,caption,post_time,image from posts WHERE friend='1' order by post_id desc");
    $result11= mysqli_query( $conn,$query11);
    if($result11){
      if(mysqli_num_rows($result11)>0){

        while($row11=mysqli_fetch_array($result11)){
         $name=$row11['poster_name'];
         $comment=$row11['caption'];
         $time=$row11['post_time'];
         $image=$row11['image'];
         ?>
        
         <p class="name"><strong>Posted By:</strong> <?php echo $name;?> <span style="float:right"><?php echo date("j-M-Y g:ia", strtotime($time)) ?></span></p>
         <p class="comments"><?php echo $comment;?></p> 
         <?php
         if($image !=null)
         echo "<img src='".$image."' width='100' heigh='100'/>";
?>
         <?php
       }
     }}

$sql =  "UPDATE posts set friend='0'' WHERE post_id= '$postid'";
    mysqli_query($conn,$sql);







}}
}}}}}}}*/






















////////////////////////////////////////////////////////////dekedabto3yyyyyyyy ana

   $query11=("SELECT  poster_name,caption,post_time,image from posts WHERE user_id='$userIdd'or ispublic='1' order by post_id desc");
    $result11= mysqli_query( $conn,$query11);
    if($result11){
      if(mysqli_num_rows($result11)>0){

        while($row11=mysqli_fetch_array($result11)){
         $name=$row11['poster_name'];
         $comment=$row11['caption'];
         $time=$row11['post_time'];
         $image=$row11['image'];
         ?>
        
         <p class="name"><strong>Posted By:</strong> <?php echo $name;?> <span style="float:right"><?php echo date("j-M-Y g:ia", strtotime($time)) ?></span></p>
         <p class="comments"><?php echo $comment;?></p> 
         <?php
         if($image !=null)
         echo "<img src='".$image."' width='100' heigh='100'/>";
?>
         <?php
       }
     }}


     /////////////////////////////bto3 elfriends private and public dlweaty ana hadeer wel friend aras hagib bto3 aras bs ana el f5anet el user tb mmkn akon f5anet el friend 

     $query15="SELECT friend_id from Friends where (user_id='$userIdd'AND relation='1') ";
$friend4=mysqli_query($conn,$query15);
if($friend4){

if(mysqli_num_rows($friend4)>0){
while($row4=mysqli_fetch_array($friend4)){
//$row=mysqli_fetch_array($friend);
$friendId4=$row4["friend_id"];

$query11=("SELECT  poster_name,caption,post_time,image from posts WHERE(user_id='$friendId4' and ispublic='0') order by post_id desc");
    $result11= mysqli_query( $conn,$query11);
    if($result11){
      if(mysqli_num_rows($result11)>0){

        while($row11=mysqli_fetch_array($result11)){
         $name=$row11['poster_name'];
         $comment=$row11['caption'];
         $time=$row11['post_time'];
         $image=$row11['image'];
         ?>
      
         <p class="name"><strong>Posted By:</strong> <?php echo $name;?> <span style="float:right"><?php echo date("j-M-Y g:ia", strtotime($time)) ?></span></p>
         <p class="comments"><?php echo $comment;?></p> 
         <?php
          if($image !=null)
echo "<img src='".$image."' width='100' heigh='100'/>";

         ?>

         <?php
       }
     }}}}}
/////////////////////////////////////////////////////lw ana baa elf5anet elfriend
 $query18="SELECT user_id from Friends where (friend_id='$userIdd'AND relation='1') ";
$friend41=mysqli_query($conn,$query18);
if($friend41){

if(mysqli_num_rows($friend41)>0){
while($row4=mysqli_fetch_array($friend41)){
//$row=mysqli_fetch_array($friend);
$friendId41=$row4["user_id"];
echo$friendId41;
$query11=("SELECT poster_name,caption,post_time,image from posts WHERE(user_id='$friendId41'and  ispublic='0') order by post_id desc");
    $result11= mysqli_query( $conn,$query11);
    if($result11){
      if(mysqli_num_rows($result11)>0){

        while($row11=mysqli_fetch_array($result11)){
         $name=$row11['poster_name'];
         $comment=$row11['caption'];
         $time=$row11['post_time'];
         $image=$row11['image'];
         ?>
        
         <p class="name"><strong>Posted By:</strong> <?php echo $name;?> <span style="float:right"><?php echo date("j-M-Y g:ia", strtotime($time)) ?></span></p>
         <p class="comments"><?php echo $comment;?></p> 

 <?php
  if($image !=null)
echo "<img src='".$image."' width='100' heigh='100'/>";

         ?>



         <?php
       }
     }}

}}}/////////////hna elcomment*/
  /////////////////////////////////////////////////
/* $query18="SELECT user_id from Friends where (friend_id='$userIdd'AND relation='1') ";
$friend41=mysqli_query($conn,$query18);
if($friend41){

if(mysqli_num_rows($friend41)>0){
while($row4=mysqli_fetch_array($friend41)){
//$row=mysqli_fetch_array($friend);
$friendId41=$row4["friend_id"];

$query11=("SELECT poster_name,caption,post_time from posts WHERE friend_id='$userIdd' order by post_id desc");
    $result11= mysqli_query( $conn,$query11);
    if($result11){
      if(mysqli_num_rows($result11)>0){

        while($row11=mysqli_fetch_array($result11)){
         $name=$row11['poster_name'];
         $comment=$row11['caption'];
         $time=$row11['post_time'];
         ?>
        
         <p class="name"><strong>Posted By:</strong> <?php echo $name;?> <span style="float:right"><?php echo date("j-M-Y g:ia", strtotime($time)) ?></span></p>
         <p class="comments"><?php echo $comment;?></p> 

         <?php
       }
     }}
}}
}
*/

 $conn->close();


////////////////////////////////////////////////////////////////


?>
</div>
</div>

</div>

</body>
</html>