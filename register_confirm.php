<?php
require "header.php";

if(isset($_GET['question']))
    $question = $_GET['question']; 
if(isset($_GET['answer']))
    $answer = $_GET['answer'];
?>
	<form action= "register_confirm.php" method="post">
    <label for="question">問題</label>
    <input type="text" name="question"  value="<?= $question ?>"><br />
    <label for="answer">答え</label>
    <input type="text" name="answer"  value="<?= $answer ?>"><br />
    <input type="submit" name="confirm" value="登録">
    </form>
<?php

//「確認ボタン」が押下されたらDB登録の処理
if(isset($_POST['confirm'])){
$sql = "INSERT INTO questions (question) VALUES(:question)";
$stmt = $db->prepare($sql);
$stmt->execute([':question' => $question]);

$sql = $sql = "select id from questions order by created_at desc limit 1";;
$stmt = $db->prepare($sql);
$stmt->execute();
$questions_id = $stmt->fetch(PDO::FETCH_ASSOC);

$sql = "INSERT INTO correct_answers (answer, questions_id) VALUES(:answer, :questions_id)";
$stmt = $db->prepare($sql);
$stmt->execute([':answer' => $answer, ':questions_id' => $questions_id["id"]]); ?>
<script type="text/javascript">
    setTimeout("redirect()", 3000);
    function redirect() {
        location.href="http://localhost/FirstPhp/list.php";
    }
    </script>
    <?php
    }
?>
</body>
</html>