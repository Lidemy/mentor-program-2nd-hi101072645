<?php
include_once('check_login.php');
require_once('__connect.php');
require_once('utils.php');

if(
    isset($_POST['comment_id']) && !empty($_POST['comment_id'])
){
    $id=$_POST['comment_id'];
    $sql = "
    DELETE FROM hi101072645_comments
    WHERE id = $id
    ";
    if($conn->query($sql)){
        header('Location: ./index.php');
    } else {
        printMessage($conn->error, './index.php'); 
    }
} else {
    printMessage('錯誤', './index.php'); 
}

?>