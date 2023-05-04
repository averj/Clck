<?php
error_reporting(-1);
ini_set('display_errors', 1);
if(isset($_GET['amt'])) {
	try {
		$conn = new PDO('mysql:host=localhost;dbname=', '', '', array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}catch(PDOException $e) {
		echo $e->getMessage();
	}
	$log = $conn->prepare("INSERT INTO `clck_logs` (`id`, `clicks`, `ip`, `user_agent`, `date`) VALUES (null, :clicks, :ip, :user, :date)");
	$log->execute(array(
		':clicks' => $_GET['amt'],
		':ip' => $_SERVER['REMOTE_ADDR'],
		':user' => $_SERVER['HTTP_USER_AGENT'],
		':date' => time()
	));
}
echo ';)';
