<?php 
require_once "config.php";
	session_start();
	unset($_SESSION['user_session']);
	unset($_SESSION['pwd_session']);
	unset($_SESSION['id']);
	unset($_SESSION['pass_session']);
	unset($_SESSION['adm_session']);
	session_destroy();
    header("Location: logins.php");
 ?>