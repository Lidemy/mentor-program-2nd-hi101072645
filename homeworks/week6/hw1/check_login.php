<?php
	session_start();
	require_once('__connect.php');
	require_once('utils.php');
	$user = '';
	if(isset($_SESSION['account'])){
		$user = $_SESSION['account'];
	}
	
?>