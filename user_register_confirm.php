<?php
require "header.php";
$user_name = $_GET['user_name'];
$password = $_GET['password'];
$password_confirm = $_GET['password_confirm'];
$admin = $_GET['admin'];

if($admin != 'on'){
    $admin == 'off';
}
?>
<form action="user_db.php" method="GET">
	<div align="center">
		<h1>ユーザー新規登録内容確認</h1>
			<label for="user_name">ユーザー名：</label>
			<input type="text" name="user_name" id="user_name" value="<?= $user_name ?>" readonly><br>
			<label for="password">PW：</label>
			<input type="text" name="password" id="password" value="<?= $password ?>" readonly><br>
			<label for="passwordconfirm">PW確認：</label>
			<input type="text" name="passwordconfirm" id="passwordconfirm" value="<?= $password_confirm ?>" readonly><br>
			<label for="admin">管理者：</label>
			<input type="text" name="admin" value="<?= $admin != "on" ? 'なし' : 'あり' ?>" readonly>
			<input type="text" name="admin" value="<?= $admin ?>"><br>
	</div>
	<div align="right">
		<input type="submit" value="登録">
	</div>
	</form>
	<br>
	<div align="right">
		<form action="user_register.php" method="POST">
			<input type="submit" value="戻る">
		</form>
	</div>