<?php
require "header.php";
$user_id = $_POST['user_id'];
$user_name = $_POST['user_name'];
$password = $_POST['password'];
$admin = $_POST['admin'];
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
			<input type="text" name="passwordconfirm" id="passwordconfirm"><br>
			<?php echo $error_pw?><br>
			<label for="admin">管理者</label>
			<input type="text" name="admin" value="<?=$admin == 1 ? '管理者' : '一般'?>" readonly>
			<input type="hidden" name="admin" value="<?=$admin ?>">
			<?php //if ($admin == 1){?>
			<!-- <input type="checkbox" name="admin" checked> -->
			<!-- <input type= "hidden" name="admin_flag" value="<?=$admin = 1?>" >-->
			<?php //}else {?>
			<!-- <input type= "checkbox" name="admin">-->
			<!--<input type= "hidden" name="admin_flag" value="<?=$admin = 0?>" >-->
			<?php //}?><br>
	</div>
	<div align="right">
		<input type="submit" value="確認">
	</div>
	</form>