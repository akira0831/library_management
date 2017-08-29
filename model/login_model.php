<?php

    //名前のチェック
    $fname = "";
    $fname_check = false;
    $fname_error_message ="";
    $file_name = $_POST["fname"];


    //接続
    $conn = new mysqli('localhost','root', 'sfcsfc11',"new_schema_yao");
    //接続検査
    echo $conn->connect_error;
    if ($conn->connect_error) {
		    die("接続に失敗: " . $conn->connect_error);
		}

    $db_exists = false;
    $sql = "SELECT * FROM new_table_yao WHERE username='{$fname}'";
    $result = $conn -> query($sql);

    if($result && $result->num_rows > 0){
      $db_exists = true;
    }


    //名前の変数がセットされていること、ヌルでないことを検査する。
    if(isset($_POST["fname"]) && ($_POST["fname"] == "")){
      $fname_error_message = "ユーザ名を入力してください。"."<br>";
    } else {
    //文字列の長さは４以上、１０以下の場合 、入力した名前を出力する。
      if( (strlen($_POST["fname"]) > 3)
        && (strlen($_POST["fname"]) < 11 )){
        $fname = $_POST["fname"];
        $fname_check = true;
      //それ以外の場合、エラーメッセージを出力させる。
      } else {
          $fname_error_message = "ユーザ名は4文字〜10文字まで。";
      }
    }
    //パスワードのチェック
    $password = "";
    $password_check = false;
    $password_error_message = "";
    if(isset($_POST["password"]) && ($_POST["password"] == "")){

      //接続
      // $conn = new mysqli('localhost','root', 'sfcsfc11',"new_schema_yao");
      // // 接続検査
      // echo $conn->connect_error;
      // if ($conn->connect_error) {
  		//     die("接続に失敗: " . $conn->connect_error);
  		// }
      // $sql = "SELECT * FROM users WHERE username='{$fname}'";
      // $result = $conn -> query($sql);
      // if($result && $result->num_rows > 0){
      //   $db_exists = true;
      // }



        $password_error_message = "パスワードを入力してください。"."<br/>";
    } else {
      //10桁か１１桁に入力してください。
      if((strlen($_POST["password"]) == 10)
          || (strlen($_POST["password"]) == 11)){
          $password = $_POST["password"];
          $password_check = true;
      } else {
          $password_error_message = "正しいパスワードを入力してください。";
      }
    }

    $validation_result = false;
    if($fname_error_message == ""
        && $password_error_message == ""){
          $validation_result = true;
    }


    // $file_result = false;
    // if($validation_result) {
    //   $file_result = true;
    // } else {
    //     $file_error_message = "can not open file";
    //     $file_result = false;
    // }

    $result = false;
    if($validation_result) {
      $sql = "SELECT * FROM new_table_yao WHERE user_name='{$fname}' AND password={$password}";
      // print($sql);
      // exit();
      $result = $conn->query($sql);

      if($result && $result->num_rows == 1) {
        $login_ok = true;
  			echo "hello";
      } else {
        echo "not correct";

      }
    }
       $conn->close();
       exit();
?>
