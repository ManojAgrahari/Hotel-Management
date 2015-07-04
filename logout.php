<?php
	//$_SESSION
	session_start();
	unset($_SESSION['id']);
    session_destroy();
	//$_SESSION['id'] = null;
	Header('Location:login.php');
?>