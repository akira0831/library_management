<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="../view/login.css">
<title>ログイン画面</title>
</head>

<body class="b">

  <div class="lg">
  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
    <div class="lg_top">
    </div>

    <div class="lg_main">
      <div class="lg_m_1">
        <input name="fname" type="text" class="ur"
        <?php
        if(isset($fname) && ($fname !=="")) {
        ?>
        value ="<?php echo $fname;?>"
        <?php
        }
        ?>
        >

        <input name="password" type="password" class="pw"
        <?php
        if(isset($password) && ($password!=="")) {
        ?>
        value ="<?php echo $password;?>"
        <?php
        }
        ?>
        >
        <div class="pw2">
          <?php
          if(isset($fname_error_message) && ($fname_error_message != "")) {
            echo "<p>".$fname_error_message."</p>";
          }
          ?>
          <?php
          if(isset($password_error_message) && ($password_error_message != "")) {
            echo "<p>".$password_error_message."</p>";
          }
          ?>
        </div>

      </div>
    </div>


    <div class="lg_foot">
      <input type="submit" value="Login" class="bn">
    </div>

  </form>
  </div>
</body>
</html>
