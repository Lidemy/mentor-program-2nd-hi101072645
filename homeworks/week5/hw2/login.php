<!DOCTYPE html>
<html lang="en"></html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>留言板登入 _(¦3」∠)</title>
    <link href="css.css" rel="stylesheet"/>
</head>
<body>
    <div class="wrapper">
        <form class='login' method='post'><span>帳號:</span>
            <input type='text' name='account' placeholder='請輸入使用者帳號'/><br/><span>密碼:</span>
            <input type='password' name='password' placeholder='請輸入使用者密碼'/><br/>
            <input id='login' type='submit' value='登 入'/>
            <br/>
            <a href="signup.php">沒有帳號？</a>
            <br/>
            <a href="index.php">算了我也只想看看留言</a>
        </form>

<?php
    require_once __DIR__. '/__connect.php';
    if(isset($_POST['account']) && isset($_POST['password'])){
    $Account = $_POST['account'];
    $password = $_POST['password'];
    $sql = "SELECT*FROM hi101072645_user WHERE account='$Account' AND password='$password'" ;
    $sql2 = $conn->query($sql);
    echo $conn->error;
    if(mysqli_num_rows($sql2) == "")
   
    {
       echo '帳號密碼錯誤喔！'
    }
   else
    {
        $row = $sql2->fetch_assoc();
        echo "<p class='system-info'>哈囉 " . $row['nickname'] . "，登入成功了，沒有到留言板的話請".'<a href="index.php">點我</a></p>';
        setcookie("nickname", $row['nickname'] , time()+3600*24);
        setcookie("member_id", $row['id'] , time()+3600*24);
        header("Refresh: 1; url=./index.php");
    }
}
?>
    </div>
</body>
