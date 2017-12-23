<!DOCTYPE html>
<html>
<head>
	
	
</head>
<body>
<link rel="stylesheet" type="text/css" href="css/friendlist.css"/>
</body>
</html>



<?php

include "nav.php";
//session_start();

$email_post=$_SESSION["email"];

$conn=connect();
$query ="SELECT user_id FROM user WHERE email='$email_post'";
$result = mysqli_query($conn,$query);
$row =mysqli_fetch_array($result);
$ud=$row["user_id"];
echo"<h2>Your Friends:</h2>  <br /> <br/>";




$query1="SELECT friend_id from Friends where((user_id='$ud'))AND (relation='1')";
$friend1=mysqli_query($conn,$query1);
if($friend1){

	if(mysqli_num_rows($friend1)>0){
		while($row1=mysqli_fetch_array($friend1)){
//$row=mysqli_fetch_array($friend);
			$friendId1=$row1["friend_id"];


			$query1=("SELECT nickname,user_id FROM user WHERE user_id='$friendId1' and nickname!=' '");
			$result1= mysqli_query( $conn,$query1);
			if(mysqli_num_rows($result1)>0){
				$row1 =mysqli_fetch_array($result1);
				$user=$row1["nickname"];
				$uuu=$row1["user_id"];
				echo"
				<ul><li><a href=' profilyllfriend.php ?nameid=$uuu'>$user</a></li></ul>
				<form action='deletefriendfromfriends.php'>
					<input type='submit' value='Delete' id='submit'>
				</form>";
				
				
			}

			else {

				$query2=("SELECT firstname,lastname,user_id FROM user WHERE user_id='$friendId1'");
				$result2= mysqli_query( $conn,$query2);
				if(mysqli_num_rows($result2)>0){
					while($row2=mysqli_fetch_array($result2)){
						$userfirst=$row2["firstname"];
						$usersecond=$row2["lastname"];
						$useridll=$row2["user_id"];
						$user=$userfirst.' '.$usersecond;

						echo"<ul><li><a href=' profilyllfriend.php ?nameid=$useridll'>$user</a></li></ul>
						<form action='deletefriendfromfriends.php'>
					<input type='submit' value='Delete' id='submit'>
				</form>";

					}
				}
			}}}}
			else{


				echo"you not have friends";
			}




			$query3="SELECT user_id from Friends where((friend_id='$ud'))AND (relation='1')";
			$friend3=mysqli_query($conn,$query3);
			if($friend3){

				if(mysqli_num_rows($friend3)>0){
					while($row3=mysqli_fetch_array($friend3)){
//$row=mysqli_fetch_array($friend);
						$friendId3=$row3["user_id"];



			$query1=("SELECT nickname,user_id FROM user WHERE user_id='$friendId3' and nickname!=' '");
			$result1= mysqli_query( $conn,$query1);
			if(mysqli_num_rows($result1)>0){
				$row1 =mysqli_fetch_array($result1);
				$user=$row1["nickname"];
				$u1=$row1["user_id"];
				echo"
				<ul><li><a href=' profilyllfriend.php ?nameid=$u1'>$user</a></li></ul>
				<form action='deletefriendfromfriends.php'>
					<input type='submit' value='Delete' id='submit'>
				</form>";
				
				
			}

			else {

						$query4=("SELECT firstname,lastname,user_id FROM user WHERE user_id='$friendId3'");
						$result4= mysqli_query( $conn,$query4);
						if(mysqli_num_rows($result4)>0){
							while($row4=mysqli_fetch_array($result4)){
								$userfirst=$row4["firstname"];
								$usersecond=$row4["lastname"];
								$useridll=$row4["user_id"];
								$user=$userfirst.' '.$usersecond;

								echo"<ul><li><a href=' profilyllfriend.php ?nameid=$useridll'>$user</a></li></ul>
								<form action='deletefriendfromfriends.php'>
					<input type='submit' value='Delete' id='submit'>
				</form>";

							}
						}
					}}}}
					else{


						echo"you not have friends";
					}














					$conn->close();
					?>