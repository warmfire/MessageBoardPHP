<?php
	session_start();
	if(!$_SESSION["isLogin5"]){
		header("Location:login.php");
	}
