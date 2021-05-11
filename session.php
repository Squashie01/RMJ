<?php
	session_start();
	$password = $_SESSION["password"] ?? false;
	echo $password;
?>