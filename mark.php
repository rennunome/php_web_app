<?php
session_start();
require 'db_connection.php';

$questions_id = $_GET['questions_id'];
$test_answers = $_GET['test_answers'];

$score = 0.0;

for ($i = 0; $i < count($test_answers); $i ++) {
    var_dump("STEP 1");
    for ($j = 0; $j < count($questions_id); $j ++) {
        var_dump("STEP 2");
        $sql = 'SELECT * FROM correct_answers WHERE questions_id = :questions_id';
        $stmt = $db->prepare($sql);
        $stmt->execute([':questions_id' => $questions_id]);
        $q_id = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($q_id['questions_id'] == $questions_id[$j]) {
            var_dump("STEP 3");
            for ($k = 0; $k < count($q_id['answer']); $k ++) {
                var_dump("STEP 4");
                if ($q_id['answer'] == $test_answers[$k]) {
                    var_dump("STEP 5");
                    $score++;
                }
            }
        }
    }
}

$users_id = $_SESSION["id"];
$sql = 'SELECT * FROM users WHERE id = :id';
$stmt = $db->prepare($sql);
$stmt->execute([':id' => $users_id]);
$user = $stmt->fetch();
$user_name = $user['name'];
$_SESSION["name"]=$user_name;
$total = $score++;
$total_qs = count($questions_id);
$total_score = round(100 * $total /$total_qs);
$date = date("Y/m/d H:i");

header('Location: http://localhost/FirstPhp/result.php?total='.$total.'&user_name='.$user_name.'&total_qs='.$total_qs.'&total_score='.$total_score.'&date='.$date.'');
exit();
?>