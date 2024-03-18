document.querySelectorAll('.status-select').forEach(function(select) {
    select.addEventListener('change', function() {
        var selectedStatus = this.value;
        var selectedCaterId = this.options[this.selectedIndex].getAttribute('data-cater-id');

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log('Data updated successfully!');
            }
        };
        xhr.open('GET', 'update_status.php?caterId=' + selectedCaterId + '&status=' + selectedStatus, true);
        xhr.send();
    });
});

