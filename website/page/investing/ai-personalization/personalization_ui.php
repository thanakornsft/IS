<?php /* personalization_ui.php */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>AI Personalization Engine</title>

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800&display=swap" rel="stylesheet">

<!-- CSS -->
<link rel="stylesheet" href="personalization.css">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
/* fallback style if css not loaded */
body{background:#0a0213;color:#fff;font-family:Poppins}
</style>
</head>

<body>

<div class="panel">

  <h1>🧠 AI Personalization System</h1>
  <p class="subtitle">Fintech-grade Personalized Intelligence Engine</p>

  <!-- ===== USER INPUT FORM ===== -->

  <div class="form-group">
    <label>🎯 Investment Goal</label>
    <select id="goal">
      <option value="growth">Wealth Growth</option>
      <option value="income">Passive Income</option>
      <option value="retirement">Retirement</option>
      <option value="preservation">Capital Preservation</option>
    </select>
  </div>

  <div class="form-group">
    <label>⏳ Investment Horizon (Years)</label>
    <input id="years" type="number" value="10">
  </div>

  <div class="form-group">
    <label>💰 Monthly Investment</label>
    <input id="monthly" type="number" value="3000">
  </div>

  <div class="form-group">
    <label>📉 Reaction to Loss</label>
    <select id="loss_reaction">
      <option value="panic">Panic Sell</option>
      <option value="hold">Hold</option>
      <option value="buy">Buy More</option>
    </select>
  </div>

  <div class="form-group">
    <label>🌊 Volatility Tolerance</label>
    <select id="volatility">
      <option value="low">Low</option>
      <option value="medium">Medium</option>
      <option value="high">High</option>
    </select>
  </div>

  <div class="form-group">
    <label>⚠ Risk Preference</label>
    <select id="risk_choice">
      <option value="low">Low Risk</option>
      <option value="medium">Medium Risk</option>
      <option value="high">High Risk</option>
    </select>
  </div>

  <button class="ai-btn" onclick="runAI()">Generate Personalized Strategy</button>

  <!-- ===== OUTPUT ===== -->
  <div id="output" class="output-box">
    <div class="placeholder">Waiting for AI Personalization...</div>
  </div>

</div>

<!-- ===== JS ENGINE ===== -->
<script>
function runAI(){
  $('#output').html('<div class="loading">🧠 AI Analyzing investor profile...</div>');

  $.post('user_profile.php',{
    goal:$('#goal').val(),
    years:$('#years').val(),
    monthly:$('#monthly').val(),
    loss_reaction:$('#loss_reaction').val(),
    volatility:$('#volatility').val(),
    risk_choice:$('#risk_choice').val()
  },function(res){

    let data = JSON.parse(res);

    let html = `
      <div class="ai-card">
        <h2>Investor DNA Profile</h2>

        <div class="dna-grid">
          <div class="dna-box">
            <h4>Risk DNA</h4>
            <p>${data.dna.risk_type}</p>
          </div>
          <div class="dna-box">
            <h4>Time DNA</h4>
            <p>${data.dna.time_type}</p>
          </div>
          <div class="dna-box">
            <h4>Capital DNA</h4>
            <p>${data.dna.capital_type}</p>
          </div>
        </div>

        <hr>

        <h3>Investor Digital Profile</h3>
        <pre class="json-view">${JSON.stringify(data.profile,null,2)}</pre>
      </div>
    `;

    $('#output').html(html);

  });
}
</script>

</body>
</html><?php /* personalization_ui.php */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>AI Personalization Engine</title>

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800&display=swap" rel="stylesheet">

<!-- CSS -->
<link rel="stylesheet" href="personalization.css">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
/* fallback style if css not loaded */
body{background:#0a0213;color:#fff;font-family:Poppins}
</style>
</head>

<body>

<div class="panel">

  <h1>🧠 AI Personalization System</h1>
  <p class="subtitle">Fintech-grade Personalized Intelligence Engine</p>

  <!-- ===== USER INPUT FORM ===== -->

  <div class="form-group">
    <label>🎯 Investment Goal</label>
    <select id="goal">
      <option value="growth">Wealth Growth</option>
      <option value="income">Passive Income</option>
      <option value="retirement">Retirement</option>
      <option value="preservation">Capital Preservation</option>
    </select>
  </div>

  <div class="form-group">
    <label>⏳ Investment Horizon (Years)</label>
    <input id="years" type="number" value="10">
  </div>

  <div class="form-group">
    <label>💰 Monthly Investment</label>
    <input id="monthly" type="number" value="3000">
  </div>

  <div class="form-group">
    <label>📉 Reaction to Loss</label>
    <select id="loss_reaction">
      <option value="panic">Panic Sell</option>
      <option value="hold">Hold</option>
      <option value="buy">Buy More</option>
    </select>
  </div>

  <div class="form-group">
    <label>🌊 Volatility Tolerance</label>
    <select id="volatility">
      <option value="low">Low</option>
      <option value="medium">Medium</option>
      <option value="high">High</option>
    </select>
  </div>

  <div class="form-group">
    <label>⚠ Risk Preference</label>
    <select id="risk_choice">
      <option value="low">Low Risk</option>
      <option value="medium">Medium Risk</option>
      <option value="high">High Risk</option>
    </select>
  </div>

  <button class="ai-btn" onclick="runAI()">Generate Personalized Strategy</button>

  <!-- ===== OUTPUT ===== -->
  <div id="output" class="output-box">
    <div class="placeholder">Waiting for AI Personalization...</div>
  </div>

</div>

<!-- ===== JS ENGINE ===== -->
<script>
function runAI(){
  $('#output').html('<div class="loading">🧠 AI Analyzing investor profile...</div>');

  $.post('user_profile.php',{
    goal:$('#goal').val(),
    years:$('#years').val(),
    monthly:$('#monthly').val(),
    loss_reaction:$('#loss_reaction').val(),
    volatility:$('#volatility').val(),
    risk_choice:$('#risk_choice').val()
  },function(res){

    let data = JSON.parse(res);

    let html = `
      <div class="ai-card">
        <h2>Investor DNA Profile</h2>

        <div class="dna-grid">
          <div class="dna-box">
            <h4>Risk DNA</h4>
            <p>${data.dna.risk_type}</p>
          </div>
          <div class="dna-box">
            <h4>Time DNA</h4>
            <p>${data.dna.time_type}</p>
          </div>
          <div class="dna-box">
            <h4>Capital DNA</h4>
            <p>${data.dna.capital_type}</p>
          </div>
        </div>

        <hr>

        <h3>Investor Digital Profile</h3>
        <pre class="json-view">${JSON.stringify(data.profile,null,2)}</pre>
      </div>
    `;

    $('#output').html(html);

  });
}
</script>

</body>
</html>