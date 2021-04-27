<?php
require 'db_connection.php';
$user_name = $_GET['user_name'];
$password = $_GET['password'];
$password_confirm = $_GET['password_confirm'];
$admin = $_GET['admin'];
//入力値に対してのバリデーション
//ユーザー名のみが半角英数字入力ではない場合
if ($user_name == null && !preg_match("/^[a-zA-Z0-9]+$/", $user_name)) {
    $error_un = "ユーザー名は半角英数字で入力してください。";
    header('Location: http://localhost/FirstPhp/user_register.php?error_un='.$error_un.'');
    exit();
}
//PWが8文字以上、半角英数字入力ではない場合
if ($password == null && strlen($password) < 8 || !preg_match("/^[a-zA-Z0-9]+$/", $password)){
    $error_pw = "パスワードは半角英数字・8文字以上で入力してください。";
    header('Location: http://localhost/FirstPhp/user_register.php?error_pw='.$error_pw.'');
    exit();
}
if ($password != $password_confirm) {
    $error_pw = "パスワードとパスワード（確認）は一致する必要があります。";
    header('Location: http://localhost/FirstPhp/user_register.php?error_pw='.$error_pw.'');
    exit();
}

header('Location: http://localhost/FirstPhp/user_register_confirm.php?user_name='.$user_name.'&password='.$password.'&admin='.$admin.'&password_confirm='.$password_confirm.'');
exit();