<?php /* roi_calculator.php - PRO VERSION */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>ROI Calculator Pro</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:'Poppins',sans-serif;}
body{background:#0a0213;color:#fff;min-height:100vh;}

/* NAVBAR */
.navbar{padding:18px 30px;position:sticky;top:0;background:#12001f;z-index:10;border-bottom:1px solid rgba(168,85,247,.3);} 
.btn-back{color:#e9d5ff;text-decoration:none;border:1px solid #a855f7;padding:8px 22px;border-radius:30px;transition:.3s;}
.btn-back:hover{background:#2b014f;box-shadow:0 0 20px rgba(168,85,247,.5);}

/* HERO */
.hero{text-align:center;padding:50px 8%;}
.hero h1{color:#c77dff;font-size:2.6rem;text-shadow:0 0 20px rgba(160,60,255,.4);} 
.hero p{opacity:.85;margin-top:10px;color:#e9d5ff;}

/* CALCULATOR LAYOUT */
.calculator{padding:40px 8%;display:grid;grid-template-columns:1fr 1fr;gap:30px;}
.panel{background:rgba(30,5,55,.6);backdrop-filter:blur(14px);border-radius:20px;padding:28px;border:1px solid rgba(180,120,255,.18);box-shadow:0 0 30px rgba(140,60,255,.2);} 
.panel h2{color:#d9b3ff;margin-bottom:15px;}

/* FORM */
.form-group{margin-bottom:15px;}
.form-group label{display:block;font-size:.85rem;color:#e9d5ff;margin-bottom:6px;}
.form-group input,.form-group select{width:100%;padding:10px;border-radius:10px;border:none;background:rgba(50,0,80,.6);color:#fff;outline:none;border:1px solid rgba(180,120,255,.2);} 

.calc-btn{margin-top:10px;padding:12px;border-radius:30px;border:1px solid #a855f7;background:linear-gradient(135deg,#2b014f,#3b0764);color:#fff;cursor:pointer;transition:.3s;box-shadow:0 0 25px rgba(168,85,247,.35);} 
.calc-btn:hover{transform:translateY(-3px);box-shadow:0 0 40px rgba(168,85,247,.6);} 

/* RESULTS */
.results{display:grid;grid-template-columns:repeat(3,1fr);gap:15px;margin-top:20px;}
.result-box{background:rgba(50,0,80,.6);padding:15px;border-radius:14px;text-align:center;border:1px solid rgba(180,120,255,.15);} 
.result-box h3{font-size:.85rem;color:#e9d5ff;} 
.result-box p{font-size:1.1rem;color:#c77dff;font-weight:600;} 

.chart-panel{grid-column:1/3;}

@media(max-width:900px){.calculator{grid-template-columns:1fr;}.chart-panel{grid-column:1/2;}}
</style>
</head>
<body>

<nav class="navbar">
  <a href="Mutual-fund-investing-page.php" class="btn-back">← ย้อนกลับ</a>
</nav>

<section class="hero">
  <h1>📈 ROI Calculator Pro</h1>
  <p>ระบบคำนวณผลตอบแทนการลงทุนระดับมืออาชีพ</p>
</section>

<section class="calculator">

  <!-- INPUT PANEL -->
  <div class="panel">
    <h2>Investment Input</h2>

    <div class="form-group">
      <label>Initial Investment</label>
      <input type="number" id="initial" value="10000">
    </div>

    <div class="form-group">
      <label>Monthly Contribution</label>
      <input type="number" id="monthly" value="1000">
    </div>

    <div class="form-group">
      <label>Expected Annual Return (%)</label>
      <input type="number" id="rate" value="12">
    </div>

    <div class="form-group">
      <label>Investment Years</label>
      <input type="number" id="years" value="10">
    </div>

    <button class="calc-btn" onclick="calculateROI()">Calculate ROI</button>

    <div class="results">
      <div class="result-box"><h3>Total Invested</h3><p id="totalInvested">-</p></div>
      <div class="result-box"><h3>Final Value</h3><p id="finalValue">-</p></div>
      <div class="result-box"><h3>ROI</h3><p id="roi">-</p></div>
    </div>
  </div>

  <!-- INFO PANEL -->
  <div class="panel">
    <h2>AI Insight</h2>
    <ul style="line-height:1.8;opacity:.85;">
      <li>🤖 Compounding engine active</li>
      <li>📈 Long-term growth optimized</li>
      <li>🔁 Monthly DCA simulation</li>
      <li>🧠 Risk-adjusted model</li>
      <li>📊 CAGR analysis</li>
    </ul>
  </div>

  <!-- CHART -->
  <div class="panel chart-panel">
    <h2>Growth Projection</h2>
    <canvas id="roiChart" height="120"></canvas>
  </div>

</section>

<script>
let chart;

function calculateROI(){
  const initial = parseFloat(document.getElementById('initial').value);
  const monthly = parseFloat(document.getElementById('monthly').value);
  const rate = parseFloat(document.getElementById('rate').value) / 100;
  const years = parseInt(document.getElementById('years').value);

  const months = years * 12;
  const monthlyRate = rate / 12;

  let balance = initial;
  let invested = initial;

  let labels = [];
  let values = [];

  for(let m=1;m<=months;m++){
    balance = balance * (1 + monthlyRate) + monthly;
    invested += monthly;

    if(m % 12 === 0){
      labels.push('Year ' + (m/12));
      values.push(balance.toFixed(2));
    }
  }

  const roi = ((balance - invested) / invested * 100).toFixed(2);

  document.getElementById('totalInvested').innerText = invested.toFixed(2);
  document.getElementById('finalValue').innerText = balance.toFixed(2);
  document.getElementById('roi').innerText = roi + '%';

  if(chart) chart.destroy();

  const ctx = document.getElementById('roiChart');
  chart = new Chart(ctx,{
    type:'line',
    data:{
      labels:labels,
      datasets:[{
        label:'Portfolio Growth',
        data:values,
        borderColor:'#c77dff',
        backgroundColor:'rgba(199,125,255,0.15)',
        tension:0.4,
        fill:true,
        pointRadius:3
      }]
    },
    options:{
      responsive:true,
      plugins:{legend:{labels:{color:'#fff'}}},
      scales:{
        x:{ticks:{color:'#fff'},grid:{color:'rgba(255,255,255,.05)'}},
        y:{ticks:{color:'#fff'},grid:{color:'rgba(255,255,255,.05)'}}
      }
    }
  });
}
</script>

</body>
</html>
