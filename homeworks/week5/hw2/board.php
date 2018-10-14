<?php
require_once __DIR__. '/__connect.php';
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
// require __DIR__. '/add.php';

?>

<?php
require __DIR__. '/login.php';
?> 
<?php
$sql = "SELECT * FROM comments WHERE `reply_id`=0 ORDER BY created_at  DESC LIMIT 3";
$result = $conn->query($sql);
echo $conn->error;
while( $row = $result->fetch_assoc() ):
$id =$row["id"] ;
?>
  <div class="message">
    <div class="main-message" id="msg<?= $row["id"] ?>">
        <h3 class="theme">
          <?= $row["subject"] ?>
        </h3>
        <div class="user"><img src="https://picsum.photos/60/60" alt=""/><span class="user-nickname"><?= $row["user_id"] ?></span></div>
        <div class="content"><?= $row["content"]?></div><span class="time"><?= $row["created_at"] ?></span>
      </div>
      <?php 
      $sql_reply = "SELECT * FROM comments WHERE `reply_id`=$id ORDER BY created_at";
      $result_reply = $conn->query($sql_reply);
      while( $row_reply = $result_reply->fetch_assoc() ):
      ?>
      <div class="sub-message">
        <div class="user"><img src="https://picsum.photos/60/60" alt=""/><span class="user-nickname"><?= $row_reply["user_id"] ?></span></div>
        <div class="content"><?= $row_reply["content"];?></div>
        <span class="time"><?= $row_reply["created_at"] ?></span>
      </div>
      <?php endwhile; ?>
      <!-- <form class="reply-message" action="add.php" method="post">
        <div class="user"><img src="https://picsum.photos/60/60" alt=""/><span class="user-nickname"></span></div>
        <textarea name="news-content" type="textarea"></textarea>
        <input name="ok" type="submit" value="提交留言"/>
      </form> -->

    </div>
<?php endwhile; ?>


    <div class="message">
      <div class="main-message">
        <h3 class="theme">留言主旨</h3>
        <div class="user"><img src="https://picsum.photos/60/60" alt=""/><span class="user-nickname">主要留言暱稱</span></div>
        <div class="content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis, vero dolorem mollitia saepe, quaerat ut fugiat ea minima nostrum autem doloribus in delectus, sit nemo!</div><span class="time">2018-10-3 14:25</span>
      </div>
      <div class="sub-message">
        <div class="user"><img src="https://picsum.photos/60/60" alt=""/><span class="user-nickname">主要留言暱稱</span></div>
        <div class="content">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis, vero dolorem mollitia saepe, quaerat ut fugiat ea minima nostrum autem doloribus in delectus, sit nemo!</div><span class="time">2018-10-3 14:25</span>
      </div>
      <form class="reply-message" action="reply_add.php" method="post">
        <div class="user"><img src="https://picsum.photos/60/60" alt=""/><span class="user-nickname">次要留言暱稱</span></div>
        <textarea name="news-content" type="textarea"></textarea>

        <input name="ok" type="submit" value="提交留言"/>
      </form>
    </div>
  </div>

</body>

