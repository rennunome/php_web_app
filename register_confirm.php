<?php
require "header.php";

$question = getParameter('question');
$answers = $_GET['answers']; 

?>
<h2>問題・答え登録確認画面</h2>
	<form action= "register_db.php" method="get">
    <label for="question">問題</label>
    <input type="text" name="question"  value="<?= $question ?>"><br />
    <label for="answer">答え</label>
 <?php
 if (is_countable($answers)) {
     for ($i=0; $i<count($answers); $i++){?>
    <input type="text" name="answers[]"  value="<?= $answers[$i] ?>" />
    <?php } ?>
     <?php } ?>
    <input type="submit" name="confirm" value="登録">
    </form>