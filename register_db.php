<?php
session_start();
require 'db_connection.php';
//「確認ボタン」が押下されたらDB登録の処理

$question = $_GET['question'];
$answers = $_GET['answers'];

if(isset($_GET['confirm'])){
    $sql = "INSERT INTO questions (question, created_at) VALUES(:question, current_timestamp())";
    $stmt = $db->prepare($sql);
    $stmt->execute([':question' => $question]);
    
    $sql = "select id from questions order by created_at desc limit 1";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $questions_id = $stmt->fetch(PDO::FETCH_ASSOC);
    
    for($i = 0; $i < count(array($answers)); $i++){
        $a = $answers[$i];
    $sql = "INSERT INTO correct_answers (answer, questions_id, created_at) VALUES (:answer, :questions_id, current_timestamp())";
    $stmt = $db->prepare($sql);
    $stmt->execute([':answer' => $a, ':questions_id' => $questions_id["id"]]);
    }
}
    header('Location: http://localhost/FirstPhp/list.php');
    exit();
?>