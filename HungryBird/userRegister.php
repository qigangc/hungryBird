<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>User Log In</title>
<link href="css/register.css" type="text/css" rel="stylesheet" />
</head>
<body>
	<h1>User Register</h1>
	<div>
	<form action="Controller/controller_user.php" method="POST">
		Username<input type='text' placeholder='User Name' name="username"><br>
		Password<input type='password' placeholder='Password' name="pwd"><br>
		address<input type='text' name='address'><br>
		email<input type='email' name='email'><br>
		phone<input type='tel' name='phone'><br>
		<button type='submit' name='userRegister'>Submit</button>
		<button type='reset' value='reset'>Clear</button>
	</form>
	</div>
</body>
</html>
<?php
?>