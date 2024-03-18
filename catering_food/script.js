// script.js

const selectedImages = new Set();

function selectImage(imageName) {
  if (!selectedImages.has(imageName)) {
    const selectedList = document.getElementById('selected-list');
    const listItem = document.createElement('li');
    listItem.textContent = imageName;
    selectedList.appendChild(listItem);
    
    // เพิ่มรูปที่เลือกลงใน Set เพื่อทำการตรวจสอบว่าเลือกรูปนี้ไปแล้วหรือยัง
    selectedImages.add(imageName);
  } else {
    
  }
}

function confirmSelection() {
  alert('Selection confirmed!');
  // Add additional logic if needed
}
