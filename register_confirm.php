<?php
require "header.php";

$question = getParameter('question');
$answers = getParameter('answers');

?>
<h2>問題・答え登録確認画面</h2>
	<form action= "register_db.php" method="post">
    <label for="question">問題</label>
    <input type="text" name="question"  value="<?= $question ?>"><br />
    <label for="answer">答え</label>
 <?php
 foreach((array)$answers as $i){?>
    <input type="text" name="answer"  value="<?= $answers[$i] ?>"><br />
    <?php } ?>
    <input type="submit" name="confirm" value="登録">
    </form>