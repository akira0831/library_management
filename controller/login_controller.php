<?php
    //POSTによって要求された場合
    if($_SERVER['REQUEST_METHOD'] == "POST") {
      include_once("../model/login_model.php");

      //ログインに成功した場合、登録情報を反映させる。
      if($file_result){
          include_once("../view/login_result.php");

      } else {
          include_once("../view/login_form.php");
      }

    } else {
        include_once("../view/login_form.php");
    }
?>
