document.getElementById('checkCardBtn').addEventListener('click', function() {
    // แสดง form เมื่อคลิกปุ่ม "check card"
    document.getElementById('cardForm').style.display = 'block';
    document.getElementById('cardForm2').style.display = 'none';
});


document.getElementById('closeFormCardBtn').addEventListener('click', function() {
    // ปิดเฉพาะ form cardForm เมื่อคลิกปุ่มปิด
    document.getElementById('cardForm').style.display = 'none';
});

