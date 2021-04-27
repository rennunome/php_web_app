<?php
require "header.php";

$questions_id = $_GET['questions_id'];

$sql = 'SELECT * FROM questions WHERE id = :id';
$stmt = $db->prepare($sql);
$stmt->execute([':id'=> $questions_id]);
$question = $stmt->fetch(PDO::FETCH_ASSOC);

$sql = 'SELECT * FROM correct_answers WHERE questions_id = :questions_id';
$stmt = $db->prepare($sql);
$stmt->execute([':questions_id'=>$questions_id]);
$answer = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!--フォームの追加ボタン-->
<script type="text/javascript">
var i = 1 ;
function addForm() {
  var input_data = document.createElement('input');
  input_data.type = 'text';
  input_data.id = 'answer' + i;
input_data.name = 'answers[]';
  var parent = document.getElementById('form_area');
  parent.appendChild(input_data);

  var input_data2 = document.createElement('input');
  input_data2.type = 'hidden';
  input_data2.id = 'answer_ids' + i;
  input_data2.name = 'answer_ids[]';
  input_data2.value = 0;
  parent.appendChild(input_data2);

var button_data = document.createElement('button');
  button_data.id = i;
 button_data.name = 'delete';
  button_data.onclick = function(){deleteBtn(this);}
  button_data.innerHTML = '削除';
 var input_area = document.getElementById(input_data.id);
  parent.appendChild(button_data);

  i++ ;
}

function deleteBtn(target) {
  var target_id = target.id;
  var parent = document.getElementById('form_area');
  var ipt_id = document.getElementById('answer' + target_id);
  var tgt_id = document.getElementById(target_id);
  parent.removeChild(ipt_id);
  parent.removeChild(tgt_id);
}
</script>
<h2>問題・答え編集画面</h2>
<form action="edit_process.php" method="GET" id="qaForm">
	<label for="question_id">問題：</label><input type="text" name="question" value="<?=$question['question']?>">
	<input type="hidden" name="questions_id" value="<?=$question['id']?>">
	<?php 
     for ($i=0; $i<count($answer); $i++){
         ?>
		<br>
		<label for="answer">答え：</label> 
		<div id= "form_area">
		<input type="text" name="answers[]" value="<?=$answer[$i]['answer']?>" />
		</div>
			<input type="hidden" name="answer_ids[]" id= "answer_ids" value="<?=$answer[$i]['id']?>" />
			<?php }?>
			<input type= "button" value= "フォーム追加" onclick="addForm()" /><br />
			<button type="submit" id="qaButton">確認</button>
</form>
<div align="right">
	<form action="list.php" method="post">
		<input type="submit" value="戻る" />
	</form>
</div>