<?php

$firstName=$_POST['firstName'];
$lastName=$_POST['lastName'];
$nickName=$_POST['nickName'];
$password=$_POST['password'];
$firstPhoneNumber=$_POST['firstPhoneNumber'];
$secondPhoneNumber=$_POST['secondPhoneNumber'];
$email=$_POST['email'];
$gender=$_POST['gender'];
$birthdate=$_POST['birthdate'];
$hometown=$_POST['hometown'];
$maritalStatus=$_POST['maritalStatus'];
$aboutMe=$_POST['aboutMe'];
$image = $_FILES['image']['name'];


session_start();
$email1=$_SESSION["email"] ;

include 'connection.php';
$conn=connect();


/////////////////////////////////////////////////////
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


      $query1=("SELECT nickname FROM user WHERE user_id='$userId' and nickname!='NULL'");
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



////////////////////////////////////////////////////


	 // $check = getimagesize($_FILES["image"]["tmp_name"]);
  //   if($check !== false){
  //       $image = $_FILES['image']['tmp_name'];
  //       $imgContent = addslashes(file_get_contents($image));

	$password = password_hash($password, PASSWORD_BCRYPT);
	
	
	if($firstName !=null){
		$sql =  "UPDATE User set firstname='$firstName' WHERE email= '$email1'";
		mysqli_query($conn,$sql);
	}
    if($lastName !=null){
		$sql =  "UPDATE User set lastname='$lastName' WHERE email= '$email1'";
		mysqli_query($conn,$sql);
	}
	if($nickName !=null){
		$sql =  "UPDATE User set nickname='$nickName' WHERE email= '$email1'";
		mysqli_query($conn,$sql);
	}
	if($password !=null){
		$sql =  "UPDATE User set password='$password'WHERE email= '$email1'";
		mysqli_query($conn,$sql);
	}
	if($gender !=null){
		$sql =  "UPDATE User set gender='$gender' WHERE email= '$email1'";
		mysqli_query($conn,$sql);
		$_SESSION["gender"]=$gender;
	}
	if($hometown !=null){
		$sql =  "UPDATE User set hometown='$hometown' WHERE email= '$email1'";
		mysqli_query($conn,$sql);
	}
	if($maritalStatus !=null){
		$sql =  "UPDATE User set marital_status='$maritalStatus' WHERE email= '$email1'";
		mysqli_query($conn,$sql);
	}
	if($aboutMe!=null){
		$sql =  "UPDATE User set aboutme='$aboutMe' WHERE email= '$email1'";
		mysqli_query($conn,$sql);
	}
	if($firstPhoneNumber!=null){
		$sql =  "UPDATE User set phone1='$firstPhoneNumber' WHERE email= '$email1'";
		mysqli_query($conn,$sql);
	}
	if($secondPhoneNumber!=null){
		$sql =  "UPDATE User set phone2='$secondPhoneNumber' WHERE email= '$email1'";
		mysqli_query($conn,$sql);
	}
	if($image!=null){
		$sql =  "UPDATE User set image='$image' WHERE email= '$email1'";
		mysqli_query($conn,$sql);
		$insert="insert into posts (user_id,caption,ispublic,poster_name,image) values($userId,'user changed the profile picture','0','$name','$image');";
        $result3 = mysqli_query( $conn,$insert);

	}
	if($email !=null){
		$sql =  "UPDATE User set email= '$email' WHERE email= '$email1'";
		mysqli_query($conn,$sql);
		$_SESSION["email"]=$email;
	}
	
		$conn->close();
		header('Location: index.php');
	





?>


