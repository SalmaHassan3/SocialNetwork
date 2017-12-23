

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
			if(!re.test(email)){
				alert("Enter a valid email! ");
				return false;
			}

			return true;

		}	




	</script>



</head>

<body>

	<link rel="stylesheet" type="text/css" href="css/signup.css" />

	<div id="logo"> 
		LOGO
	</div>
	<div id="signup">  
		<form id="signupform" action="signup.php" method="post" onsubmit="return validateSignupForm()" enctype="multipart/form-data">
			
			<h3>First Name:</h3>
			<input type = "text" Name ="firstName" ID="firstName"  placeholder="First Name" required="true">
			<br />
			<h3>Last Name:</h3>
			<input type = "text" Name ="lastName" ID="lastName"  placeholder="Last Name" required="true">
			<br />
			<h3>Nick Name:</h3>
			<input type = "text" Name ="nickName" ID="nickName"  placeholder="Nick Name">
			<br />
			<h3>Password:</h3>
			<input type = "password" Name ="password" ID="password" placeholder="Password" required="true" >
			<br />
			<h3>First Phone Number:</h3>
			<input type = "number" Name ="firstPhoneNumber" ID="firstPhoneNumber" placeholder="First Phone Number" >
			<br />
			<h3>Second Phone Number:</h3>
			<input type = "number" Name ="secondPhoneNumber" ID="secondPhoneNumber" placeholder="Second Phone Number" >
			<br />
			<h3>Email:</h3>
			<input type = "text" Name ="email" ID="email" placeholder="Email" required="true" >
			<br />
			<h3>Gender:</h3>
			<input type="radio" value="male" name="gender"> Male
			<input type="radio" value="female" name="gender"> Female
			<br />
			<h3>Birthdate:</h3>
			<input type = "date" Name ="birthdate" ID="birthdate" placeholder="Birthdate" required="true" >
			<br />
			<h3>Hometown:</h3>
			<input type = "text" Name ="hometown" ID="hometown" placeholder="Hometown" >
			<br />
			<h3>Marital status:</h3>
			<input type = "text" Name ="maritalStatus" ID="maritalStatus" placeholder="Marital status:" >
			<br />
			<h3>About me:</h3>
			<input type = "text" Name ="aboutMe" ID="aboutMe" placeholder="About me" >
			<br />
			<h3>Profile picture:</h3>
			<input type="file" name="image" id="image" accept="image/*" />
			<br />
			<br />
			<input id="signUpButton" type ="submit" value = "SIGN UP">
		</form>
	</div>

</body>
</html>