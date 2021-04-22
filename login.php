<?php 
session_start();
require 'db_connection.php';
?> 
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>Login</title>
</head>
<body>
<h2>ログイン画面</h2>
<form action="login_process.php" method="post">
<div class="login">
<div class="id">
ID：<input type="text" name="id" value= "1"><br>
<br>
</div>
<div class="pass">
PW：<input type="text" name="password" value= "anthony1"><br>
<br>
</div>
<div align="center">
<input type="submit" name="login" value="login">
</div>
</div>
</form>
</body>
</html>