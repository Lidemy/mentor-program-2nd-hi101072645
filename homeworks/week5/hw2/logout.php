<?php

setcookie('nickname', '',time()-+3600*24);
setcookie('member_id', '',time()-+3600*24);
header('Location: ./index.php');

?>