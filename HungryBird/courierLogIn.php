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
	<h1>Courier Login</h1>
	<div id='logInWindow'>
		<form action='Controller/controller_courier.php' method="POST">
			User Name: <input type='text' placeholder='Typing account'
				id="userName"  name='id'><br>
			<br> Password: <input type='password' placeholder='Typing here'
				id="pwd" name='password'><br>
			<br>
			<input type='submit' name='courier_login' value='login'>
		</form>
		<a href="./courierRegister.php">Register</a>
	</div>
<?php
if (isset($_SESSION['courier_loginError'])) {
	echo "<div id='alert'>" . $_SESSION['courier_loginError'] . "</div>";
}
?>
</body>
</html>