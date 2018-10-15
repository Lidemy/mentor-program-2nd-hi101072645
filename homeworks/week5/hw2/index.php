<?php
    require_once('__connect.php');
?>



<!DOCTYPE html>
<html lang="en"></html>
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>留言板練習 _(¦3」∠)</title>
  <link href="css.css" rel="stylesheet"/>
</head>
<body>
  <div class="wrapper">

<?php
if ( !isset($_COOKIE["nickname"])){
?>
    <div class="login-info"><span>噢不！沒有登入不能留言的呀！</span>
        <p>請先<a href="login.php">登入</a>or <a href="signup.php">註冊</a>唷！ </p>
        </div>
    <?php
   
}else{
    echo '哈囉， '. $_COOKIE["nickname"]. '  '. "<a href='logout.php'>我要登出</a>";
?>
    <h2>有想說的話？</h2>
    <form class="new-post" method="post"  action='add.php'>
        <div class="new-user">
        <span class="new-nickname" name="nickname">
            <?= $_COOKIE["nickname"] ?>
        </span>
        </div>
        <div class="new-content"><span>主旨：</span>
        <input class="subject" name="subject" type="text"/><br/><span>內容：</span>
        <textarea class="content" name="content" type="textarea"></textarea><br/>
        <input type="input" style="display: none;" name="reply_id" value="0">
        <input type="input" style="display: none;" name="user_id" value="<?= $_COOKIE["member_id"] ?>">
        </div>
        <br>
        <input class="new-submit" name="ok" type="submit" value="提交留言"/>
    </form>
<?php
}
?> 
<br/>

<?php
    $sql = "SELECT * FROM hi101072645_comments JOIN hi101072645_user ON hi101072645_comments.user_id = hi101072645_user.id WHERE `reply_id`=0 ORDER BY created_at  DESC LIMIT 3";
    $result = $conn->query($sql);
    echo $conn->error;
    while( $row = $result->fetch_assoc() ):
    $id =$row["id"] ;
?>
    <div class="message">
    <div class="main-message" id="msg<?= $row["id"] ?>">
        <h3 class="theme">主旨： <?= $row["subject"] ?></h3>
        <div class="user">
            <span class="user-nickname"><?= $row["nickname"] ?></span>
        </div>
            <div class="content"><?= $row["content"]?></div>
            <span class="time"><?= $row["created_at"] ?></span>
        </div>
        <?php 
            $sql_reply = "SELECT * FROM hi101072645_comments JOIN hi101072645_user ON hi101072645_comments.user_id = hi101072645_user.id  WHERE `reply_id`=$id ORDER BY created_at";
            $result_reply = $conn->query($sql_reply);
            while( $row_reply = $result_reply->fetch_assoc() ):
        ?>
        <div class="sub-message">
            <div class="user">
                <span class="user-nickname"><?= $row_reply["nickname"] ?></span>
            </div>
        <div class="content"><?= $row_reply["content"];?></div>
        <span class="time"><?= $row_reply["created_at"] ?></span>
        </div>
        <?php endwhile; ?>
        <?php if(isset($_COOKIE["nickname"])):?>
        <form class='reply-message' action='add.php' method='post'>
            <div class='user'>
                <span class='user-nickname'><?= $_COOKIE["nickname"] ?></span>
            </div>
            <textarea name='content' type='textarea'></textarea>
            <input type="input" style="display: none;" name="subject">
            <input type="input" style="display: none;" name="reply_id" value="<?= $row["id"] ?>">
            <input type="input" style="display: none;" name="user_id" value="<?= $_COOKIE["member_id"] ?>">
            <input name='ok' type='submit' value='提交留言'/>
        </form>
            <?php else: ?>
            <span>請先 <a href="login.php">登入</a> 才能留言喔！</span>
        <?php endif;?>
    

    </div>
<?php endwhile; ?>


</body>

