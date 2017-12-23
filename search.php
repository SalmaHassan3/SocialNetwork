
<?php
include 'connection.php';
session_start();
$conn=connect();
require'classes/friends.php';
$email_post=$_SESSION["email"];

$flagllrequest=0;
$sql ="SELECT user_id FROM user WHERE email='$email_post'";
$result = mysqli_query( $conn,$sql);
$row =mysqli_fetch_array($result);
$userIdf=$row["user_id"];
$_SESSION["user_ID"]=$row["user_id"];
//echo "WELCOME " . $_SESSION["email"] . ".<br>";
function test_input($data) {
    $data = trim($data);
   $data = stripslashes($data); // remember this 
   $data = htmlspecialchars($data); //remember to ckeck this 
    return $data;
}

function searchResults2($sql){
$conn=connect();
      $result1 = mysqli_query($conn,$sql);
      $count = mysqli_num_rows($result1);
    if((mysqli_num_rows($result1)>0)) {
     while($row1=mysqli_fetch_array($result1)){ 
           $caption  =$row1['caption'];
           $ID=$row1['user_id'];
            $sql2 = "SELECT firstname,lastname, user_id FROM user WHERE user_id='$ID'";
            $result2 = mysqli_query($conn,$sql2);
            $row2=mysqli_fetch_array($result2);
             $First  =$row2['firstname'];
             $Last  =$row2['lastname'];

            echo  $caption;
            echo "<ul>\n"; 
    echo "<li>" . "<a  href=\"profile.php?nameid=$ID\">"   .$First. "  ".$Last."</a></li>\n"; 
    echo "</ul>"; }}
else
  echo '<script type="text/javascript"> alert("NO data Found!"); </script>';
  }

function searchResults($sql){
$conn=connect();
      $result = mysqli_query($conn,$sql);
      $count = mysqli_num_rows($result);
   //.0 echo $count;
    if((mysqli_num_rows($result)>0)) {
     while($row=mysqli_fetch_array($result)){ 
           $FirstName  =$row['firstname'];
       $LastName  =$row['lastname'];
          $ID=$row['user_id'];
      $_SESSION["Firend_ID"]=$ID;
echo "<ul>\n"; 
    echo "<li>" . "<a  href=\"profile.php?nameid=$ID\">"   .$FirstName. "  ".$LastName."</a></li>\n"; 
    echo "</ul>"; 
}
}
else
  echo '<script type="text/javascript"> alert(" No users with this data!, if you search for posts pleases select Posts"); </script>';
  

}
//if(($_POST['submit'])){ 
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$searchArea=test_input($_POST['SearchArea']);
//Declare @Keywords varchar(50)
//set @Keywords = '$searchArea'
if(!isset($_POST ['SearchBy']) ) 
  $SearchType= "all";
else 
$SearchType =$_POST ['SearchBy'];

switch ($SearchType) {
  
    case "all":
      $sql = "SELECT firstname ,lastname, user_id FROM user WHERE email = '$searchArea' OR firstname  = '$searchArea' OR hometown = '$searchArea' OR lastname = '$searchArea'";
    searchResults($sql);

        break;
    
    
    case "email":
      $sql = "SELECT firstname,lastname , user_id FROM user WHERE email = '$searchArea'";
    searchResults($sql);

        break;
    case "firstname":
      $sql = "SELECT firstname,lastname , user_id FROM user WHERE firstname  = '$searchArea'";
searchResults($sql);
        
        break;
    case "lastname":
      $sql = "SELECT firstname,lastname, user_id FROM user WHERE lastname = '$searchArea'";
searchResults($sql);
        break;
  case "hometown":
       $sql = "SELECT firstname,lastname , user_id FROM user WHERE hometown = '$searchArea'";
    searchResults($sql);
        break;
  case "Posts":
  
     $sql = "SELECT user_id,caption FROM posts WHERE caption Like '".$searchArea."%' ";
     
  searchResults2($sql);
       //$sql = "SELECT user_id,caption,firstname,lastname FROM posts INNER JOIN user ON user_id=user_id WHERE Contains(caption,) ";

        break;
  }
}


?>

 

<!DOCTYPE html>
<html>
<body>

 <form action ="search.php"  method = "post">
  <input type="radio" name="SearchBy" value="email"> Email<br>
  <input type="radio" name="SearchBy" value="firstname"> firstname<br>
  <input type="radio" name="SearchBy" value="lastname"> lastname<br>
  <input type="radio" name="SearchBy" value="hometown"> Home Town<br>
  <input type="radio" name="SearchBy" value="Posts"> Posts<br> 
  <input type = "text" Name ="SearchArea" ID="SearchArea"  placeholder="search here!">
  <input id="submit" type ="submit" value = "GO!">
  
</form>
</body>
</html>