<?php
require "header.php";
$sql = 'SELECT * FROM users';
$stmt = $db->prepare($sql);
$stmt->execute();
$u_list = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<div align="center">
		<h1>ユーザー一覧</h1>
		<form action="user_register.php" method="POST">
			<input type="submit" value="新規登録">
		</form>
	</div>
	<!-- user for文 -->
	<?php foreach($u_list as $value){?>
	<div>
		<label for="user_id">ID　　　　　　　　 </label> <label for="auth">権限 　　　　　　　</label>
		 <label for="user_name">ユーザー名</label><br>
		 <input type="text" name="user_id" value="<?= $value['id']; ?>">
		 <input type="text" name="admin" value="<?= $value['admin_flag']  == 1 ? '管理者' : '一般'?>">
		  <input type="text" name="user_name" value="<?= $value['name']; ?>">
		  </div>
	<form action="user_edit" method="POST">
		<input type ="submit" value="編集" >
		<input type="hidden" name="user_id" value="">
		<input type="hidden" name="user_name" value="">
		<input type="hidden" name="admin_flag" value="">
		<input type="hidden" name="password" value="">
	</form>
	<form action="user_delete_confirm}" method="POST">
		<input type="submit" value="削除"> 
		<input type="hidden" name="user_id" value="">
		<input type="hidden" name="user_name" value="">
		<input type="hidden" name="admin_flag" value="">
		<input type="hidden" name="password" value="">
		<?php }?>
	</form>