<?php
session_start();
require 'db_connection.php';
?>
<!DOCTYPE html>
<html lang = “ja”>
<head>
<meta charset = “UFT-8”>
</head>
<body>
		<div align="right">
		<form action="login.php"  method="post">
			<input type="submit" value="logout">
		</form>
		<form action="index.php"  method="post">
			<input type="submit" value="top">
		</form>
		</div>