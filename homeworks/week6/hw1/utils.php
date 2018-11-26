<?php
  function printMessage($msg, $redirect) {
    echo '<script>';
    echo "alert('" . htmlentities($msg, ENT_QUOTES) . "');";
    echo "window.location = '" . $redirect ."'";
    echo '</script>';
  }

  function escape($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'utf-8');
  }

  function setToken($conn, $username) {
    $token = uniqid();
    $sql = "DELETE FROM hi101072645_certificates where username='$username'";
    $conn->query($sql);
    $sql = "INSERT INTO hi101072645_certificates(username, token) VALUES('$username', '$token')";
    $conn->query($sql);
    setcookie("token", $token, time()+3600*24);
  } 
  function getUserByToken($conn, $token) {
    if (isset($token) && !empty($token)) {
      $sql = "SELECT * from hi101072645_certificates where token='$token'";
      $result = $conn->query($sql);
      if (!$result || $result->num_rows <= 0) {
        return null;
      }
      $row = $result->fetch_assoc();
      return $row['username'];
    } else {
      return null;
    }
  }
  function renderDeleteBtn($id) {
    return "
      <form method='POST' action='delete.php'>
        <input type='hidden' name='comment_id' value='$id' />
        <input type='submit'class='btn btn-outline-danger btn-sm' value='刪除留言' />
      </form>
    ";
  }
  function renderEditBtn($id) {
    return "
      <form method='GET' action='edit.php'>
        <input type='hidden' name='comment_id' value='$id' />
        <input type='submit'class='btn btn-outline-info btn-sm' value='編輯留言' />
      </form>
    ";
  }
?>