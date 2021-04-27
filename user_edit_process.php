<?php
require 'db_connection.php';
$user_name = $_POST['user_name'];
$user_id = $_POST['user_id'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];
$admin = $_POST['admin'];
//入力値に対してのバリデーション
//PWが8文字以上、半角英数字入力ではない場合
if ($password == null && strlen($password) < 8 || !preg_match("/^[a-zA-Z0-9]+$/", $password)){
    $error_pw = "パスワードは半角英数字・8文字以上で入力してください。";
    header('Location: http://localhost/FirstPhp/user_edit.php?user_name='.$user_name.'&user_id='.$user_id.'&password='.$password.'&admin='.$admin.'&error_pw='.$error_pw.'');
    exit();
}
if ($password != $password_confirm) {
    $error_pw = "パスワードとパスワード（確認）は一致する必要があります。";
    header('Location: http://localhost/FirstPhp/user_edit.php?user_name='.$user_name.'&user_id='.$user_id.'&password='.$password.'&admin='.$admin.'&error_pw='.$error_pw.'');
    exit();
}
header('Location: http://localhost/FirstPhp/user_edit_confirm.php?user_id='.$user_id.'&password='.$password.'&admin='.$admin.'&password_confirm='.$password_confirm.'&user_name='.$user_name.'');
exit();
?>