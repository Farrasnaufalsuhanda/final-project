function batasNilai(input) {
    if (input.value > 100) input.value = 100;
    if (input.value < 0) input.value = 0;
}

function openTambah() {
    document.getElementById('modalTambah').style.display = 'block';
}

function openEdit(id, nama, nilai) {
    document.getElementById('modalEdit').style.display = 'block';
    document.getElementById('editId').value = id;
    document.getElementById('editNama').value = nama;
    document.getElementById('editNilai').value = nilai;
}

function closeModal() {
    document.getElementById('modalTambah').style.display = 'none';
    document.getElementById('modalEdit').style.display = 'none';
}
