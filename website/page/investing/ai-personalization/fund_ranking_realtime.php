<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>AI Fund Ranking Realtime</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">

<style>
body{
    margin:0;
    background:#05000a;
    color:#fff;
    font-family:Poppins;
}
.container{
    padding:60px;
}
h1{
    text-align:center;
    color:#b76cff;
}
.grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(300px,1fr));
    gap:25px;
    margin-top:40px;
}
.card{
    background:rgba(255,255,255,0.04);
    border-radius:20px;
    padding:25px;
    border:1px solid rgba(183,108,255,0.25);
    box-shadow:0 0 30px rgba(111,0,255,0.2);
    transition:.4s;
    position:relative;
    overflow:hidden;
}
.card::before{
    content:"";
    position:absolute;
    inset:0;
    background:linear-gradient(120deg,transparent,rgba(183,108,255,.15),transparent);
    opacity:0;
    transition:.4s;
}
.card:hover::before{opacity:1;}
.card:hover{
    transform:translateY(-10px) scale(1.02);
    box-shadow:0 0 80px rgba(183,108,255,0.5);
}
.rank{
    font-size:14px;
    opacity:.6;
}
.score{
    font-size:38px;
    font-weight:800;
    color:#b76cff;
}
.tag{
    display:inline-block;
    padding:4px 10px;
    border-radius:20px;
    font-size:12px;
    background:rgba(183,108,255,.15);
    margin:3px 5px 0 0;
}
.live{
    text-align:center;
    margin-top:10px;
    color:#6affb7;
    font-size:13px;
    letter-spacing:1px;
}
</style>
</head>

<body>
<nav class="navbar">
  <a href="/website/page/investing/Mutual-fund-investing-page.php" class="btn-back">← ย้อนกลับ</a>
</nav>

<div class="container">
    <h1>📡 AI Fund Ranking Realtime Engine</h1>
    <div class="live">● LIVE AI DATA STREAMING</div>
    <div class="grid" id="grid"></div>
</div>

<script>
async function loadRanking(){
    const res = await fetch("/website/page/investing/ai-personalization/fund_ranking_api.php");
    const data = await res.json();

    let html="";
    data.forEach((f,i)=>{
        html+=`
        <div class="card">
            <div class="rank"> Rank #${i+1}</div>
            <h3>${f.name}</h3>
            <div class="score">${f.score}</div>
            <div class="tag">ROI ${f.roi}%</div>
            <div class="tag">Risk ${f.risk}/10</div>
            <div class="tag">ESG ${f.esg}/10</div>
            <div class="tag">AUM ${f.aum}M</div>
        </div>`;
    });

    document.getElementById("grid").innerHTML = html;
}

// realtime loop
loadRanking();
setInterval(loadRanking, 2000); // update every 2s
</script>

</body>
</html>

<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:'Poppins',sans-serif;}
body{background:#0a0213;color:#fff;min-height:100vh;}

/* NAVBAR */
.navbar{padding:18px 30px;position:sticky;top:0;background:#12001f;z-index:10;border-bottom:1px solid rgba(168,85,247,.3);} 
.btn-back{color:#e9d5ff;text-decoration:none;border:1px solid #a855f7;padding:8px 22px;border-radius:30px;transition:.3s;}
.btn-back:hover{background:#2b014f;box-shadow:0 0 20px rgba(168,85,247,.5);}

</style>