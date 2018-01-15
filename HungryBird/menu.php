<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Menu</title>
<link href="css/menu.css" type="text/css" rel="stylesheet" />
</head>
<body>
<?php
session_start();
?>
	<h1>Menu</h1>
	<hr><br>
	<div id='whole menu'>
		<?php
		if (isset($_SESSION['current_food_list'])){
			$foodList = $_SESSION['current_food_list'];
			for($i=0; $i<count($foodList); $i++) {
				$foodName = $foodList[$i]['foodName'];
				$foodPicAddress = $foodList[$i]['picture'];
				$foodPrice = $foodList[$i]['price'];
				echo "<div class='foods'>";
				echo "<p>" . $foodName . "</p>";
				echo "<p>" . $foodPrice , "</p>";
				$foodID = $foodList[$i]['id'];
				echo "<button onclick=addToOrder('". $foodID . "')>Order</button>";
				echo "</div>";
			}
			//unset($_SESSION['current_food_list']);
		}
		?>
	</div>
	<script>
		function addToOrder(args){
			//alert();
			var foodID = args;
			var ajax = new XMLHttpRequest();
			ajax.open("GET", "./Controller/controller_menu.php?action=2&id=" + foodID, true);
			ajax.send();
			ajax.onreadystatechange = function(){
				if(ajax.readyState == 4 && ajax.status == 200){
					//alert();
					}
					window.parent.location.href = './order.php';
				}
			}
	</script>
</body>
</html>
<?php
?>
