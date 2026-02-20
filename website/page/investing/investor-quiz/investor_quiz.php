<!DOCTYPE html>
<html>
<head>
<title>Investor Profiling Quiz</title>
<link rel="stylesheet" href="quiz.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="quiz-box">
<h1>🧠 Investor Profiling Quiz</h1>
<form id="quizForm">

<div class="q">
<p>1) หากพอร์ตติดลบ 20% คุณจะ?</p>
<label><input type="radio" name="q1" value="1"> ขายทันที</label>
<label><input type="radio" name="q1" value="2"> รอดูสถานการณ์</label>
<label><input type="radio" name="q1" value="3"> ซื้อเพิ่ม</label>
</div>

<div class="q">
<p>2) เป้าหมายการลงทุนของคุณคือ?</p>
<label><input type="radio" name="q2" value="1"> รักษาเงินต้น</label>
<label><input type="radio" name="q2" value="2"> เติบโตสม่ำเสมอ</label>
<label><input type="radio" name="q2" value="3"> เติบโตสูงสุด</label>
</div>

<div class="q">
<p>3) ระยะเวลาการลงทุน?</p>
<label><input type="radio" name="q3" value="1"> < 1 ปี</label>
<label><input type="radio" name="q3" value="2"> 3-5 ปี</label>
<label><input type="radio" name="q3" value="3"> > 10 ปี</label>
</div>

<button type="button" onclick="submitQuiz()">Analyze Profile</button>
</form>

<div id="result"></div>
</div>

<script>
function submitQuiz(){
  const answers = {
    q1:$('input[name=q1]:checked').val(),
    q2:$('input[name=q2]:checked').val(),
    q3:$('input[name=q3]:checked').val()
  };

  $.post('quiz_api.php',{answers},function(res){
    const r = JSON.parse(res);
    $('#result').html(`
      <h2>${r.type}</h2>
      <p>Risk Level: ${r.risk}</p>
      <p>Recommended Portfolio:</p>
      <div>${r.portfolio}</div>
    `);
  });
}
</script>
</body>
</html>