<?php
require "db_connection.php";

$questions_id = $_GET['questions_id'];

$sql = 'DELETE FROM questions WHERE id = :id';
$stmt = $db->prepare($sql);
$stmt->execute([':id'=>$questions_id]);

$sql = 'DELETE FROM correct_answers WHERE questions_id = :questions_id';
$stmt = $db->prepare($sql);
$stmt->execute([':questions_id'=>$questions_id]);

header('Location: http://localhost/FirstPhp/list.php');
?>