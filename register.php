<html>
<head>
	
	<script
	src="https://code.jquery.com/jquery-3.2.1.min.js"
	integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
	crossorigin="anonymous"></script>

	<script type="text/javascript">
		function validateLoginForm(){
			var email= document.getElementById("email").value;
			var password=document.getElementById("password").value;
			
			if(email==null || email==""){
				alert("Enter your Email! ");
				return false;
			}
			else if(password==null || password==""){
				alert("Enter your password! ");
				return false;
			}
			
			else return true;
		}	

	</script>
</head>


<body>
	<link rel="stylesheet" type="text/css" href="css/register.css" />

	<div id="logo"> 
		CONNECT
	</div>

	
	<div id="loginAndSignup" > 
		<form id="loginform" action="login.php" method="post" onsubmit="return validateLoginForm()">
			<h3>Email:</h3>
			<input type = "text" Name ="email" ID="email"  placeholder="Email" >
			<br />
			<h3>Password:</h3>
			<input type = "password" Name ="password" ID="password" placeholder="Password" >
			<br />
			<br />
			<br />
			<input id="bt1" type ="submit" value = "LOGIN">
		</form>
		

		<form id="signupform" action="signupPage.php" method="post" >
			<h5>If you do not have an account:
				<input id="bt2" type ="submit" value = "SIGNUP"></h5>
			</form>
		</div>  

	</body>
	</html>