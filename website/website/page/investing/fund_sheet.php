<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Fund Sheet</title>
<link rel="stylesheet" href="fund_sheet.css">
</head>

<body>

<h1>📄 Fund Sheet Center</h1>
<div class="grid" id="grid"></div>

<script>
async function loadFunds(){
    const res = await fetch("fund_sheet_api.php");
    const data = await res.json();

    let html = "";
    data.forEach(f=>{
        html += `
        <div class="card">
            <h3>${f.name}</h3>
            <p>${f.desc}</p>

            <div class="meta">
                <span>ROI: ${f.roi}%</span>
                <span>Risk: ${f.risk}</span>
                <span>ESG: ${f.esg}</span>
                <span>AUM: ${f.aum}</span>
            </div>

            <div class="actions">
                <a href="fund_detail.php?id=${f.id}" class="btn view">View Detail</a>
                <a href="fund_download.php?id=${f.id}" class="btn download">Download</a>
            </div>
        </div>
        `;
    });

    document.getElementById("grid").innerHTML = html;
}

loadFunds();
</script>

</body>
</html>