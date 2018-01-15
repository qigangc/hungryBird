<?php
include '../DBAdaptor/DatabaseAdaptor.php';

session_start ();

unset($_SESSION['user_loginError'] );
unset($_SESSION['user_registerError'] );

// user login check
if (isset($_POST['user_login'])) {
  $username = $_POST['id'];
  $password = $_POST['password'];
  $login = $theDBA->userLoginCheck($username,$password);
  if($login) {
    $_SESSION['user'] = $username;
    $user = $theDBA->getUser($username);
    $_SESSION['userID'] = $user[0]['id'];
    header('Location: ../order.php');
  } else {
    $_SESSION['user_loginError'] = "Invalid credentials.";
    header('Location: ../userLogIn.php');
  }
}
// user register
if (isset($_POST['userRegister'])) {
  $username = $_POST['username'];
  $password = $_POST['pwd'];
  //$date = getdate();
  //$addedTime = "$date[weekday], $date[month] $date[mday], $date[year]";
  $signupTime = "qwer";
  $address = $_POST['address'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
 // $register = $theDBA->userRegister("username", "password", "address", "signupTime","email","phone");
  $register = $theDBA->userRegister($username, $password, $address, $signupTime,$email,$phone);
  if ($register == 0) {
    $_SESSION['user_registerError'] = "user name exists";
  } else {
    header('Location: ../userLogIn.php');
  }
}

if (isset($_GET['action']) && $_GET['action'] == 0) {
	unset($_SESSION['user']);
	unset($_SESSION['userID']);
	if(isset($_SESSION['user_address'])){
		unset($_SESSION['user_address']);
	}
}
/*
// get a food list
if (isset($_GET['foodList'])) {

}

// get foods by a certain type
if (isset($_GET['foodsByType'])) {

}

// get foods of a merchant
if (isset($_GET['foodsByMerchant'])) {

}

// get food information
if (isset($_GET['foodInfo'])) {

}
*/

?>
