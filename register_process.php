<?php
require 'db_connection.php';

$question = $_POST['question'];
$answers = $_POST['answers'];

//入力値チェック（エラーメッセージ未実装）
if($question == null || $answers == null){
    header('Location: http://localhost/FirstPhp/register.php');
    exit();
}

// 問題重複チェック（エラーメッセージ未実装）
$sql = 'SELECT * FROM questions WHERE question = :question limit 1';
$stmt = $db->prepare($sql);
$stmt->execute(array(':question' => $_POST['question']));
$result = $stmt->fetch();
if($result > 0){
    header('Location: http://localhost/FirstPhp/register.php');
    exit();
}

//入力値文字数チェック（エラーメッセージ未実装）
if (strlen($_POST['question']) > 500 || strlen($_POST['answer']) > 200) {
    header('Location: http://localhost/FirstPhp/register.php');
    exit();
}
$path = "Location: http://localhost/FirstPhp/register_confirm.php?question={$question}";
for ($i = 0; $i < count($answers); $i++) {
    $path .= "&answers[]={$answers[$i]}";
}
header($path);
exit();
?>