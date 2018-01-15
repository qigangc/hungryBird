<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Menu</title>
<link href="css/order.css" type="text/css" rel="stylesheet" />
</head>
<body>
	<?php
	session_start();
	?>
	<h2>User</h2>
	<div id='catagroy'>
		<select id='resturantID'>
  		<option value="All">All</option>
		</select>
		<button onclick='showList()'>Find you Delicacies</button>
	</div>
	<?php
	if(isset($_SESSION['merchantList'])){
		$list = $_SESSION['merchantList'];
		echo "<div class='merchant'>";
		for($i = 0; $i<count($list); $i++){
			$resName = $list[$i]['merchantName'];
			echo "<button class='merchantButton' onclick=showMenu(\"".$resName."\")>".$resName."</button><br>";
		}
		echo "</div>";
	}

	?>
		<script>
		function showList(){
			var type = document.getElementById('resturantID').value;
			var ajax = new XMLHttpRequest();
			ajax.open("GET", "./Controller/controller_menu.php?action=0", true);
			ajax.send();
			ajax.onreadystatechange = function(){
				if(ajax.readyState == 4 && ajax.status == 200){}
				window.parent.location.href = './order.php';
			}
		}
		function showMenu(args){
			var merName = args;
			var ajax = new XMLHttpRequest();
			ajax.open("GET", "Controller/controller_menu.php?action=1&merchant=" + merName, true);
			ajax.send();
			ajax.onreadystatechange = function(){

				if(ajax.readyState == 4 && ajax.status == 200){

				}
				window.parent.location.href = './order.php';
			}
		}
		function userLogout(){
			var ajax = new XMLHttpRequest();
			ajax.open("GET", "./Controller/controller_user?action=0", true); //This call some controller to unset the session.
			ajax.send();
			ajax.onreadystatechange = function(){
				if(ajax.readyState == 4 && ajax.status == 200){}
			}
			window.parent.location.href = './index.php';
		}
		</script>

	<iframe class='frame1' src='orderList.php' width="250" height="500" ></iframe>
	<iframe class='frame2' src='menu.php' width="750" height="1000"></iframe>
	<button class='logout' onclick=userLogout()>logout</button>

</body>
</html>
