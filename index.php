<?php
session_start();
require 'db_connection.php';
require "header.php";
?>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>Top</title>
</head>
<body>
		<?php 
		if ($_SESSION["admin_flag"] == 1) { 
		?>
		<div align="center">
		<h2>メニュー画面</h2>
		<form action="list.php"  method="post">
			<input type="submit" value="問題と答えを確認・登録する ＞ ">
			</form>
			<form action="test.php"  method="post">
			<input type="submit" value="テストをする ＞">
			</form>
			<form action="history.php"  method="post">
			<input type="submit" value="過去の採点結果をみる ＞">
			</form>
			<form action="user_list.php"  method="post">
			<input type="submit" value="ユーザを追加・編集する＞">
			</form>
		</div>
		<?php
		} else if ($_SESSION["admin_flag"] == 0){
		?>
		<div align="center">
			<h2>メニュー画面</h2>
			<form action="test.php"  method="post">
			<input type="submit" value="テストをする ＞">
			</form>
			<br>
			<form action="history.php"  method="post">
			<input type="submit" value="過去の採点結果をみる ＞" >
			</form>
			<br>
			<form action="userlist.php"  method="post">
			<input type="submit" value="ユーザを追加・編集する＞">
			</form>
		</div>
		<?php
		} 
		?>
</body>
</html>