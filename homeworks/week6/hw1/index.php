<?php
    include_once('check_login.php');
    include_once('__connect.php');
    include_once('utils.php');

?>
<!DOCTYPE html>
<html lang="en"></html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>留言板練習 _(¦3」∠)</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link href="css.css" rel="stylesheet"/>
   
</head>
<body>

  

<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">今天有什麼想說的嗎？(๑•̀ω•́)ノ</h1>
        <hr class="my-4">
<?php
    if (!$user){
    ?>  
        <p class="lead">歡迎，路過的朋友！不知道是哪陣風把你吹來的，想留言的話請先 <a class="btn btn-info btn-sm" href="login.php">登入</a> or <a class="btn btn-warning btn-sm" href="signup.php">註冊</a> 唷！</p></div>
    <?php
    }else{
        $sql = "
            SELECT id, nickname FROM hi101072645_user WHERE account = '$user'
        ";
        $result = $conn->query($sql);
        $row_user = $result->fetch_assoc();
        echo "<p class='lead'>哈囉， ". htmlspecialchars($row_user['nickname']) . '  '. "，留完言或許你準備 <a class='btn btn-light btn-small' href='logout.php'>登出</a></p></div>";
?>  
    </div>

     <div class="container">
        <h2>有想說的話？</h2>
        <form class="new-post" method="post"  action='add.php'>
            <div class="new-user">
            <span name="nickname"><?= htmlspecialchars($row_user['nickname']) ?>
            </span>
            </div>
            <div class="new-content"><label>主旨：</label>
            <input class="subject form-control " name="subject" type="text"/><br/><span>內容：</span>
            <textarea class="form-control content" name="content" type="textarea"></textarea><br/>
            <input type="input" style="display: none;" name="reply_id" value="0">
            <input type="input" style="display: none;" name="user_id" value="<?= $row_user['id'] ?>">
            </div>
            <br>
            <input class="btn btn-primary submit-btn" name="ok" type="submit" value="提交留言"/>
        </form>
    </div>
<?php
}
?> 
    
</div>
<br/>
<?php
    $page = 1;
    if (isset($_GET['page']) && !empty($_GET['page'])) {
        $page = (int) $_GET['page'];
    }
    $size = 4;  
    $start = $size * ($page - 1);
    $sql = "
        SELECT c.id as commentId, c.content, c.created_at, c.user_id, u.id, c.subject ,u.nickname,u.account
        FROM hi101072645_comments as c
        LEFT JOIN hi101072645_user as u ON c.user_id = u.id
        WHERE c.reply_id = 0
        ORDER BY c.created_at DESC
        LIMIT ?, ?
    ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $start, $size);
    $is_success = $stmt->execute();
    $result = $stmt->get_result();
?>
<?php
    $count_sql = "
        SELECT count(*) as count
        FROM hi101072645_comments 
        WHERE reply_id=0
    ";
    $stmt_conut = $conn->prepare($count_sql);
    $is_count_success = $stmt_conut->execute();
    $count_result = $stmt_conut->get_result();
    if ($is_count_success && $count_result->num_rows > 0) {
        $count = $count_result->fetch_assoc()['count'];
        $total_page = ceil($count / $size);
        echo "<nav aria-label='Page navigation example'><ul class='pagination justify-content-center'><li class='page-item disabled'>
        <a class='page-link' href='#' tabindex='-1'>頁次</a>
    </li>";
        for($i=1; $i<=$total_page; $i++) {
        echo "<li class='page-item'><a class='page-link' href='./index.php?page=$i'>$i</a></li>";
        }
        echo '</ul></nav>';
    }
?>
  <div class="container">
    
<?php
    if ($is_success) {
        while($row = $result->fetch_assoc()) {
?>
    <div class="message">
        <div class="main-message" id="msg<?= $row["commentId"] ?>">
            <h3 class="theme"><?= escape($row["subject"]) ?></h3>
            <div class="user">
                <span class="user-nickname"><?= escape($row["nickname"]) ?></span>
            </div>
            <div class="content"><?= escape($row["content"])?></div>
            <div class="edit">
              <span class="time"><?= $row["created_at"] ?></span>
                <?php
                    if ($user == $row['account']) {
                        echo renderEditBtn($row['commentId']);
                        echo renderDeleteBtn($row['commentId']);
                    }
                ?>
            </div>
        </div>

         <?php
            $reply_id = $row['commentId'];
            $sql_sub = "
                SELECT c.id as commentId, c.content, c.created_at, c.user_id, u.id, u.nickname,u.account,c.reply_id
                FROM hi101072645_comments as c
                LEFT JOIN hi101072645_user as u ON c.user_id = u.id
                WHERE c.reply_id = ?
                ORDER BY c.id DESC
            ";
            $stmt_sub = $conn->prepare($sql_sub);
            $stmt_sub->bind_param("i", $reply_id);
            $is_sub_success = $stmt_sub->execute();
            $result_sub = $stmt_sub->get_result();
            if ($is_sub_success) {
                while($row_sub = $result_sub->fetch_assoc()) {
                    if($row_sub["account"] == $row["account"]){
        ?>
                        <div class="sub-message floor_master">
                    <?php
                    }else{
                    ?>
                        <div class="sub-message">
                    <?php
                    }
                    ?>
            <div class="user">
                <span class="user-nickname"><?= escape($row_sub["nickname"]) ?></span>
            </div>
            <div class="content"><?= escape($row_sub["content"])?></div>
            <div class="edit">
              <span class="time"><?= $row_sub["created_at"] ?></span>
                <?php
                    if ($user == $row_sub['account']) {
                        echo renderEditBtn($row_sub['commentId']);
                        echo renderDeleteBtn($row_sub['commentId']);
                    }
                ?>
            </div>
        </div>
        <?php
        }
        }
        ?>   
        <?php if($user):?>
        <form class='reply-message' action='add.php' method='post'>
            <div class='user'>
                <span class='user-nickname'><?= escape( $row_user["nickname"]) ?></span>
            </div>
            <textarea name='content' type='textarea'></textarea>
            <input type="input" style="display: none;" name="subject">
            <input type="input" style="display: none;" name="reply_id" value="<?= $reply_id ?>">
            <input type="input" style="display: none;" name="user_id" value="<?= $row_user["id"] ?>">
            <input name='ok' type='submit' class="btn btn-primary submit-btn" value='提交留言'/>

        </form>
            <?php else: ?>
            <p>想回應留言？請先 <a href="login.php">登入</a> 才能發表評論喔！</p>
        <?php endif;?>
    </div>
<?php 
};
}
?>
<?php
    $count_sql = "
        SELECT count(*) as count 
        FROM hi101072645_comments 
        WHERE reply_id=0
    ";
    $stmt_conut = $conn->prepare($count_sql);
    $is_count_success = $stmt_conut->execute();
    $count_result = $stmt_conut->get_result();
    if ($is_count_success && $count_result->num_rows > 0) {
        $count = $count_result->fetch_assoc()['count'];
        $total_page = ceil($count / $size);
        echo "<nav aria-label='Page navigation example'><ul class='pagination justify-content-center'><li class='page-item disabled'>
        <a class='page-link' href='#' tabindex='-1'>頁次</a>
    </li>";
        for($i=1; $i<=$total_page; $i++) {
        echo "<li class='page-item'><a class='page-link' href='./index.php?page=$i'>$i</a></li>";
        }
        echo '</ul></nav>';
    }
?>
</div>
<div class="footer container-fluid">
    含辛茹苦手刻的程式導師實驗計畫第二期作業 by 李阿昕
</div>



</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
