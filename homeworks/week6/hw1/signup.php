<!DOCTYPE html>
<html lang="en"></html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>註冊帳號溜 _(¦3」∠)</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link href="css.css" rel="stylesheet"/>
</head>
<body>
    <div class="container">
        <form class='login border rounded' method='post' action='register.php'>
            <label>設定帳號:</label>
            <input type='text' name='account' class="form-control form-control-sm" placeholder='請輸入使用者帳號' />
            <label>設定暱稱:</label>
            <input type='text'  class="form-control form-control-sm" name='nickname' placeholder='請輸入使用者帳號'/>
            <label>設定密碼:</label>
            <input type='password' class="form-control form-control-sm"  name='password' placeholder='請輸入使用者密碼'/>
            <label>密碼確認:</label>
            <input type='password' class="form-control form-control-sm"  name='password2' placeholder='再次輸入使用者密碼'/>
            <br>
            <input id='login' type='submit' class="btn btn-primary submit-btn" value='註冊帳號'/>
            <br/>
            <a href="login.php">已有帳號？</a>
        </form>

    </div>
</body>
