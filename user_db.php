<?php
session_start();
require 'db_connection.php';
$user_name = $_GET['user_name'];
$password = $_GET['password'];
$admin = $_GET['admin'];

// 登録フラグを設定
// $register_check = $_SESSION["OK"];

if($admin == null) {
    $admin_flag = 0;
    $sql = "INSERT INTO users (name, password, admin_flag) VALUES (:name, :password, :admin_flag)";
    $stmt = $db->prepare($sql);
    $stmt->execute([':name' => $user_name, ':password' => password_hash($password, PASSWORD_DEFAULT), ':admin_flag' => $admin_flag]);
}
else{
    $admin_flag = 1;
    $sql = "INSERT INTO users (name, password, admin_flag) VALUES (:name, :password, :admin_flag)";
    $stmt = $db->prepare($sql);
    $stmt->execute([':name' => $user_name, ':password' => password_hash($password, PASSWORD_DEFAULT), ':admin_flag' => $admin_flag]);
}
header('Location: http://localhost/FirstPhp/user_list.php');
exit();
?>