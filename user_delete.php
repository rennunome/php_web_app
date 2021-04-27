<?php
require "db_connection.php";

$user_id = $_POST['user_id'];

$sql = 'DELETE FROM users WHERE id = :id';
$stmt = $db->prepare($sql);
$stmt->execute([':id'=>$user_id]);

header('Location: http://localhost/FirstPhp/user_list.php');
?>