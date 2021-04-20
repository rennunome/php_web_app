<?php
session_start();
require 'db_connection.php';
?>
		<div align="right">
		<form action="login.php"  method="post">
			<input type="submit" value="logout">
		</form>
		<form action="index.php"  method="post">
			<input type="submit" value="top">
		</form>
		</div>
