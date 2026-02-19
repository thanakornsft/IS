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


// ส่งแบบสอบถาม
document.getElementById("surveyForm").addEventListener("submit", function(e){
    e.preventDefault();

    document.getElementById("formResult").innerHTML =
    "ส่งข้อมูลเรียบร้อย ขอบคุณสำหรับการตอบแบบสอบถาม";
});