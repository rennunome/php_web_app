<?php 
require "header.php";

$sql = 'SELECT * FROM histories where user_id = :user_id';
$stmt = $db->prepare($sql);
$stmt->execute([':user_id' => $_SESSION['id']]);
$h_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<div align="center">
<h1>テスト採点結果の履歴一覧</h1>
</div>
<?php 
foreach ($h_list as $value) {
?>
<table border="1">
<tr>
<th>氏名</th>
<th>得点</th>
<th>採点時間</th>
<tr>
<td><?php echo $_SESSION['name'], 'さん';?></td>
<td><?php echo $value['point'], '点';?></td>
<td><?php echo $value['created_at'];?></td>
</tr>
</table>
<?php }?>