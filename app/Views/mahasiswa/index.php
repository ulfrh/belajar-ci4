<!DOCTYPE html>
<html>

<head>
    <title>Data Mahasiswa</title>
</head>

<body>

    <h1>Data Mahasiswa</h1>

    <a href="<?= site_url('logout') ?>">
        Logout
    </a>

    <?php if (session()->getFlashdata('pesan')): ?>
        <div style="color:green;">
            <?= esc(session()->getFlashdata('pesan')) ?>
        </div>
    <?php endif; ?>

    <br><br>

    <a href="<?= site_url('mahasiswa/tambah') ?>">
        + Tambah Mahasiswa
    </a>

    <br><br>

    <!-- Form Pencarian -->
    <form method="get" action="<?= site_url('mahasiswa') ?>">
        <input
            type="text"
            name="q"
            placeholder="Cari NIM, nama, atau jurusan"
            value="<?= esc($keyword ?? '') ?>"
        >

        <button type="submit">Cari</button>

        <a href="<?= site_url('mahasiswa') ?>">
            Reset
        </a>
    </form>

    <br>

    <table border="1" cellpadding="10">

        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>

        <?php $no = 1; ?>

        <?php foreach ($mahasiswa as $m): ?>

            <tr>

                <td><?= $no++ ?></td>

                <td>
                    <?= esc($m['nim']) ?>
                </td>

                <td>
                    <?= esc($m['nama']) ?>
                </td>

                <td>
                    <?= esc($m['alamat']) ?>
                </td>

                <td>

                    <a href="<?= site_url('mahasiswa/edit/' . $m['id']) ?>">
                        Edit
                    </a>

                    |

                    <a href="<?= site_url('mahasiswa/hapus/' . $m['id']) ?>"
                       onclick="return confirm('Yakin hapus data ini?')">
                        Hapus
                    </a>

                </td>

            </tr>

        <?php endforeach; ?>

    </table>

</body>

</html>