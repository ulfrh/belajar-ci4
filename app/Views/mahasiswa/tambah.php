<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mahasiswa</title>
</head>
<body>

    <h1>Tambah Data Mahasiswa</h1>
    <?php if (session()->getFlashdata('errors')): ?>
    <?php foreach (session()->getFlashdata('errors') as $error): ?>
        <div style="color:red;">
            <?= esc($error) ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

    <form action="<?= site_url('mahasiswa/simpan') ?>" method="post">

        <p>
            <label>NIM</label><br>
            <input type="text" name="nim" value="<?= old('nim') ?>">
        </p>

        <p>
            <label>Nama</label><br>
           <input type="text" name="nama" value="<?= old('nama') ?>">
        </p>

        <p>
            <label>Alamat</label><br>
<textarea name="alamat"><?= old('alamat') ?></textarea>
        </p>

        <button type="submit">Simpan</button>

    </form>

    <br>

    <a href="<?= site_url('mahasiswa') ?>">
        Kembali
    </a>

</body>
</html>