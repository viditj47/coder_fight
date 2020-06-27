<?php
	
	include_once "connection.php";
	
	if(isset($_POST['signup'])){
		
		$fullname = $_POST['name'];
		$email = $_POST['email'];
		$password=$_POST['password'];
		$sql_insert = mysqli_query($conn,"INSERT INTO hackcodeTb(name,email,password) VALUES('$fullname','$email','$password')");
		if($sql_insert){
		echo "<script>alert('signup successfully')</script>";
	}
	else{
		echo mysqli_error($con);
		exit;
	}
	}
	

?>


<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
	
	<form method="post">
			<input type="text" placeholder="FullName" name="fullname"><br><br>
			<input type="email" placeholder="Enter Your Email" name="email"><br><br>
			<input type="password" placeholder="Password" name="password"><br><br>
			<input type="submit" value="SignUp" name="signup">
		</form>

</body>

</html>