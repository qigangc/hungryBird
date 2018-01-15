<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Hungry Bird</title>
<link href="css/styles.css" type="text/css" rel="stylesheet" />
</head>
<body>
<?php
	if (isset($_COOKIE['userName'])){
		header("./order.php");
		exit;
	}
	else {
		echo "<h1 id='webSiteTitle'>Hungry Bird</h1>
		<div id='logInWindow'>
		<button class='threeLog' onclick=\"window.location.href='./userLogIn.php'\">User</button>
		<button class='threeLog' onclick=\"window.location.href='./merchantLogIn.php'\">Merchant</button>
		<button class='threeLog' onclick=\"window.location.href='./courierLogIn.php'\">Courier</button>
		</div>";
	}
?>
</body>
</html>
