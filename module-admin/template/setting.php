<?php
	date_default_timezone_set("Asia/Jakarta");
	session_start();
	define("TEMPLATE", "module-admin/template/");
	define("HOME", "module-admin/home/");
	define("CONNECTION","connection/");

	require $root.CONNECTION."Connection.php";

	if (isset($_POST["btnLogin"]))
	{
		$conn = new Connection();
		$user = $conn->login($_POST["username"],sha1($_POST["password"]));
		if ($user!=null)
		{
			$_SESSION['id'] = $user['UserID'];
			$_SESSION['user'] = $user['Username'];
			$_SESSION['token'] = sha1(uniqid($_POST["username"], true));
			echo "<script> window.location='".$root.HOME."index.php' </script>";
		}
	}

	if (isset($_POST["btnLogout"]))
	{
		$_SESSION['id'] = null;
		$_SESSION['user'] = null;
		$_SESSION['token'] = null;
		echo "<script> window.location='".$root.HOME."login.php' </script>";	
	}

	if(!empty($_SESSION['id']))
	{
		$id=$_SESSION['id'];
		$token=$_SESSION['token'];
	}

	if(!empty($_SESSION['id']))
	{
		$id=$_SESSION['id'];
		$token=$_SESSION['token'];
	}
	else if($_SERVER['REQUEST_URI']!="/a/module-admin/home/login.php") 
		echo "<script> window.location='".$root.HOME."login.php' </script>";
?>