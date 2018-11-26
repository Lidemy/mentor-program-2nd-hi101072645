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
<div class="container">
<?php
    require_once('__connect.php');

    $account = $_POST['account'];
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $password2 = $_POST['password2'];
    $nickname= $_POST['nickname'];
    

    $sql = "INSERT INTO hi101072645_user (account, password, nickname) VALUES ('$account', '$password', '$nickname') ";
    if(password_verify($password2,$password)){
        if(  !$conn->query($sql)){
            echo "<div class='alert alert-danger' role='alert'>帳號重複了喔！！換一個吧！沒有回到註冊頁的話請點 <a href='signup.php'>這裡</a></div>";
            header("Refresh: 3; url=./signup.php");
        }else{
            echo "<div class='alert alert-success' role='alert'>哈囉 " . htmlspecialchars($nickname) . "，註冊成功了，若沒跳轉請".'<a href="login.php">點我登入</a></div>';
        
            header("Refresh: 2; url=./login.php");
        }
    }else{
        echo "<div class='alert alert-danger' role='alert'>密碼不相符！沒有回到註冊頁的話請點 <a href='signup.php'>這裡</a></div>";
        header("Refresh: 1; url=./signup.php");
    }
    

?>
</div>
</body>