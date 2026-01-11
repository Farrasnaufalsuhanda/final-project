<?php
include 'koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM siswa");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Data Nilai Siswa</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>📘 Data Nilai Siswa</h2>
    <button class="btn-primary" onclick="openTambah()">+ Tambah Data</button>

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Nilai</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php if(mysqli_num_rows($data) > 0): ?>
            <?php while($row = mysqli_fetch_assoc($data)): ?>
            <tr>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['nilai'] ?></td>
                <td class="<?= $row['nilai'] >= 70 ? 'lulus' : 'tidak' ?>">
                    <?= $row['nilai'] >= 70 ? 'Lulus' : 'Tidak Lulus' ?>
                </td>
                <td>
                    <button class="btn-warning" onclick="openEdit(
                        '<?= $row['id'] ?>',
                        '<?= $row['nama'] ?>',
                        '<?= $row['nilai'] ?>'
                    )">Edit</button>

                    <a class="btn-danger" href="hapus.php?id=<?= $row['id'] ?>" 
                       onclick="return confirm('Yakin hapus data?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="4" align="center">Belum ada data</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- MODAL -->
<div class="modal" id="modal">
    <div class="modal-content">
        <h3 id="judulModal"></h3>
        <form method="post" id="form">
            <input type="hidden" name="id" id="id">

            <label>Nama</label>
            <input type="text" name="nama" id="nama" required>

            <label>Nilai</label>
            <input type="number" name="nilai" id="nilai"
                   min="0" max="100" required>

            <div class="modal-btn">
                <button type="submit" class="btn-primary">Simpan</button>
                <button type="button" class="btn-secondary" onclick="closeModal()">Batal</button>
            </div>
        </form>
    </div>
</div>

<script>
function openTambah() {
    document.getElementById('modal').style.display = 'flex';
    document.getElementById('judulModal').innerText = 'Tambah Data';
    document.getElementById('form').action = 'simpan.php';
    document.getElementById('id').value = '';
    document.getElementById('nama').value = '';
    document.getElementById('nilai').value = '';
}

function openEdit(id, nama, nilai) {
    document.getElementById('modal').style.display = 'flex';
    document.getElementById('judulModal').innerText = 'Edit Data';
    document.getElementById('form').action = 'update.php';
    document.getElementById('id').value = id;
    document.getElementById('nama').value = nama;
    document.getElementById('nilai').value = nilai;
}

function closeModal() {
    document.getElementById('modal').style.display = 'none';
}
</script>

</body>
</html>
