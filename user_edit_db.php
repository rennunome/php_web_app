<?php
require 'db_connection.php';
$user_id = $_GET['user_id'];
$password = $_GET['password'];
$admin = $_GET['admin'];

// 登録フラグを設定
// $register_check = $_SESSION["OK"];

if($admin == 0) {
    $sql = "UPDATE users SET password = :password, admin_flag = 0, updated_at = current_timestamp() WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->execute([':id' => $user_id, ':password' => password_hash($password, PASSWORD_DEFAULT)]);
}
else{
    $sql = "UPDATE users SET password = :password, admin_flag = 1, updated_at = current_timestamp() WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->execute([':id' => $user_id, ':password' => password_hash($password, PASSWORD_DEFAULT)]);
}
header('Location: http://localhost/FirstPhp/user_list.php');
exit();
?>