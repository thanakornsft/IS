// เปลี่ยนธีม
const toggle = document.getElementById("themeToggle");

toggle.onclick = () => {
    document.body.classList.toggle("dark");

    if(document.body.classList.contains("dark")){
        toggle.innerHTML = "☀️ Light Mode";
    }else{
        toggle.innerHTML = "🌙 Dark Mode";
    }
};


/* ส่งแบบสอบถาม */
document.getElementById("surveyForm").addEventListener("submit", function(e){
    e.preventDefault();

    // แสดงข้อความสำเร็จ
    document.getElementById("formResult").innerHTML = 
    "ส่งข้อมูลเรียบร้อย ✅ ขอบคุณสำหรับการตอบแบบสอบถาม";

    // รอ 2 วินาที แล้วเปลี่ยนหน้า
    setTimeout(function(){
        window.location.href = "success.html";
    }, 2000); // 2 sec
});