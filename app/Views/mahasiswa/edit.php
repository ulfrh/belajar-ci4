<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
</head>
<body>

    <h1>Edit Data Mahasiswa</h1>
    <?php if (session()->getFlashdata('errors')): ?>
    <?php foreach (session()->getFlashdata('errors') as $error): ?>
        <div style="color:red;">
            <?= esc($error) ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

    <form action="<?= site_url('mahasiswa/update/' . $mhs['id']) ?>" method="post">

        <p>
            <label>NIM</label><br>
            <input type="text" name="nim" value="<?= esc($mhs['nim']) ?>">
        </p>

        <p>
            <label>Nama</label><br>
            <input type="text" name="nama" value="<?= esc($mhs['nama']) ?>">
        </p>

        <p>
            <label>Alamat</label><br>
            <textarea name="alamat"><?= esc($mhs['alamat']) ?></textarea>
        </p>

        <button type="submit">Update</button>

    </form>

    <br>

    <a href="<?= site_url('mahasiswa') ?>">
        Kembali
    </a>

</body>
</html>