
<?php
session_start();

include 'connection.php';
$conn=connect();
$emailremove=$_SESSION["email"];

$sql ="SELECT gender FROM user WHERE email='$emailremove'";
$result = mysqli_query($conn,$sql);
$row =mysqli_fetch_array($result);
$gender=$row["gender"];
 




if($gender=="male"){
	$image = "male.jpg";
    }
    if($gender=="female"){
	$image = "female.jpg";
    }



    $sql =  "UPDATE User set image='$image' WHERE email= '$emailremove'";
		mysqli_query($conn,$sql);

		$conn->close();

header('Location: editProfile.php');


?>