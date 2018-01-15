<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>User Log In</title>
<link href="css/register.css" type="text/css" rel="stylesheet" />
</head>
<body>
	<h1>Courier Register</h1>
	<form action='Controller/controller_courier.php' method="POST">
		Username<input type='text' placeholder='User Name' id="userName" name='username'><br>
		Password<input type='password' placeholder='Password' id="pwd" name='pwd'><br>
		Courier Name<input type='text' placeholder='Your real name' id='name' name='courierName'><br>
		Phone<input type='tel' name='phone'><br>
		<button type='submit' name='courierRegister'>Submit</button>
		<button type='reset' value='reset'>Clear</button>
	</form>
</body>
</html>
<?php
?>