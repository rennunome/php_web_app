<?php
require 'db_connection.php';

$question = $_GET['question'];
$answers = $_GET['answers'];
$questions_id = $_GET['questions_id'];
$answer_ids = $_GET['answer_ids'];

if(isset($_GET['update'])){
    $sql = "UPDATE questions SET question = :question, updated_at = current_timestamp() WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->execute([':question' => $question, ':id' => $questions_id]);
    
    if (is_array($answers)) {
        for($i = 0; $i < count($answers); $i++){
            $a = $answers[$i];
            $a_ids = $answer_ids[$i];
            if($a_ids == 0){
                $sql = "INSERT INTO correct_answers (answer, questions_id, created_at) VALUES (:answer, :questions_id, current_timestamp())";
                $stmt = $db->prepare($sql);
                $stmt->execute([':answer' => $a, ':questions_id' => $questions_id]);
                unset($stmt);
            } else {
    $sql = "UPDATE correct_answers SET answer = :answer, updated_at = current_timestamp() WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->execute([':answer' => $a, ':id' => $a_ids]);
        }
    }
    header('Location: http://localhost/FirstPhp/list.php');
    exit();
}
}
