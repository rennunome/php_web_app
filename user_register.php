<?php
require "header.php";
$error_un = $_GET['error_un'];
$error_pw = $_GET['error_pw'];
?>
<div align="center">
		<h1>ユーザー新規登録</h1>
		</div>
		<?php echo $error_un?>
		<?php echo $error_pw?>
		<form action="user_process.php" method="GET">
		<label for="user_name">ユーザー名：</label>
		<input type="text" name="user_name" id="user_name" placeholder="半角英数字のみ">
			<br>
		<label for="password">PW：</label> 
		<input type="text" name="password" id="password" placeholder="半角英数字のみ8文字以上"><br>
		<label for="password_confirm">PW確認：</label>
		 <input type="text" name="password_confirm" id="passwordconfirm" placeholder="半角英数字のみ8文字以上"><br>
		  <label for="admin">管理者：</label>
		<input type="checkbox" name="admin"><br>
	<div align="right">
			<input type="submit" value="確認">
	</div>
	</form>
	<br>
	<div align="right">
		<form action="user_list" method="POST">
			<input type="submit" value="戻る">
		</form>
	</div>