document.getElementById('cardFormSet').style.display = 'none';

document.getElementById('openFormSet').addEventListener('click', function(){
    document.getElementById('cardFormSet').style.display = 'block';
    document.getElementById('formUpdate').style.display = 'none';
});

document.getElementById('closeFormCardBtn').addEventListener('click', function(){
    document.getElementById('cardFormSet').style.display = 'none';
});
