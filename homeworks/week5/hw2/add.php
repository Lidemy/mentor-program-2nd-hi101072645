<?php
	require_once('__connect.php');

	$user_id = $_POST['user_id'];
	$subject = $_POST['subject'];
	$content = $_POST['content'];
	$reply_id = $_POST['reply_id'];


	$sql = "INSERT INTO hi101072645_comments (user_id, subject, content, reply_id) VALUES ('$user_id', '$subject', '$content' ,$reply_id) ";

	if(  $conn->query($sql)){
	// echo "沒事啊";
	}else{
	echo '新增失敗';
	}

	header("Location: index.php");
?>

