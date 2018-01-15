<?php
include '../DBAdaptor/DatabaseAdaptor.php';

session_start ();

unset($_SESSION['merchant_loginError'] );
unset($_SESSION['merchant_registerError'] );

// user login check
if (isset($_POST['merchantLogin'])) {
  $username = $_POST['id'];
  $password = $_POST['password'];
  $login = $theDBA->merchantLoginCheck($username,$password);
  if($login) {
    $_SESSION['merchant'] = $username;
    $user = $theDBA->getMerchant($username);
    $_SESSION['merchantID'] = $user[0]['id'];
    $_SESSION['merchant_address'] = $user[0]['address'];
    header('Location: ../merchantStatus.php');
  } else {
    $_SESSION['merchant_loginError'] = "Invalid credentials.";
    header('Location: ../merchantLogIn.php');
  }
}

if (isset($_POST['merchantRegister'])) {
	$username = $_POST['username'];
	$password = $_POST['pwd'];
	$resturantName = $_POST['merchantName'];
	$address = $_POST['address'];
	$country = $_POST['country'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$register = $theDBA->merchantRegister($username, $password, $resturantName, $address, $country,$phone, $email);
	if ($register == 0) {
		$_SESSION['merchant_registerError'] = "merchant name exists";
	} else {
		header('Location: ../merchantLogIn.php');
	}
}

if (isset($_GET['action']) && $_GET['action'] == 0) {
  unset($_SESSION[merchant]);
  unset($_SESSION[merchantID]);
  unset($_SESSION[merchant_address]);
}

// editing foods

// add food

// delete food

// change food price

// change picture

?>
