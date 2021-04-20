<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>Login</title>
</head>
<body>
<form action="index.php" method="post">
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
<?php
if(isset($_POST['login'])){
//POSTでidとpasswordを取得
$id = $_POST["id"];
$password = $_POST["password"];

// ハッシュを作る
$hash = password_hash($password, PASSWORD_BCRYPT);

// ユーザIDでSELECTする
$sql = 'SELECT * FROM users WHERE id = :id';
$stmt = $db->prepare($sql);
$stmt->execute([':id'=>$_POST['id']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// ユーザがいない
if(!$user){
    echo 'ユーザ名かパスワードが正しくありません。';
    exit();
}

// パスワードチェック
if(!password_verify($password, $user["password"])){
    echo 'ユーザ名かパスワードが正しくありません。';
    exit();
}

// ログイン
// session_regenerate_id(true);
$_SESSION['login'] = true;

//セッションにidとpasswordを詰める
$_SESSION["id"]=$id;
$_SESSION["password"]=$password;
$_SESSION["admin_flag"]=$user["admin_flag"];
}
?>

</body>
</html>
