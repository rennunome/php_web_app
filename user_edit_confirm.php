<?php
require "header.php";
$user_id = $_GET['user_id'];
$user_name = $_GET['user_name'];
$password = $_GET['password'];
$password_confirm = $_GET['password_confirm'];
$admin = $_GET['admin'];
?>
<form action="user_edit_db.php" method="GET">
	<div align="center">
		<h1>ユーザー編集確認</h1>
			<label for="user_name">ユーザーID：</label>
			<input type="text" name="user_id" id="user_id" value="<?=$user_id ?>" readonly><br>
			<label for="user_name">ユーザー名：</label>
			<input type="text" name="user_name" id="user_name" value="<?=$user_name ?>" readonly><br>
			<label for="password">PW：</label>
			<input type="text" name="password" id="password" value="<?=$password ?>"><br>
			<label for="passwordconfirm">PW確認：</label>
			<input type="text" name="password_confirm" id="password_confirm" value="<?=$password_confirm ?>"><br>
			<label for="admin">管理者</label>
			<?php if ($admin == null){?>
			<input type="checkbox" name="admin">
			<?php }else {?>
			<input type= "checkbox" name="admin" checked>
			<?php }?><br>
	</div>
	<div align="right">
		<input type="submit" value="更新">
	</div>
	</form>
<div align="right">
	<form action="user_edit.php" method="GET">
		<input type="submit" value="戻る" />
		<input type="hidden" name= "user_id" value="<?=$user_id ?>" />
		<input type="hidden" name= "user_name" value="<?=$user_name ?>" />
		<input type="hidden" name= "admin" />
	</form>
</div>