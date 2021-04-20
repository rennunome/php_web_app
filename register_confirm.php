<?php
require "header.php";
?>
<?php
$question = $_POST['question'];
$answer = $_POST['answer'];
?>
<?php
$sql = 'SELECT question FROM questions';
$stmt = $db->prepare($sql);
$stmt->execute();
$q_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
if($question == null || $answer == null){
 ?>
    <script type="text/javascript">
    setTimeout("redirect()", 3000);
    function redirect() {
        location.href="http://localhost/FirstPhp/register.php";
     }
    </script>
    
    <?php
    print "問題と答えを入力してください。";
    exit();
// } else if(array_key_exists($_POST['question'], $q_value['question'])){ ?>
<!--     <script type="text/javascript"> -->
//     setTimeout("redirect()", 3000);
//     function redirect() {
//         location.href="http://localhost/FirstPhp/register.php";
//     }
    <!--</script>-->
    <?php
//     print "問題は既に登録されています。";
//     exit();
} else if (strlen($_POST['question']) > 500 || strlen($_POST['answer']) > 200) { ?>
     <script type="text/javascript">
    setTimeout("redirect()", 3000);
    function redirect() {
        location.href="http://localhost/FirstPhp/register.php";
    }
    </script>
    <?php
    print "問題は500文字以内、答えは200文字以内で入力してください。";
    exit();
} else {?>
	<form action= "register_confirm.php" method="post">
    <label for="question">問題</label>
    <input type="text" name="question"  value="<?= $question ?>"><br />
    <label for="answer">答え</label>
    <input type="text" name="answer"  value="<?= $answer ?>"><br />
    <input type="submit" name="confirm" value="登録">
    </form>
<?php
}
?>
<?php
//「確認ボタン」が押下されたらDB登録の処理
require 'db_connection.php';
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