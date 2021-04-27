<?php
require "header.php";
$user_id = $_POST['user_id'];
$sql = 'SELECT * FROM users where id = :id AND deleteflag = 0';
$stmt = $db->prepare($sql);
$stmt->execute([':id' => $user_id]);
$u_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<form action="user_delete.php" method="POST">
<div align="center">
<h1>ユーザー削除確認</h1>
<label for="user_name">ユーザーID：</label>
<?php foreach ($u_list as $value){?>
<input type="text" name="user_id" id="user_id" value="<?= $value['id'] ?>" readonly><br>
<label for="user_name">ユーザー名：</label>
<input type="text" name="user_name" id="user_name" value="<?= $value['name'] ?>" readonly><br>
<label for="password">PW：</label>
<input type="text" name="password" id="password" value="<?= $value['password'] ?>" readonly><br>
<label for="admin">管理者：</label>
<input type="text" name="admin" value="<?= $value['admin_flag'] == 1 ? '管理者' : '一般'?>" readonly><br>
<?php }?>
</div>
<div align="right">
<input type="submit" value="削除">
</div>
</form>
<br>
<div align="right">
<form action="user_list.php" method="POST">
<input type="submit" value="戻る">
</form>
</div>