<!DOCTYPE html>
<html lang="en"></html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>留言板登入 _(¦3」∠)</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link href="css.css" rel="stylesheet"/>
</head>
<body>
    <div class="container">
<?php
    if(!empty($_COOKIE['session_id'])){
        echo "<div class='alert alert-secondar' role='alert'>您已登入，可直接<a class='btn btn-primary btn-small' href='index.php'>使用留言板</a>，或者您想 <a class='btn btn-light btn-small' href='logout.php'>登出</a> ";
    }
    else
    {
?>
        <form class="login border rounded" method='post'>
            <label>帳號</label>
            <input type='text' name='account' class="form-control form-control-sm" placeholder='請輸入使用者帳號'/>
            <br/>
            <span>密碼</span>
            <input type='password' name='password' class="form-control form-control-sm" placeholder='請輸入使用者密碼'/><br/>
            <input  id='login' type='submit' class="btn btn-primary submit-btn"  value='登 入'/>
            <br/>
            <a href="signup.php">沒有帳號？</a>
            <br/>
            <a href="index.php">算了我也只想看看留言</a>
        </form>
        <br>


<?php
    }
session_start();
require_once('__connect.php');
require_once('utils.php');
if(isset($_POST['account']) && 
    isset($_POST['password']) && 
    !empty($_POST['account']) && 
    !empty($_POST['password'])
){
    $Account = $_POST['account'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * from hi101072645_user where account=?");
    $stmt->bind_param("s", $Account);
    if (!$stmt->execute()) {
        echo $conn->error;
        exit();
    }
    $result = $stmt->get_result();

    if(mysqli_num_rows($result) == ""){
       echo "<div class='alert alert-danger' role='alert'>帳號密碼有錯耶！Σ(ﾟДﾟ；≡；ﾟдﾟ)</div>";
    }
    else
    {   
        $row = $result->fetch_assoc();
        if(password_verify($password,$row["password"])){
            $session_id = password_hash($row['id'],PASSWORD_DEFAULT);
            $account = $row['account'];

            $_SESSION['account'] = $account;
            echo "<div class='alert alert-success' role='alert'>哈囉 <i><b>" . htmlspecialchars($row['nickname']) . "</b></i>，登入成功了，沒有到留言板的話請".'<a href="index.php">點我</a></div>';
            header("Refresh: 1; url=./index.php");
        }
        else
        {
            echo "<div class='alert alert-danger' role='alert'>帳號密碼有錯耶！Σ(*ﾟдﾟﾉ)ﾉ</div>";
        }
        
    }
}
?>
    </div>
</body>
