<?php
require_once('__connect.php');
include_once('check_login.php');
require_once('utils.php');

if(isset($_POST['content']) && !empty($_POST['content'])
){
	$sql = "
			INSERT INTO hi101072645_comments 
			(user_id, subject, content, reply_id) 
			VALUES (?, ?, ?, ?)
			";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param("issi",$user_id ,$subject ,$content ,$reply_id);

	$user_id = $_POST['user_id'];
	$subject = $_POST['subject'];
	$content = $_POST['content'];
	$reply_id = $_POST['reply_id'];

	// echo "為什麼reply_id " . $reply_id . " 沒有呢?" ;

	if ($stmt->execute() !== TRUE) {
	    echo "Error: "  . $conn->error;
	    header('Location: index.php?status=留言失敗');
	}else{
	    header("Location: index.php");
	}

}else{
    echo "<script>alert('內容欄位不可為空喔！')</script>";
    header("Location: index.php");
}
?>