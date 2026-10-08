<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

    <h1>Login Admin</h1>

    <?php if (session()->getFlashdata('error')): ?>
        <div style="color:red;">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('login/proses') ?>" method="post">

        <p>
            <label>Username</label><br>
            <input type="text" name="username">
        </p>

        <p>
            <label>Password</label><br>
            <input type="password" name="password">
        </p>

        <button type="submit">Login</button>

    </form>

</body>
</html>