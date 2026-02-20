<?php /* fund_chart.php - REALTIME PRO VERSION */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Realtime Fund Performance</title>
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

/* DASHBOARD */
.dashboard{padding:40px 8%;display:grid;grid-template-columns:1fr 1fr;gap:30px;}
.panel{background:rgba(30,5,55,.6);backdrop-filter:blur(14px);border-radius:20px;padding:25px;border:1px solid rgba(180,120,255,.18);box-shadow:0 0 30px rgba(140,60,255,.2);} 
.panel h2{color:#d9b3ff;margin-bottom:15px;}
.stats{display:grid;grid-template-columns:repeat(3,1fr);gap:15px;margin-top:15px;}
.stat-box{background:rgba(50,0,80,.6);padding:15px;border-radius:14px;text-align:center;border:1px solid rgba(180,120,255,.15);} 
.stat-box h3{font-size:.9rem;color:#e9d5ff;} 
.stat-box p{font-size:1.1rem;color:#c77dff;font-weight:600;}
.chart-panel{grid-column:1/3;}
@media(max-width:900px){.dashboard{grid-template-columns:1fr;}.chart-panel{grid-column:1/2;}}
</style>
</head>
<body>

<nav class="navbar">
  <a href="Mutual-fund-investing-page.php" class="btn-back">← ย้อนกลับ</a>
</nav>

<section class="hero">
  <h1>📡 Realtime Fund Performance</h1>
  <p>ระบบติดตามผลการดำเนินงานแบบ Real-time Simulation</p>
</section>

<section class="dashboard">

  <div class="panel">
    <h2>Equity Fund</h2>
    <p>กองทุนหุ้นเติบโตสูง (Realtime Feed)</p>
    <div class="stats">
      <div class="stat-box"><h3>ROI</h3><p id="roi">0%</p></div>
      <div class="stat-box"><h3>Risk</h3><p>High</p></div>
      <div class="stat-box"><h3>Status</h3><p id="status">Live</p></div>
    </div>
  </div>

  <div class="panel">
    <h2>AI Market Monitor</h2>
    <ul style="line-height:1.8;opacity:.85;">
      <li>📡 Streaming data simulation</li>
      <li>🤖 AI trend detector active</li>
      <li>📈 Momentum tracking</li>
      <li>🔄 Auto refresh engine</li>
    </ul>
  </div>

  <div class="panel chart-panel">
    <h2>Realtime Performance Chart</h2>
    <canvas id="fundChart" height="120"></canvas>
  </div>

</section>

<script>
const ctx = document.getElementById('fundChart');
let labels = [];
let dataPoints = [];

const chart = new Chart(ctx,{
  type:'line',
  data:{
    labels:labels,
    datasets:[{
      label:'Equity Fund (Live)',
      data:dataPoints,
      borderColor:'#c77dff',
      backgroundColor:'rgba(199,125,255,0.15)',
      tension:0.4,
      fill:true,
      pointRadius:2
    }]
  },
  options:{
    responsive:true,
    animation:false,
    plugins:{legend:{labels:{color:'#fff'}}},
    scales:{
      x:{ticks:{color:'#fff'},grid:{color:'rgba(255,255,255,.05)'}},
      y:{ticks:{color:'#fff'},grid:{color:'rgba(255,255,255,.05)'}}
    }
  }
});

let currentValue = 100;
let roi = 0;

function updateRealtime(){
  const now = new Date().toLocaleTimeString();
  const change = (Math.random() - 0.4) * 3;  // simulation volatility
  currentValue += change;
  roi = ((currentValue - 100) / 100 * 100).toFixed(2);

  labels.push(now);
  dataPoints.push(currentValue.toFixed(2));

  if(labels.length > 25){
    labels.shift();
    dataPoints.shift();
  }

  document.getElementById('roi').innerText = roi + '%';

  chart.update();
}

setInterval(updateRealtime,1500);
</script>

</body>
</html>