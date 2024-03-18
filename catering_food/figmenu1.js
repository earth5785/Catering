document.addEventListener("DOMContentLoaded", function() {
    const selectButtons = document.querySelectorAll(".select-button");
    const selectedFoodContainer = document.querySelector(".selected-food");
    let selectedFoods = []; // เก็บชื่ออาหารที่ถูกเลือก
    let selectedFoodIDs = []; // เก็บ FoodID ของอาหารที่ถูกเลือก

    selectButtons.forEach(button => {
        button.addEventListener("click", function() {
            const foodName = button.parentNode.textContent.trim(); // ชื่ออาหาร
            const foodID = button.dataset.foodId; // FoodID ของอาหาร
            selectedFoods.push(foodName); // เพิ่มชื่ออาหารที่ถูกเลือกเข้าไปใน Selected Food
            selectedFoodIDs.push(foodID); // เพิ่ม FoodID ของอาหารที่ถูกเลือก
            console.log("Selected FoodID:", foodID); // แสดง FoodID ที่ถูกเลือกใน Console
            console.log("Selected FoodName:", foodName); // แสดง FoodName ที่ถูกเลือกใน Console
            renderSelectedFoods(); // แสดงรายการอาหารที่ถูกเลือก
        });
    });
    
    // เพิ่มการจัดการกับปุ่ม Confirm
    const confirmButton = document.querySelector(".confirm-button");
    confirmButton.addEventListener("click", function() {
    // ส่งข้อมูลไปยังเซิร์ฟเวอร์เพื่อเพิ่มข้อมูลรายการอาหารลงในฐานข้อมูล
    const formData = new FormData();
    formData.append('submit', true);
    formData.append('selectedFoodIDs', JSON.stringify(selectedFoodIDs)); // ส่งรายการ FoodID ของอาหารที่ผู้ใช้เลือก ในรูปแบบ JSON
    fetch('addformlistfood.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        // หากมีการตอบสนองจากเซิร์ฟเวอร์
        console.log(data); // สามารถแสดงข้อมูลการตอบสนองได้
        // ทำการตรวจสอบว่าเพิ่มข้อมูลเรียบร้อยหรือไม่ และปรับปรุงหน้าเว็บตามต้องการ
        // หากต้องการทำการเปลี่ยนหน้าหรือทำอื่น ๆ ตามผลลัพธ์จากการเพิ่มข้อมูล ให้ทำตามนี้
        window.location.href = "menu.php"; // เปลี่ยนหน้าไปยังหน้า Menu หรือหน้าที่ต้องการ
    })
    .catch(error => {
        console.error('Error:', error);
        // กรณีเกิดข้อผิดพลาดในการส่งข้อมูล
    });
});    

    function renderSelectedFoods() {
        const selectedFoodTable = document.getElementById("selected-food-table").getElementsByTagName('tbody')[0];
        selectedFoodTable.innerHTML = ""; // เคลียร์ข้อมูลที่อยู่ใน selectedFoodContainer
        const uniqueSelectedFoods = [...new Set(selectedFoods)]; // ลบรายการอาหารที่ซ้ำกันออก
    
        uniqueSelectedFoods.forEach((foodName, index) => {
            // ตัดคำ "Detail" และ "Select" ออกจากชื่ออาหาร
            const trimmedFoodName = foodName.replace(/(?:Detail|Select)/g, '').trim();
            
            const row = selectedFoodTable.insertRow();
            const cell1 = row.insertCell(0);
            const cell2 = row.insertCell(1);
    
            cell1.textContent = trimmedFoodName; // เพิ่มชื่ออาหารลงใน cell แรก
            // เพิ่มปุ่ม delete ใน cell ที่สอง
            const deleteButton = document.createElement("button");
            deleteButton.textContent = "-";
            deleteButton.classList.add("delete-button");
            deleteButton.dataset.index = index; // เก็บค่า Index ของรายการอาหาร
            cell2.appendChild(deleteButton);
        });
    
        // จับเหตุการณ์เมื่อคลิกที่ปุ่ม delete
        const deleteButtons = document.querySelectorAll(".delete-button");
        deleteButtons.forEach(button => {
            button.addEventListener("click", function() {
                const selectedIndex = parseInt(button.dataset.index);
                selectedFoods.splice(selectedIndex, 1); // ลบรายการอาหารที่ถูกเลือกออกจาก selectedFoods
                selectedFoodIDs.splice(selectedIndex, 1); // ลบ FoodID ของอาหารที่ถูกเลือก
                renderSelectedFoods(); // แสดงรายการอาหารที่ถูกเลือกใหม่
            });
        });
    }
    });


function showDetailButton(img) {
    img.nextElementSibling.style.display = 'block';
}

function hideDetailButton(img) {
    img.nextElementSibling.style.display = 'none';
}

function closePopup() {
    document.getElementById('popup-container').style.display = 'none';
}

document.addEventListener("DOMContentLoaded", function() {
    const detailButtons = document.querySelectorAll('.detail-button');

    detailButtons.forEach(function(button) {
        button.style.display = 'none'; // ซ่อนปุ่ม Detail เมื่อโหลดหน้าเว็บ

        // เพิ่ม event listener เมื่อโฮเวอร์ที่รูปภาพ
        button.parentNode.querySelector('img').addEventListener('mouseover', function() {
            button.style.display = 'block'; // แสดงปุ่ม Detail เมื่อโฮเวอร์ที่รูปภาพ
        });

        // เพิ่ม event listener เมื่อไม่โฮเวอร์ที่รูปภาพ
        button.parentNode.addEventListener('mouseout', function(event) {
            // ตรวจสอบว่าเมื่อเมาส์หันออกนอกตำแหน่งของรูปภาพ หรือปุ่ม Detail หรือไม่
            if (!event.relatedTarget || (event.relatedTarget !== button && !button.contains(event.relatedTarget))) {
                button.style.display = 'none'; // ซ่อนปุ่ม Detail เมื่อไม่โฮเวอร์ที่รูปภาพ
            }
        });

         
    });

});

document.querySelectorAll('.detail-button').forEach(button => {
    button.addEventListener('click', function() {
        let foodId = this.getAttribute('data-foodId');

        // ส่งค่า FoodID ไปยังไฟล์ PHP เพื่อดึงข้อมูล
        let xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                let response = JSON.parse(xhr.responseText);
                document.getElementById('popup-food-name').innerText = response.FoodName;
                document.getElementById('popup-description').innerText = response.Description;
                document.getElementById('popup-image').src = 'admin/image/' + response.Image;
                document.getElementById('popup-container').style.display = 'block';
            }
        };
        xhr.open('GET', 'getFoodDetail.php?foodId=' + foodId, true);
        xhr.send();
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const detailButtons = document.querySelectorAll('.detail-button');
    const popupContainer = document.querySelector('.popup-container');

    detailButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            popupContainer.classList.toggle('show-popup'); // เพิ่มหรือลบคลาส show-popup เมื่อคลิกปุ่ม Detail
        });
    });
});



