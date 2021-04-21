<?php
require "header.php";
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>List</title>
<body>
	<div align="center">
		<form action="register.php" method="post">
			<input type="submit" value="新規登録" />
		</form>
	</div>
<?php
$sql = 'SELECT * FROM questions';
$stmt = $db->prepare($sql);
$stmt->execute();
$q_list = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sql = 'SELECT * FROM correct_answers';
$stmt = $db->prepare($sql);
$stmt->execute();
$ca_list = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($q_list as $q_value) {
    ?>
<label for="question_id">問題：<?= $q_value['id'] ?></label>
	<input type="text" name="question" id="question_id"
		value="<?= $q_value["question"]; ?>" />
<?php		
foreach ($ca_list as $ca_value) {
        if ($ca_value['questions_id'] == $q_value['id']) {
            ?>
<label for="answer_id">答え：<?= $ca_value['id'] ?></label>
	<input type="text" name="answer[]"
		value="<?= $ca_value["answer"]; ?>" />
<?php
}
?>
<?php
}
?>
	<form action="edit.php" method="post">
		<input type="hidden" name="questions_id"
			value="<?= $ca_value["questions_id"]; ?>" /> <input type="submit" value="編集" />
	</form>
	<form action="delete_confirm.php" method="post">
		<input type="hidden" name="questions_id"
			value="<?= $ca_value["questions_id"]; ?>" /> <input type="submit" value="削除" />
	</form>
<?php
}
?>

</body>
</html>