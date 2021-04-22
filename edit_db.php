<?php
require 'db_connection.php';

$question = $_POST['question'];
$answer = $_POST['answer'];
$questions_id = $_POST['questions_id'];
$answer_id = $_POST['answer_id'];

if(isset($_POST['update'])){
    $sql = "UPDATE questions SET question = :question, updated_at = current_timestamp() WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->execute([':question' => $question, ':id' => $questions_id]);
    
    $sql = "UPDATE correct_answers SET answer = :answer, updated_at = current_timestamp() WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->execute([':answer' => $answer, ':id' => $answer_id]);
    
    header('Location: http://localhost/FirstPhp/list.php');
    exit();
}
