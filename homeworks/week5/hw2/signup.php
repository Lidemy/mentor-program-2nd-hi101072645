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
        <form class='login' method='post' action='register.php'>
            <span>設定帳號:</span>
            <input type='text' name='account' placeholder='請輸入使用者帳號' /><br/>
            <span>設定暱稱:</span>
            <input type='text' name='nickname' placeholder='請輸入使用者帳號'/><br/>
            <span>設定密碼:</span>
            <input type='password' name='password' placeholder='請輸入使用者密碼'/><br/><span>密碼確認:</span>
            <input type='password' name='password2' placeholder='再次輸入使用者密碼'/><br/>
            <input id='login' type='submit' value='註冊帳號'/>
            <br/>
            <a href="login.php">已有帳號？</a>
        </form>

    </div>
</body>
