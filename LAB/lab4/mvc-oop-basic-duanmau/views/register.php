<?php

  if(isset($_SESSION["msg"])){
    $color=$_SESSION["status"] ? "green" : "red";
    echo"<p style='color:$color'>{$_SESSION['msg']}</p>";
    unset($_SESSION["msg"]);
    unset($_SESSION["status"]);
  }
  ?>
<h1>hay đăng nhập</h1>
<form action="<?=BASE_URL.'?action=check_user'?>" method="post">
    <p>
        <label for="">username</label>
        <input type="text" name="username" id="">
    </p>
    <p>
        <label for="">password</label>
        <input type="text" name="password" id="">
    </p>
    <button type="submit">luu</button>
</form>hihi