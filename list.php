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
<form action= "register.php" method= "post">
<input type= "submit" value="新規登録" >
</form>
</div>
<?php
$sql = 'SELECT * FROM questions';
$stmt = $db->prepare($sql);
$stmt->execute();
$qlist = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($q_list as $value) { ?>
<label for="question_id">問題：<?php var_dump($value['id']);?></label>
    <input type="text" name="question" id="question_id" value="<?php $value["question"]; ?>" />
<?php
}
?>
<?php
$sql = 'SELECT * FROM correct_answers';
$stmt = $db->prepare($sql);
$stmt->execute();
$ca_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($ca_list as $value) { ?>
<label for="answer_id">答え：<?php var_dump($value['id']);?></label>
    <input type="text" name="answer" id="answer_id" value="<?php $value["answer"]; ?>" />
<?php
}
?>
</body>
</html>