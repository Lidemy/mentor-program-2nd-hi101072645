<?php


    require_once('__connect.php');

    $account = $_POST['account'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $nickname= $_POST['nickname'];
    

    $sql = "INSERT INTO hi101072645_user (account, password, nickname) VALUES ('$account', '$password', '$nickname') ";
    if($password==$password2){
        if(  !$conn->query($sql)){
            echo "<div class='info-board' style='color:red; text-align:center;'>帳號重複了喔！！換一個吧！沒有回到註冊頁的話請點 <a href='signup.php'>這裡</a></div>";
            header("Refresh: 3; url=./signup.php");
        }else{
            
            echo "<p class='system-info'>哈囉 " . $row['nickname'] . "，登入成功了，沒有到留言板的話請".'<a href="login.php">點我登入</a></p>';
        
            header("Refresh: 1; url=./login.php");
        }
    }else{
        echo "<div class='info-board' style='color:red;text-align:center;'>密碼不相符！沒有回到註冊頁的話請點 <a href='signup.php'>這裡</a></div>";
        header("Refresh: 1; url=./signup.php");
    }
    

?>