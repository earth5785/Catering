document.getElementById('cardFormType').style.display = 'none';
document.getElementById('form2').style.display = 'none';


function openForm2() {
    document.getElementById('form2').style.display = 'block';
    document.getElementById('cardFormType').style.display = 'none';
}

document.getElementById('openFormType').addEventListener('click', function () {
    document.getElementById('cardFormType').style.display = 'block';
    document.getElementById('form2').style.display = 'none';
});

document.getElementById('closeFormCardBtn').addEventListener('click', function () {
    document.getElementById('cardFormType').style.display = 'none';
});

// สร้าง array ของปุ่มแก้ไข
var editButtons = document.getElementsByClassName('edit-button');

// ใส่ event listener ให้กับทุกปุ่มแก้ไข
for (var i = 0; i < editButtons.length; i++) {
    editButtons[i].addEventListener('click', openForm2);
}

document.getElementById('closeFormCardBtn2').addEventListener('click', function () {
    document.getElementById('form2').style.display = 'none';
});
