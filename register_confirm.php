<?php
require "header.php";

$question = getParameter('question');
$answer = getParameter('answer');
?>
	<form action= "register_db.php" method="post">
    <label for="question">問題</label>
    <input type="text" name="question"  value="<?= $question ?>"><br />
    <label for="answer">答え</label>
    <input type="text" name="answer"  value="<?= $answer ?>"><br />
    <input type="submit" name="confirm" value="登録">
    </form>