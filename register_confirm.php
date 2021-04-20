<?php
require "header.php";
?>
<?php
$question = $_POST['question'];
$answer = $_POST['answer'];
?>
<?php
if($question == null || $answer == null){
    header('Location: http://localhost/FirstPhp/register.php');
    print "問題と答えを入力してください。";
    exit();
} else if (strlen($_POST['question']) > 500 || strlen($_POST['answer']) > 200) {
    header('Location: http://localhost/FirstPhp/register.php');
    print "問題は500文字以内、答えは200文字以内で入力してください。";
    exit();
} else {?>
	<form action= "register_confirm.php" method="post">
    <label for="question">問題</label>
    <input type="text" name="question"  value="<?= $question ?>"><br />
    <label for="answer">答え</label>
    <input type="text" name="answer"  value="<?= $answer ?>"><br />
    <button type= "submit" name= "confirm">確認</button>
    </form>
<?php
}
?>
<?php
//「確認ボタン」が押下されたらDB登録の処理
if(isset($_POST['confirm'])){
$sql = "INSERT INTO questions VALUES(:question)";
$stmt = $db->prepare($sql);
$stmt->execute([':question' => $question]);

$sql = "SELECT max(id) as max_id from questions";
$stmt = $db->prepare($sql);
$stmt->execute();
$questions_id = $stmt->fetch(PDO::FETCH_ASSOC);

$sql = "INSERT INTO correct_answers VALUES(:answer, :questions_id)";
$stmt = $db->prepare($sql);
$stmt->execute([':answer' => $answer, ':questions_id' => $questions_id]);
}
?>
</body>
</html>