<!DOCTYPE html>
<html lang="en"></html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>優雅的編輯留言 _(¦3」∠)</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link href="css.css" rel="stylesheet"/>
</head>
<body>
    <div class="container">
        <h2 class="edit_title">編輯留言：</h2>
        <div class="origin_comment">

<?php
    include_once('check_login.php');
    include_once('__connect.php');
    require_once('utils.php');
    
    if(isset($_GET['comment_id'])){
        $comment_id = $_GET['comment_id'];
        $sql = "SELECT * FROM hi101072645_comments WHERE `id`= $comment_id";
        $result = $conn->query($sql);
        $row = $result-> fetch_assoc();
        echo "<h3 class='theme'>原始留言：</h3><div class='content'>". htmlspecialchars($row['content'])."</div>" ;
    }else{
        echo '沒有ID耶';
    }

?>
        </div>
        <form class="new-post" method="post" action="update.php">
            <div class="new-content">
                <h3 class='theme'>新留言內容：</h3>
                <input type="text" style="display:none" name='edit_id' value="<?= $comment_id ?>">
                <textarea class="form-control content" name="content" type="textarea" placeholder="<?= htmlspecialchars($row['content']) ?>"></textarea><br/>
            </div>
            <br>
            <input class="btn btn-primary submit-btn" name="ok" type="submit" value="提交留言"/>
        </form>
</div>