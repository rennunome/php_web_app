<?php
require "header.php";
?>
<form action="register_confirm.php" method="post">
	<label for="question">問題</label> <input type="text" name="question" /><br />
	<label for="answer">答え：</label> <input type="text" name="answer" /><br /> <input
		type="submit" value="確認" />
</form>
<br>
<div align="right">
	<form action="list.php" method="post">
		<input type="submit" value="戻る" />
	</form>
</div>