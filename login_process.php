<?php
session_start();
require 'db_connection.php';

$id = $_POST["id"];
$password = $_POST["password"];

if(isset($_POST['login'])){
    
    // ハッシュを作る
    $hash = password_hash($password, PASSWORD_BCRYPT);
    
    // ユーザIDでSELECTする
    $sql = 'SELECT * FROM users WHERE id = :id';
    $stmt = $db->prepare($sql);
    $stmt->execute([':id'=>$_POST['id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // ユーザがいない
    if(!$user){
        header('Location: http://localhost/FirstPhp/login.php');
        exit();
    }
    
    // パスワードチェック
    if(!password_verify($password, $user["password"])){
        header('Location: http://localhost/FirstPhp/login.php');
        exit();
    }
    
    // ログイン
    // session_regenerate_id(true);
    $_SESSION['login'] = true;
    
    //セッションにidとpasswordを詰める
    $_SESSION["id"]=$id;
    $_SESSION["password"]=$password;
    $_SESSION["admin_flag"]=$user["admin_flag"];
    header('Location: http://localhost/FirstPhp/index.php');
}
?>