<?php



$firstName=$_POST['firstName'];
$lastName=$_POST['lastName'];
$nickName=$_POST['nickName'];
//$password=$_POST['password'];
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
$_SESSION["email"] = $email;

include 'connection.php';
$conn=connect();


$sql ="SELECT email FROM User WHERE email= '$email'";
$result = mysqli_query( $conn,$sql);

if(mysqli_num_rows($result)>0)
{
	echo "Email Already Exist";
}
else
{
	if($image==null){

	if($gender=="male"){
	$image = "male.jpg";
    }
    if($gender=="female"){
	$image = "female.jpg";
    }
}
	    //$password = password_hash($password, PASSWORD_BCRYPT);
$password= crypt($_POST['password'],"st");
		$sql =  "INSERT into User(firstname,lastname,nickname,password,email,gender,birthdate,image,hometown,marital_status,aboutme,phone1,phone2) values ('$firstName','$lastName','$nickName','$password','$email','$gender','$birthdate','$image','$hometown','$maritalStatus','$aboutMe','$firstPhoneNumber','$secondPhoneNumber')";

	
	if ($conn->query($sql) === TRUE) {
		$conn->close();
		header('Location: index.php');
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

}

$conn->close();

?>



