<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Courier Window</title>
<link href="css/courierStatus.css" type="text/css" rel="stylesheet" />
</head>
<body>
	<button onclick='logOut()'>Log out</button>
	<div id='changeStatus'>
		<select>
			<option value='order'>Order</option>
			<option value='*****'>Undecide</option>
		</select>
		<button>change</button>
	</div>
	<br><iframe id='status' width="80%" height="650" src="map.php"></iframe>
	<script>
		function logOut(){
			var ajax = new XMLHttpRequest();
			ajax.open("GET", "./Controller/controller_courier?action=0", true); //This call some controller to unset the session.
			ajax.send();
			ajax.onreadystatechange = function(){
				if(ajax.readyState == 4 && ajax.status == 200){
				}
				window.parent.location.href = './index.php'; //after log out account, jump to index page
			}
		}
	</script>
</body>
</html>
<?php
?>
