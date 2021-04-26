<?php
require 'db_connection.php';
$user_name = $_GET['user_name'];
$total_qs = $_GET['total_qs'];
$total_score = $_GET['total_score'];
$total = $_GET['total'];
$date = $_GET['date'];
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