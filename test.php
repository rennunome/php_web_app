<?php
require "header.php";

$sql = 'SELECT * FROM questions order by rand()';
$stmt = $db->prepare($sql);
$stmt->execute();
$q_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<div align="center">
<h1>テスト一覧</h1>
</div>
<form action="mark.php" method="GET">
<?php for ($i = 0; $i < count($q_list); $i++) { ?>
<label for="question_id">問題：</label>
<input type="text" name="question" value="<?=$q_list[$i]['question']?>" readonly /><br />
    <input type="hidden" name="questions_id[]" value="<?=$q_list[$i]['id']?>>" />
    <br>
        <label for="answer_id">回答：</label>
        <input type="text" name="test_answers[]" /><br />
         <?php }?>
        <input type="submit" value="採点" />
</form>