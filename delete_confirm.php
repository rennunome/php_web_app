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
<h2>問題・答え削除確認画面</h2>
<form action="delete.php" method="POST">
	<label for="question_id">問題：</label> <input type= "text" name= "question" value ="<?= $question["question"]?>" readonly/>
	 <input type= "hidden" name= "questions_id" value ="<?= $question["id"]?>">
	 <input type= "hidden" name= "answer_id[]" value ="<?= $answer["id"]?>">
	 <br>
	 <?php foreach ($answer as $value) { ?>
	<label for="answer_id">答え：</label>
	 <input type= "text" name= "answer[]" value ="<?= $value["answer"]?>" readonly/>
	<input type="submit" value="削除">
	</form>
	<?php
	 } ?>
	<div align="right">
	<form action="list.php" method="POST">
		<input type="submit" value="戻る">
	</form>
	</div>