<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Smart Portfolio Builder AI</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">

<style>
body{
    margin:0;
    background:radial-gradient(circle at top,#12001f,#05000a 70%);
    font-family:Poppins;
    color:#fff;
}

.container{
    max-width:1400px;
    margin:auto;
    padding:60px;
}

/* Header */
.header{
    text-align:center;
    margin-bottom:50px;
}
.header h1{
    font-size:46px;
    color:#c084ff;
    text-shadow:0 0 20px rgba(183,108,255,.6);
}
.header p{
    color:#aaa;
}

/* Builder Panel */
.builder{
    display:grid;
    grid-template-columns:1fr 1.3fr;
    gap:40px;
}

/* Control Panel */
.panel{
    background:rgba(255,255,255,.04);
    border-radius:25px;
    padding:35px;
    border:1px solid rgba(183,108,255,.25);
    box-shadow:0 0 50px rgba(111,0,255,.25);
    backdrop-filter:blur(10px);
}

.panel h2{
    color:#b76cff;
    margin-bottom:20px;
}

label{
    font-size:13px;
    color:#aaa;
}

select,input{
    width:100%;
    margin:10px 0 20px;
    padding:12px;
    border-radius:12px;
    border:none;
    outline:none;
    background:rgba(255,255,255,.06);
    color:#fff;
}

/* AI Button */
.ai-btn{
    width:100%;
    padding:15px;
    border-radius:15px;
    background:linear-gradient(135deg,#7f00ff,#b76cff);
    border:none;
    color:#fff;
    font-weight:700;
    cursor:pointer;
    transition:.4s;
    box-shadow:0 0 25px rgba(183,108,255,.6);
}
.ai-btn:hover{
    transform:scale(1.03);
    box-shadow:0 0 50px rgba(183,108,255,.9);
}

/* Portfolio Result */
.result{
    background:rgba(255,255,255,.04);
    border-radius:25px;
    padding:35px;
    border:1px solid rgba(183,108,255,.25);
    box-shadow:0 0 60px rgba(111,0,255,.3);
}

.asset{
    margin-bottom:25px;
}

.asset-title{
    display:flex;
    justify-content:space-between;
    font-weight:600;
}

.bar{
    height:10px;
    border-radius:10px;
    background:rgba(255,255,255,.1);
    overflow:hidden;
    margin-top:8px;
}

.fill{
    height:100%;
    border-radius:10px;
    background:linear-gradient(90deg,#7f00ff,#b76cff);
    box-shadow:0 0 15px rgba(183,108,255,.8);
    animation:grow 1.5s ease;
}

@keyframes grow{
    from{width:0;}
}

.ai-badge{
    display:inline-block;
    margin-top:20px;
    padding:8px 16px;
    border-radius:20px;
    background:rgba(183,108,255,.15);
    border:1px solid rgba(183,108,255,.4);
    color:#b76cff;
    font-size:12px;
    letter-spacing:1px;
}
</style>
</head>

<body>

<div class="container">

<div class="header">
<h1>🤖 Smart Portfolio Builder AI</h1>
<p>AI-powered asset allocation system</p>
</div>

<div class="builder">

<!-- Control -->
<div class="panel">
<h2>📊 Investor Profile</h2>

<label>Investment Goal</label>
<select id="goal">
<option value="growth">Wealth Growth</option>
<option value="income">Passive Income</option>
<option value="balanced">Balanced</option>
</select>

<label>Risk Level</label>
<select id="risk">
<option value="low">Low</option>
<option value="medium">Medium</option>
<option value="high">High</option>
</select>

<label>Investment Horizon (years)</label>
<input type="number" id="years" value="10">

<label>Monthly Investment ($)</label>
<input type="number" id="monthly" value="300">

<button class="ai-btn" onclick="buildPortfolio()">🧠 Build Smart Portfolio</button>
</div>

<!-- Result -->
<div class="result">
<h2 style="color:#b76cff">📈 AI Portfolio Allocation</h2>

<div id="portfolio"></div>

<div class="ai-badge">AI Engine Active • Auto Allocation • Risk Optimized</div>
</div>

</div>
</div>

<script>
function buildPortfolio(){
    const goal = document.getElementById("goal").value;
    const risk = document.getElementById("risk").value;

    let portfolio = [];

    if(goal==="growth"){
        portfolio = [
            {name:"Global Equity Fund",p:45},
            {name:"Asia Growth Fund",p:25},
            {name:"Tech Innovation Fund",p:15},
            {name:"Bond Stability Fund",p:10},
            {name:"ESG Fund",p:5},
        ];
    }
    if(goal==="income"){
        portfolio = [
            {name:"Dividend Fund",p:35},
            {name:"Bond Stability Fund",p:30},
            {name:"REIT Fund",p:20},
            {name:"ESG Fund",p:10},
            {name:"Cash Fund",p:5},
        ];
    }
    if(goal==="balanced"){
        portfolio = [
            {name:"Global Equity Fund",p:30},
            {name:"Bond Fund",p:25},
            {name:"Balanced Fund",p:25},
            {name:"ESG Fund",p:10},
            {name:"Cash Fund",p:10},
        ];
    }

    let html="";
    portfolio.forEach(a=>{
        html+=`
        <div class="asset">
            <div class="asset-title">
                <span>${a.name}</span>
                <span>${a.p}%</span>
            </div>
            <div class="bar">
                <div class="fill" style="width:${a.p}%"></div>
            </div>
        </div>
        `;
    });

    document.getElementById("portfolio").innerHTML = html;
}
</script>

</body>
</html>