<?php
include '../DBAdaptor/DatabaseAdaptor.php';

session_start ();

unset($_SESSION['courier_loginError'] );
unset($_SESSION['courier_registerError'] );

if (isset($_POST['courier_login'])) {
	$username = $_POST['id'];
	$password = $_POST['password'];
	$login = $theDBA->courierLoginCheck($username,$password);
	if($login) {
		$_SESSION['carrier'] = $username;
		$user = $theDBA->getUser($username);
		$_SESSION['carrierID'] = $user[0]['id'];
		header('Location: ../courierStatus.php');
	} else {
		$_SESSION['courier_loginError'] = "Invalid credentials.";
		header('Location: ../courierLogIn.php');
	}
}

if (isset($_POST['courierRegister'])) {
	$username = $_POST['username'];
	$password = $_POST['pwd'];
	$courierName = $_POST['courierName'];
	$phone = $_POST['phone'];
	$register = $theDBA->courierRegister($username, $password, $courierName,$phone);
	if ($register == 0) {
		$_SESSION['user_registerError'] = "user name exists";
	} else {
		header('Location: ../courierLogIn.php');
	}
}

if (isset($_GET['action']) && $_GET['action'] == 0) {
	unset($_SESSION['carrier']);
	unset($_SESSION['carrierID']);
}

?>
