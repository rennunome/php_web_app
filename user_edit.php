<?php
require "header.php";
$user_id = $_GET['user_id'];
$user_name = $_GET['user_name'];
$password = $_GET['password'];
$admin = $_GET['admin'];
$error_pw = $_GET['error_pw'];
?>
<form action="user_edit_process.php" method="POST">
	<div align="center">
		<h1>ユーザー編集</h1>
			<label for="user_name">ユーザーID：</label>
			<input type="text" name="user_id" id="user_id" value="<?=$user_id ?>" readonly><br>
			<label for="user_name">ユーザー名：</label>
			<input type="text" name="user_name" id="user_name" value="<?=$user_name ?>" readonly><br>
			<label for="password">PW：</label>
			<input type="text" name="password" id="password" value="<?=$password ?>"><br>
			<label for="passwordconfirm">PW確認：</label>
			<input type="text" name="password_confirm" id="password_confirm"><br>
			<?php echo $error_pw?><br>
			<label for="admin">管理者</label>
			<?php if ($admin == 1){?>
			<input type="checkbox" name="admin" checked>
			<?php }else {?>
			<input type= "checkbox" name="admin">
			<?php }?><br>
	</div>
	<div align="right">
		<input type="submit" value="確認">
	</div>
	</form>
<div align="right">
	<form action="user_list.php" method="post">
		<input type="submit" value="戻る" />
	</form>
</div>