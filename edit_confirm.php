<?php
require "header.php";

$question = $_POST['question'];
$answer = $_POST['answer'];
$questions_id = $_POST['questions_id'];
$answer_id = $_POST['answer_id'];
?>
<h2>問題・答え編集確認画面</h2>
<form action="edit_db.php" method="POST">
	<label for="question_id">問題：</label><input type="text" name="question" value="<?=$question?>" readonly/>
		<input type="hidden" name="questions_id" value="<?=$questions_id?>">
		<label for="answer">答え：</label> <input type="text" name="answer"
			value="<?=$answer?>" readonly/>
			<input type="hidden" name="answer_id" value="<?=$answer_id?>">
			<input type="submit" name="update" value="更新">
</form>