<?php
session_start();
include 'DBAdaptor/DatabaseAdaptor.php';

$orderList = $theDBA->paidOrderList();

for($i = 0; $i<count($orderList); $i++){
  echo "<div>";
  echo "Order Number: ".$orderList[$i]['id'];
  echo "&nbsp;&nbsp;&nbsp;&nbsp;<button onclick='deliver(".$orderList[$i]['id'].")'>Deliver</button>";
  echo "</div><br>";
}
$page = $_SERVER['PHP_SELF'];
$sec = "5";
header("Refresh: $sec; url=$page");
?>

<script>
function deliver(num){
  var ajax = new XMLHttpRequest();
  ajax.open("GET", "./Controller/controller_menu.php?action=4&orderID="+num, true);
  ajax.send();
  ajax.onreadystatechange = function(){
    if(ajax.readyState == 4 && ajax.status == 200){
    }
    window.parent.location.href = './merchantStatus.php';
  }
}
</script>
