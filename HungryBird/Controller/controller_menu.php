<?php
include '../DBAdaptor/DatabaseAdaptor.php';

session_start ();

if (isset($_GET['action']) && $_GET['action'] == 0) {
  $list = $theDBA->getMerchantList();
  $_SESSION['merchantList'] = $list;
  header('Location: ../menu.php');
}

if (isset($_GET['action']) && $_GET['action'] == 1) {
  $merchant = $_GET['merchant'];
  $_SESSION['current_food_list'] = $theDBA->foodList($merchant);
  header('Location: ../order.php');
}

if (isset($_GET['action']) && $_GET['action'] == 2) {
  $foodID = $_GET['id'];
  $userID = $_SESSION['userID'];
  $orderID = $theDBA->createOrder($userID);
  $_SESSION['orderID'] = $orderID;
  $_SESSION['foodList'] = $theDBA->addFoodForUser($userID, $orderID, $foodID, 0);
  header('Location: ../order.php');
}

if (isset($_GET['action']) && $_GET['action'] == 3) {
  $user = $_SESSION['user'];
  $userInfo = $theDBA->getUser($user);
  $_SESSION['user_address'] = $userInfo[0]['address'];
  $userID = $_SESSION['userID'];
  if(isset($_SESSION['orderID'])){
    $orderID = $_SESSION['orderID'][0]['id'];
    $theDBA->userPaid($userID, $orderID);
  }
  unset($_SESSION['foodList']);
}

if (isset($_GET['action']) && $_GET['action'] == 4){
  $orderID = $_GET['orderID'];
  $theDBA->deliverOrder($orderID);
  //header('Location: paiedOrders.php');
}




?>
