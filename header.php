<?php
session_start();
require 'db_connection.php';
?>
<div class="header">
		<div align="right">
		<form action="login.php"  method="post">
			<input type="submit" value="logout">
		</form>
		<form action="top.php"  method="post">
			<input type="submit" value="top">
		</form>
		</div>
</div>