<?php
session_start();
//ファイルの読み込み
require 'header.php';
// require 'user_entity.php';
//POSTでidとpasswordを取得
$id = $_POST["id"];
$password = $_POST["password"];

// ハッシュを作る
$hash = password_hash($password, PASSWORD_BCRYPT);

// ユーザIDでSELECTする
$sql = 'SELECT * FROM users WHERE id = :id';
$stmt = $db->prepare($sql);
$stmt->execute([':id'=>$_POST['id']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// ユーザがいない
if(!$user){
    echo 'ユーザ名かパスワードが正しくありません。';
}

// パスワードチェック
if(!password_verify($password, $user["password"])){
    echo 'ユーザ名かパスワードが正しくありません。';
}

// ログイン
// session_regenerate_id(true);
$_SESSION['login'] = true;

//セッションにidとpasswordを詰める
$_SESSION["id"]=$id;
$_SESSION["password"]=$password;
$_SESSION["admin_flag"]=$user["admin_flag"];
?>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>Top</title>
</head>
<body>
		<div align="center">
		<?php 
		if ($_SESSION["admin_flag"] == 1) { 
		?>
		<form action="list.php"  method="post">
			<input type="submit" value="問題と答えを確認・登録する ＞ ">
			</form>
			<form action="test.php"  method="post">
			<input type="submit" value="テストをする ＞">
			</form>
			<form action="history.php"  method="post">
			<input type="submit" value="過去の採点結果をみる ＞">
			</form>
			<form action="user_list.php"  method="post">
			<input type="submit" value="ユーザを追加・編集する＞">
			</form>
		<?php
		} else {
		?>
			<form action="test.php"  method="post">
			<input type="submit" value="テストをする ＞">
			</form>
			<br>
			<form action="history.php"  method="post">
			<input type="submit" value="過去の採点結果をみる ＞" >
			</form>
			<br>
			<form action="userlist.php"  method="post">
			<input type="submit" value="ユーザを追加・編集する＞">
			</form>
		<?php
		} 
		?>
		</div>
</body>
</html>