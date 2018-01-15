<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>User Log In</title>
<link href="css/register.css" type="text/css" rel="stylesheet" />
</head>
<body>
	<h1>Merchant Register</h1>
	<form action='Controller/controller_merchant.php' method="POST">
		Username<input type='text' placeholder='User Name' id="userName" name='username'><br>
		Password<input type='password' placeholder='Password' id="pwd" name='pwd'><br>
		Resturant Name<input type='text' placeholder='Your resturant name' id='name' name='merchantName'><br>
		Address<input type='text' name='address'><br>
		Cuision<select name='country'>
					<option selected>Chinese</option>
					<option>India</option>
					<option>American</option>
					<option>Italian</option>
					<option>French</option>
				</select><br>
		Email<input type='email' name='email'><br>
		Phone<input type='tel' name='phone'><br>
		<button type='submit' name='merchantRegister'>Submit</button>
		<button type='reset' value='reset'>Clear</button>
	</form>
</body>
</html>
<?php
?>