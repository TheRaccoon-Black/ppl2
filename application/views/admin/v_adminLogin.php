<!-- <!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
</head>
<body>
    <h2>Login Admin</h2>
    <form action="<?= base_url('index.php/admin/proses_login') ?>" method="post">
        <label>Email:</label>
        <input type="text" name="email" required><br>

        <label>Password:</label>
        <input type="password" name="password" required><br>

        <button type="submit">Login</button>
    </form>
</body>
</html> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .btn-login {
            width: 100%; /* Atur lebar sesuai kebutuhan */
        }

        .btn-daftar {
            width: 50%; /* Atur lebar sesuai kebutuhan */
            margin: auto; /* Pusatkan tombol */
        }
    </style>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin | Tutorial Simple Login Register CodeIgniter @ http://recodeku.blogspot.com</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">

    <link rel="stylesheet" href="<?= base_url('assets/templates')?>/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="<?= base_url('assets/templates')?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <link rel="stylesheet" href="<?= base_url('assets/templates')?>/dist/css/adminlte.min.css?v=3.2.0">
</head>

<body class="login-page" style="bg-color:min-height: 498.333px;">
    <h2>Login Admin</h2>
    <?php
    // Cetak jika ada notifikasi
    if ($this->session->flashdata('sukses')) {
        echo '<p class="warning" style="margin: 10px 20px;">' . $this->session->flashdata('sukses') . '</p>';
    }
    ?>
    <div class="login-box">
        <div class="login-logo">
            <a href="<?= base_url('assets/templates')?>/index2.html"><b>Uang</b>.KU</a>
        </div>
        <form action="<?= base_url('index.php/admin/proses_login') ?>" method="post">
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Sign in untuk masuk ke dashboard Admin </p>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="email" placeholder="Email" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="">
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block btn-login">Login</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="<?= base_url('assets/templates')?>/plugins/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/templates')?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/templates')?>/dist/js/adminlte.min.js?v=3.2.0"></script>
</body>

</html>
