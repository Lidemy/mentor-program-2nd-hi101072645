<?php
require_once('__connect.php');
if(isset($_POST['content']) && !empty($_POST['content'])){
    $new_comment = $_POST['content'];
    $edit_id = $_POST['edit_id'];
    $sql = "UPDATE hi101072645_comments SET content = '$new_comment' WHERE `id`= $edit_id";
    $result = $conn->query($sql);
    
    // $stmt = $conn->prepare("UPDATE hi101072645_comments (`content`) VALUES (?) WHERE id = ?");
    // $stmt->bind_param("ss", $new_comment,$edit_id);

    if ($conn->query($sql)) {
        header('Location: ./index.php');
    } else {
        printMessage($conn->error, $_SERVER["HTTP_REFERER"]); 
    }
}else{
    echo "<script>alert('內容欄位不可為空喔！');history.go(-1);</script>";
    
    // printMessage('請輸入內容！', $_SERVER["HTTP_REFERER"]); 
}

?>
