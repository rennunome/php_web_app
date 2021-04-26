<?php
require 'db_connection.php';

$question = $_GET['question'];
$questions_id = $_GET['questions_id'];
$answers = $_GET['answers'];
$answer_ids = $_GET['answer_ids'];

//入力値チェック（エラーメッセージ未実装）
if($question == null || $answers == null){
    header('Location: http://localhost/FirstPhp/edit.php');
    exit();
}

//問題重複チェック（エラーメッセージ未実装）
$sql = 'SELECT * FROM questions';
$stmt = $db->prepare($sql);
$stmt->execute();
$q = $stmt->fetchAll();
for($i = 0; $i < count($q); $i++){
 if($q['id'] != $questions_id){
 if($q['question'] == $question){
header('Location: http://localhost/FirstPhp/edit.php');
    exit();
  }
 }
}

//入力値文字数チェック（エラーメッセージ未実装）
if (mb_strlen($question) > 500) {
    header('Location: http://localhost/FirstPhp/edit.php');
    exit();
} 
for($i = 0; $i < count($answers); $i++){
if (mb_strlen($answers[$i]) > 200){
    header('Location: http://localhost/FirstPhp/edit.php');
    exit();
 }
}

$path = "Location: http://localhost/FirstPhp/edit_confirm.php?question={$question}&questions_id={$questions_id}";
for ($i = 0; $i < count($answers); $i++) {
    $path .= "&answers[]={$answers[$i]}&answer_ids[]={$answer_ids[$i]}";
}
header($path);
exit();
?>