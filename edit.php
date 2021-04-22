<?php
require "header.php";

$question_id = $_POST['questions_id'];

$sql = 'SELECT * FROM questions WHERE id = :id';
$stmt = $db->prepare($sql);
$stmt->execute([':id'=> $question_id]);
$question = $stmt->fetch(PDO::FETCH_ASSOC);

$sql = 'SELECT * FROM correct_answers WHERE questions_id = :questions_id';
$stmt = $db->prepare($sql);
$stmt->execute([':questions_id'=>$question_id]);
$answer = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<h2>問題・答え編集画面</h2>
<form action="edit_confirm.php" method="POST">
	<label for="question_id">問題：</label><input type="text" name="question" value="<?=$question['question']?>">
	<input type="hidden" name="questions_id" value="<?=$question['id']?>">
		<label for="answer">答え：</label> <input type="text" name="answer"
			value="<?=$answer['answer']?>">
			<input type="hidden" name="answer_id" value="<?=$answer['id']?>">
			<input type="submit" value="確認">
</form>