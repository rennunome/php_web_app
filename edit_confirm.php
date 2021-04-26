<?php
require "header.php";

$question = $_GET['question'];
$answers = $_GET['answers'];
$questions_id = $_GET['questions_id'];
$answer_ids = $_GET['answer_ids'];

?>
<h2>問題・答え編集確認画面</h2>
<form action="edit_db.php" method="GET">
	<label for="question_id">問題：</label><input type="text" name="question" value="<?=$question?>" readonly/>
		<input type="hidden" name="questions_id" value="<?=$questions_id?>">
		<?php if (is_countable($answers)) {
     for ($i=0; $i<count($answers); $i++){?>
		<label for="answer">答え：</label> <input type="text" name="answers[]" value="<?=$answers[$i]?>" readonly/>
			<input type="hidden" name="answer_ids[]" value="<?=$answer_ids[$i]?>">
			<?php }?>
			<?php }?>
			<input type="submit" name="update" value="更新">
</form>
