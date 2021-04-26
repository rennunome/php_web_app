<?php
require 'db_connection.php';
$users_id = $_GET['users_id'];
$user_name = $_GET['user_name'];
$total_qs = $_GET['total_qs'];
$total_score = $_GET['total_score'];
$total = $_GET['total'];
$date = $_GET['date'];

$sql = "INSERT INTO histories (user_id, created_at, point) values (:user_id, current_timestamp(), :point)";
$stmt = $db->prepare($sql);
$stmt->execute([':user_id' => $users_id, ':point' => $total_score]);
?>
<div align="right">
		<form action="login.php"  method="post">
			<input type="submit" value="logout">
		</form>
		<form action="index.php"  method="post">
			<input type="submit" value="top">
		</form>
</div>
<h1>テストの結果</h1>
<p><?php
echo $user_name, 'さん';?></p><br>
<p><?php echo $total_qs,'問中、' , $total, '問正解です。';?></p><br>
<p><?php echo $total_score, '点でした。';?></p><br>
<p><?php echo $date;?></p><br>
</body>