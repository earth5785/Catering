
document.getElementById('formUpdate').style.display = 'none';
    
    document.addEventListener('DOMContentLoaded', function () {
        // ฟังก์ชันเพื่อเปิดฟอร์มเมื่อคลิกที่ปุ่ม Edit
        function openForm(orderId, Fname, Lname, email, contact, date, numPeo) {
            document.getElementById('editorderID').value = orderId;
            document.update.Fname.value = Fname;
            document.update.Lname.value = Lname;
            document.update.email.value = email;
            document.update.phone.value = contact;
            document.update.date.value = date;
            document.update.numPeo.value = numPeo;

            document.getElementById('formUpdate').style.display = 'block';
        }

        // ฟังก์ชันเพื่อปิดฟอร์มเมื่อคลิกที่ปุ่ม Cancel
        document.getElementById('closeFormCardBtn2').addEventListener('click', function () {
            document.getElementById('formUpdate').style.display = 'none';
        });

        // เพิ่มฟังก์ชัน Edit ลงในลิงก์ที่มี class 'edit-button'
        var editButtons = document.querySelectorAll('.edit-button');
        editButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var orderId = this.getAttribute('data-order-id');
                var Fname = this.getAttribute('data-order-Fname');
                var Lname = this.getAttribute('data-order-Lname');
                var email = this.getAttribute('data-order-email');
                var contact = this.getAttribute('data-order-contact');
                var date = this.getAttribute('data-order-date');
                var numPeo = this.getAttribute('data-order-numP');

                openForm(orderId, Fname, Lname, email, contact, date, numPeo);
            });
        });
    });

    

