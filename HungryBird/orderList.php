<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Order Window</title>
<link href="css/styles.css" type="text/css" rel="stylesheet" />
</head>
<body>
<?php
session_start();
?>
	<h1>Order List</h1>
		<hr><br>
	<ul>
<?php
	if(isset($_SESSION['foodList'])){
		$list = $_SESSION['foodList'];
		$str = "";
		if(count($list) > 0) {
			for($i = 0; $i<count($list); $i++) {
				$foodName = $list[$i]['foodName'];
				$str .= "<li>" ;
				$str .= $foodName ;
				$str .= "</li>";
			}
		}
		echo $str;
	}
?>
	</ul>
	<button onclick=placeOrder() style="float:right">Place Order</button>
	<script>
		function placeOrder(){
			var ajax = new XMLHttpRequest();
			ajax.open("GET", "./Controller/controller_menu.php?action=3", true); //action 3 means add food to order
			ajax.send();
			ajax.onreadystatechange = function(){
				if(ajax.readyState == 4 && ajax.status == 200){
				}
				window.parent.location.href = './order.php';
				window.parent.location.href = './status.php';
			}
		}
	</script>
</body>
</html>
