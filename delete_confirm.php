<?php
require "header.php";

$question_id = $_POST['questions_id'];

$sql = 'SELECT * FROM questions WHERE id = :id';
$stmt = $db->prepare($sql);
$stmt->execute([':id'=>$_POST['questions_id']]);
$question = $stmt->fetch(PDO::FETCH_ASSOC);

$sql = 'SELECT * FROM correct_answers WHERE questions_id = :questions_id';
$stmt = $db->prepare($sql);
$stmt->execute([':questions_id'=>$_POST['questions_id']]);
$answer = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<form action="delete.php" method="POST">
	<label for="question_id">問題：</label> <input type= "text" name= "question" value ="<?= $question["question"]?>">
	 <input type= "hidden" name= "questions_id" value ="<?= $question["id"]?>">
	 <input type= "hidden" name= "answer_id" value ="<?= $answer["id"]?>">
	 <br>
	<label for="answer_id">答え：</label>
	 <input type= "text" name= "answer" value ="<?= $answer["answer"]?>">
	<input type="submit" value="削除">
	</form>
	<div align="right">
	<form action="list.php" method="POST">
		<input type="submit" value="戻る">
	</form>
	</div>