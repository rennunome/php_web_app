<?php
require "header.php";
?>
<!--フォームの追加ボタン-->
<script type="text/javascript">
var i = 1 ;
function addForm() {
  var input_data = document.createElement('input');
  input_data.type = 'text';
  input_data.id = 'answer' + i;
input_data.name = 'answer';
  var parent = document.getElementById('form_area');
  parent.appendChild(input_data);

//   var input_data2 = document.createElement('input');
//   input_data2.type = 'hidden';
//   input_data2.id = 'answer_id' + i;
//   input_data2.name = 'answer_id';
//   input_data2.value = 0;
//   parent.appendChild(input_data2);

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
<h2>問題・答え新規登録画面</h2>
<form action="register_process.php" method="post" id="qaForm">
	<label for="question">問題：</label>
	<input type="text" name="question" /><br />
	<label for="answer">答え：</label>
	<div id= "form_area"><br />
	<input type="text" name="answers[]" id="answer" /><br />
	<input type="text" name="answers[]" id="answer" /><br />
	</div><br />
	<input type= "button" value= "フォーム追加" onclick="addForm()" /><br />
	<button type="submit" id="qaButton">確認</button>
</form>
<br>
<div align="right">
	<form action="list.php" method="post">
		<input type="submit" value="戻る" />
	</form>
</div>