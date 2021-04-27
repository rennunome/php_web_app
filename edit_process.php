<?php
require 'db_connection.php';

$question = $_GET['question'];
$questions_id = $_GET['questions_id'];
$answers = $_GET['answers'];
$answer_ids = $_GET['answer_ids'];

//入力値チェック
if($question == null || $answers == null){
    $error_msg= "問題と答えを入力してください";
    header('Location: http://localhost/FirstPhp/edit.php?error_msg='.$error_msg.'');
    exit();
}

//問題重複チェック
$sql = 'SELECT * FROM questions';
$stmt = $db->prepare($sql);
$stmt->execute();
$q = $stmt->fetchAll();
for($i = 0; $i < count($q); $i++){
 if($q['id'] != $questions_id){
 if($q['question'] == $question){
     $error_msg= "その問題は既に登録されています。";
     header('Location: http://localhost/FirstPhp/edit.php?error_msg='.$error_msg.'');
     exit();
  }
 }
}

//入力値文字数チェック
if (mb_strlen($question) > 500) {
    $error_msg= "問題は500文字以内で入力してください。";
    header('Location: http://localhost/FirstPhp/edit.php?error_msg='.$error_msg.'');
    exit();
} 
for($i = 0; $i < count($answers); $i++){
if (mb_strlen($answers[$i]) > 200){
    $error_msg= "答えは200文字以内で入力してください。";
    header('Location: http://localhost/FirstPhp/edit.php?error_msg='.$error_msg.'');
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