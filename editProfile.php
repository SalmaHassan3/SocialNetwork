<html>
  

   <head>


	<script
	src="https://code.jquery.com/jquery-3.2.1.min.js"
	integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
	crossorigin="anonymous"></script>

	<script type="text/javascript">


		function validateSignupForm(){
			
			var email=document.getElementById("email").value;
			var re=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
			 if (!(email==null || email=="")){
		 if(!re.test(email)){
				alert("Enter a valid email! ");
				return false;
			}
}
			return true;

		}	




	</script>



</head>
<body>

<?php
session_start();
$email =$_SESSION["email"];
include 'connection.php';
$conn=connect();

$sql ="SELECT * FROM User WHERE email= '$email'";
$result = mysqli_query( $conn,$sql);
$row =mysqli_fetch_array($result); 

$sql ="SELECT * FROM User WHERE email= '$email'";
$result = mysqli_query( $conn,$sql);
$row =mysqli_fetch_array($result); 

?>	



	<link rel="stylesheet" type="text/css" href="css/edit.css" />

	<div id="logo"> 
		LOGO
	</div>
	<div id="editProfile"> 
	<form id="remove" action="remove.php" method="post" >
	 <h3>Profile picture:</h3>
    <input id="removeButton" type ="submit" value = "Remove profile picture">
    </form> 
		<form id="editform" action="edit.php" method="post" onsubmit="return validateSignupForm()" enctype="multipart/form-data">

    <input type="file" name="image" id="image" accept="image/*" />
		    <br />
			<h3>First Name:</h3>
			<input type = "text" Name ="firstName" ID="firstName"  placeholder="<?php echo $row['firstname']; ?>" >
			<br />
			<h3>Last Name:</h3>
			<input type = "text" Name ="lastName" ID="lastName"  placeholder="<?php echo $row['lastname']; ?>" >
			<br />
			<h3>Nick Name:</h3>
			<input type = "text" Name ="nickName" ID="nickName"  placeholder="<?php echo $row['nickname']; ?>">
			<br />
			<h3>Password:</h3>
			<input type = "password" Name ="password" ID="password" placeholder="" >
			<br />
			<h3>First Phone Number:</h3>
			<input type = "number" Name ="firstPhoneNumber" ID="firstPhoneNumber" placeholder="<?php echo $row['phone1']; ?>">
			<br />
			<h3>Second Phone Number:</h3>
			<input type = "number" Name ="secondPhoneNumber" ID="secondPhoneNumber" placeholder="<?php echo $row['phone2']; ?>">
			<br />
			<h3>Email:</h3>
			<input type = "text" Name ="email" ID="email" placeholder="<?php echo $row['email']; ?>"  >
			<br />
			<h3>Gender:</h3>
			<input type = "text" Name ="gender" ID="gender" placeholder="<?php echo $row['gender']; ?>"  >
			<br />
			<h3>Birthdate:</h3>
			<input type = "date" Name ="birthdate" ID="birthdate" placeholder="<?php echo $row['birthdate']; ?>"  >
			<br />
    <h3>Hometown:</h3>
    <input type = "text" Name ="hometown" ID="hometown" placeholder="<?php echo $row['hometown']; ?>" >
    <br />
    <h3>Marital status:</h3>
    <input type = "text" Name ="maritalStatus" ID="maritalStatus" placeholder="<?php echo $row['marital_status']; ?>" >
    <br />
    <h3>About me:</h3>
    <input type = "text" Name ="aboutMe" ID="aboutMe" placeholder="<?php echo $row['aboutme']; ?>" >
    <br />
    <br />
   
   
    <input id="editButton" type ="submit" value = "EDIT">
</form>
 

</div>

</body>
</html>

<?php
$conn->close();
?>


