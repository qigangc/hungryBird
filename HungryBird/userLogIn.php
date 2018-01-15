<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>User Log In</title>
<link href="css/userLogIn.css" type="text/css" rel="stylesheet" />
</head>
<body>
<?php
session_start ();
?>
	<h1>User Login</h1>
	<div id='logInWindow'>
		<form action="Controller/controller_user.php" method="POST">
			User Name: <input type='text' placeholder='Typing account'
				id="userName" name='id'><br>
			<br> Password: <input type='password' placeholder='Typing here'
				id="pwd" name='password'><br>
			<br>
			<input type='submit' name='user_login' value='login'>
		</form>
		<a href="./userRegister.php">Register</a>
	</div>
<?php
if (isset($_SESSION['user_loginError'])) {
	echo "<div id='alert'>" . $_SESSION['user_loginError'] . "</div>";
}
?>
</body>
</html>
