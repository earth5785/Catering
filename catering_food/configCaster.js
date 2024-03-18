function Checkform(){
    var Fname = document.add.Fname.value;
    var Lname = document.add.Lname.value;
    var email = document.add.email.value;
    var phone = document.add.phone.value;
    var numPeo = document.add.numPeo.value;


    if (Fname.trim() === "") {
        alert("Please enter first name.");
        document.add.Fname.focus();
        return false;
    }

    if (Lname.trim() === "") {
        alert("Please enter last name.");
        document.add.Lname.focus();
        return false;
    }

    if (email.trim() === "") {
        alert("Please enter your email address.");
        document.add.email.focus();
        return false;
    }

    if (phone.trim() === "") {
        alert("Please enter your phone number.");
        document.add.phone.focus();
        return false;
    }

    if (numPeo.trim() === "") {
        alert("Please enter the number of people at the event.");
        document.add.numPeo.focus();
        return false;
    }

    document.add.submit();
}

    // Function to format date as dd/mm/yyyy
// ฟังก์ชันเพื่อกำหนดรูปแบบของวันที่ให้เป็น "yyyy-MM-dd"
function formatDate(date) {
    var year = date.getFullYear();
    var month = (date.getMonth() + 1).toString().padStart(2, '0');
    var day = date.getDate().toString().padStart(2, '0');
    return year + '-' + month + '-' + day;
}

// กำหนดค่าวันที่ในฟอร์ม HTML ด้วยรูปแบบ "yyyy-MM-dd"
var today = new Date();
var formattedDate = formatDate(today);
document.getElementsByName('date')[0].value = formattedDate;

function chkdel(){
    if(confirm(' Confirm again !!! ')){ 
        return true;
    }else{
        return false;
    }       
}

const phoneInput = document.getElementById('phone');
    const phoneError = document.getElementById('phone-error');

    phoneInput.addEventListener('input', function() {
        const phoneNumber = phoneInput.value.trim();
        if (!/^\d{10,11}$/.test(phoneNumber)) {
            phoneError.textContent = 'Please enter a 10 or 11-digit phone number.';
        } else {
            phoneError.textContent = '';
        }        
    });
