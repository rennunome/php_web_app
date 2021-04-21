<?php
require "db_connection.php";

$question_id = $_POST['questions_id'];

$sql = 'DELETE FROM questions WHERE id = :id';
$stmt = $db->prepare($sql);
$stmt->execute([':id'=>$_POST['questions_id']]);

$sql = 'DELETE FROM correct_answers WHERE questions_id = :questions_id';
$stmt = $db->prepare($sql);
$stmt->execute([':questions_id'=>$_POST['questions_id']]);

header('Location: http://localhost/FirstPhp/list.php');
?>