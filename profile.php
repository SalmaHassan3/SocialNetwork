     
<?php
 include 'connection.php';
session_start();
$conn=connect();
require'classes/friends.php';
$another_ID=$_GET['nameid'];
$Current_ID=$_SESSION["user_ID"]; 
$_SESSION['idela']=$another_ID;
echo "Hi";
echo $another_ID;
echo $Current_ID;
      if(friends::renderfriendship($Current_ID,$another_ID,'istherefriendship')==1){ //state friend 1
     
      echo"case1";
    header("Location:profilyllfriend.php?nameid=$another_ID"); 
 //  header("Location:profilyllfriend.php?nameid=$another_ID"); 
}

else {

 echo "case2";
 header("Location:profilelmeshfriend.php?nameid=$another_ID"); 

//header("Location:profilyllfriend.php?nameid=$another_ID"); 

}

?>