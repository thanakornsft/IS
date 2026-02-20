<?php /* ai_advisor.php - PRO AI ADVISOR SYSTEM */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>AI Investment Advisor</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800&display=swap" rel="stylesheet">
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

/* ADVISOR LAYOUT */
.advisor{padding:40px 8%;display:grid;grid-template-columns:1fr 1fr;gap:30px;}
.panel{background:rgba(30,5,55,.6);backdrop-filter:blur(14px);border-radius:22px;padding:28px;border:1px solid rgba(180,120,255,.18);box-shadow:0 0 30px rgba(140,60,255,.2);} 
.panel h2{color:#d9b3ff;margin-bottom:15px;}

/* FORM */
.form-group{margin-bottom:15px;}
.form-group label{display:block;font-size:.85rem;color:#e9d5ff;margin-bottom:6px;}
.form-group input,.form-group select{width:100%;padding:10px;border-radius:10px;border:none;background:rgba(50,0,80,.6);color:#fff;outline:none;border:1px solid rgba(180,120,255,.2);} 

.advice-btn{margin-top:10px;padding:12px;border-radius:30px;border:1px solid #a855f7;background:linear-gradient(135deg,#2b014f,#3b0764);color:#fff;cursor:pointer;transition:.3s;box-shadow:0 0 25px rgba(168,85,247,.35);} 
.advice-btn:hover{transform:translateY(-3px);box-shadow:0 0 40px rgba(168,85,247,.6);} 

/* RESULTS */
.recommend-box{margin-top:15px;background:rgba(50,0,80,.6);padding:18px;border-radius:16px;border:1px solid rgba(180,120,255,.15);}
.recommend-box h3{color:#c77dff;margin-bottom:8px;}
.recommend-box p{font-size:.9rem;line-height:1.6;color:#f2e9ff;opacity:.9;}

/* GRID RESULT */
.allocation{display:grid;grid-template-columns:repeat(3,1fr);gap:15px;margin-top:15px;}
.alloc-box{background:rgba(40,0,70,.6);padding:15px;border-radius:14px;text-align:center;border:1px solid rgba(180,120,255,.15);} 
.alloc-box h4{color:#e9d5ff;font-size:.9rem;} 
.alloc-box p{color:#c77dff;font-size:1.1rem;font-weight:600;} 

@media(max-width:900px){.advisor{grid-template-columns:1fr;}}
</style>
</head>
<body>

<nav class="navbar">
  <a href="Mutual-fund-investing-page.php" class="btn-back">← ย้อนกลับ</a>
</nav>

<section class="hero">
  <h1>🤖 AI Investment Advisor</h1>
  <p>ระบบวิเคราะห์และแนะนำพอร์ตการลงทุนอัจฉริยะระดับมืออาชีพ</p>
</section>

<section class="advisor">

  <!-- INPUT PANEL -->
  <div class="panel">
    <h2>Investor Profile</h2>

    <div class="form-group">
      <label>Investment Goal</label>
      <select id="goal">
        <option value="growth">Wealth Growth</option>
        <option value="income">Passive Income</option>
        <option value="retirement">Retirement</option>
        <option value="preserve">Capital Preservation</option>
      </select>
    </div>

    <div class="form-group">
      <label>Risk Level</label>
      <select id="risk">
        <option value="low">Low</option>
        <option value="medium">Medium</option>
        <option value="high">High</option>
      </select>
    </div>

    <div class="form-group">
      <label>Investment Horizon (Years)</label>
      <input type="number" id="years" value="10">
    </div>

    <div class="form-group">
      <label>Monthly Investment</label>
      <input type="number" id="monthly" value="1000">
    </div>

    <button class="advice-btn" onclick="generateAdvice()">Generate AI Advice</button>

  </div>

  <!-- OUTPUT PANEL -->
  <div class="panel">
    <h2>AI Recommendation</h2>

    <div class="recommend-box" id="aiText">
      <h3>AI Analysis</h3>
      <p>กรุณากรอกข้อมูลเพื่อรับคำแนะนำจาก AI</p>
    </div>

    <div class="allocation" id="allocation"></div>

  </div>

</section>

<script>
function generateAdvice(){
  const goal = document.getElementById('goal').value;
  const risk = document.getElementById('risk').value;
  const years = parseInt(document.getElementById('years').value);
  const monthly = parseFloat(document.getElementById('monthly').value);

  let text = '';
  let alloc = [];

  /* ===== AI CORE LOGIC ===== */

  // Base by risk
  if(risk === 'high'){
    alloc = [
      {name:'Equity Fund',val:55},
      {name:'Global Fund',val:25},
      {name:'ESG Fund',val:10},
      {name:'Bond Fund',val:10}
    ];
  }
  else if(risk === 'medium'){
    alloc = [
      {name:'Equity Fund',val:35},
      {name:'Mixed Fund',val:30},
      {name:'Bond Fund',val:25},
      {name:'Money Market',val:10}
    ];
  }
  else{
    alloc = [
      {name:'Money Market',val:35},
      {name:'Bond Fund',val:35},
      {name:'Mixed Fund',val:20},
      {name:'Equity Fund',val:10}
    ];
  }

  // Strategy by goal
  if(goal === 'growth'){
    text = 'AI วิเคราะห์เป้าหมายเป็น Wealth Growth แนะนำพอร์ตเชิงรุก เน้นการเติบโตระยะยาว ใช้กลยุทธ์ DCA + Rebalancing + Long-term Compounding';
  }
  else if(goal === 'income'){
    text = 'AI วิเคราะห์เป้าหมายเป็น Passive Income แนะนำพอร์ตสร้างกระแสเงินสด เน้นเสถียรภาพ รายได้สม่ำเสมอ และความผันผวนต่ำ';
  }
  else if(goal === 'retirement'){
    text = 'AI วิเคราะห์เป้าหมายเพื่อ Retirement Planning แนะนำพอร์ตระยะยาว เน้นความมั่นคง + การเติบโตแบบสมดุล + Capital Preservation';
  }
  else{
    text = 'AI วิเคราะห์เป้าหมายเป็น Capital Preservation แนะนำพอร์ตความเสี่ยงต่ำ เน้นรักษาเงินต้นและเสถียรภาพทางการเงิน';
  }

  // Time horizon intelligence
  if(years >= 15){
    text += ' | ระบบตรวจพบระยะเวลาลงทุนยาว: สามารถรับความผันผวนได้สูง → เพิ่มน้ำหนักสินทรัพย์เติบโต';
  }else if(years <= 3){
    text += ' | ระบบตรวจพบระยะเวลาสั้น: ลดความเสี่ยง → เพิ่มสินทรัพย์เสถียร';
  }

  // Capital logic
  if(monthly >= 5000){
    text += ' | เงินลงทุนต่อเดือนสูง → เหมาะกับพอร์ต Global Diversification';
  }

  /* ===== OUTPUT ===== */

  document.getElementById('aiText').innerHTML = `
    <h3>AI Analysis</h3>
    <p>${text}</p>
  `;

  let allocHTML='';
  alloc.forEach(a=>{
    allocHTML+=`
      <div class="alloc-box">
        <h4>${a.name}</h4>
        <p>${a.val}%</p>
      </div>
    `;
  });

  document.getElementById('allocation').innerHTML = allocHTML;
}
</script>

</body>
</html>
