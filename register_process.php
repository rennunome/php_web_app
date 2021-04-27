<?php
require 'db_connection.php';

$question = $_POST['question'];
$answers = $_POST['answers'];

//入力値チェック
if($question == null || $answers == null){
    $error_msg= "問題と答えを入力してください";
    header('Location: http://localhost/FirstPhp/register.php?error_msg='.$error_msg.'');
    exit();
}

// 問題重複チェック
$sql = 'SELECT * FROM questions WHERE question = :question limit 1';
$stmt = $db->prepare($sql);
$stmt->execute(array(':question' => $_POST['question']));
$result = $stmt->fetch();
if($result > 0){
    $error_msg= "その問題は既に登録されています。";
    header('Location: http://localhost/FirstPhp/register.php?error_msg='.$error_msg.'');
    exit();
}

//入力値文字数チェック
if (mb_strlen($_POST['question']) > 500 || mb_strlen($_POST['answer']) > 200) {
    $error_msg= "問題は500文字以内、答えは200文字以内で入力してください。";
    header('Location: http://localhost/FirstPhp/register.php?error_msg='.$error_msg.'');
    exit();
}
$path = "Location: http://localhost/FirstPhp/register_confirm.php?question={$question}";
for ($i = 0; $i < count($answers); $i++) {
    $path .= "&answers[]={$answers[$i]}";
}
header($path);
exit();
?>