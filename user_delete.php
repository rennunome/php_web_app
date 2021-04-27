<?php
require "db_connection.php";

$user_id = $_POST['user_id'];

$sql = 'update users set deleteflag = 1, deleted_at = current_timestamp() WHERE id = :id';
$stmt = $db->prepare($sql);
$stmt->execute([':id'=>$user_id]);

header('Location: http://localhost/FirstPhp/user_list.php');
?>