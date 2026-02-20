<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Fund Sheet Center</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="fund_sheet.css">
</head>

<body>
<div class="container">
    <h1>📑 Professional Fund Sheet Center</h1>
    <div class="grid" id="grid"></div>
</div>

<script>
async function loadFunds(){
    const res = await fetch("fund_sheet_api.php");
    const data = await res.json();

    let html="";
    data.forEach(f=>{
        html+=`
        <div class="card">
            <div class="tag">${f.type}</div>
            <div class="title">${f.name}</div>
            <div class="meta">Code: ${f.code}</div>
            <div class="meta">ROI: ${f.roi}%</div>
            <div class="meta">Risk: ${f.risk}</div>
            <div class="meta">AUM: ${f.aum}</div>
            <div class="meta">NAV: ${f.nav}</div>
            <div class="meta">Expense Ratio: ${f.expense}%</div>

            <a href="${f.pdf}" target="_blank" class="btn">📄 Download Fact Sheet</a>
            <a href="fund_detail.php?code=${f.code}" class="btn">🔍 View Detail</a>
        </div>
        `;
    });

    document.getElementById("grid").innerHTML = html;
}

loadFunds();
// realtime refresh
setInterval(loadFunds, 5000);
</script>

</body>
</html>