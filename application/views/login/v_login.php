<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- <!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>
        Halaman Login | Tutorial Simple Login Register CodeIgniter @ http://recodeku.blogspot.com
    </title>
</head>

<body>
    <h2>Halaman Login</h2>
    <?php
    // Cetak jika ada notifikasi
    if ($this->session->flashdata('sukses')) {
        echo '<p class="warning" style="margin: 10px 20px;">' . $this->session->flashdata('sukses') . '</p>';
    }
    ?>

    <?php echo form_open('login'); ?>
    <p>Username:</p>
    <p>
        <input type="text" name="username" value="<?php echo set_value('username'); ?>" />
    </p>
    <p>
        <?php echo form_error('username'); ?>
    </p>

    <p>Password:</p>
    <p>
        <input type="password" name="password" value="<?php echo set_value('password'); ?>" />
    </p>
    <p>
        <?php echo form_error('password'); ?>
    </p>

    <p>
        <input type="submit" name="btnSubmit" value="Login" />
    </p>

    <?php echo form_close(); ?>

    <p>
        Kembali ke beranda, Silakan klik
        <?php echo anchor(site_url() . '/beranda', 'di sini..'); ?>
    </p>
</body>

</html> -->
<!--login baru-->

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
    <title>Halaman Login | Tutorial Simple Login Register CodeIgniter @ http://recodeku.blogspot.com</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">

    <link rel="stylesheet" href="<?= base_url('assets/templates')?>/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="<?= base_url('assets/templates')?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <link rel="stylesheet" href="<?= base_url('assets/templates')?>/dist/css/adminlte.min.css?v=3.2.0">
</head>

<body class="login-page" style="bg-color:min-height: 498.333px;">
    <h2>Selamat Datang</h2>
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
        <?php echo form_open('login'); ?>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in untuk masuk ke dashboard Uang.ku</p>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="username" value="<?php echo set_value('username'); ?>" />
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" value="<?php echo set_value('password'); ?>" />
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="">
                        <!-- <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">Remember Me</label>
                        </div> -->
                    </div>
                    <!-- <div class="col-4">
                        <input type="submit" class="btn btn-primary btn-block" name="btnSubmit" value="Login" />
                    </div> -->
                    <div class="">
                    <input type="submit" class="btn btn-primary btn-block btn-login" name="btnSubmit" value="Login" />
                     </div>

                </div>
                <?php echo form_close(); ?>
                <!-- <div class="social-auth-links text-center mb-3">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                    </a>
                </div>
                <p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p> -->
                <p class="mb-0">
                    <br>
                    <!-- <p class="text-center btn btn-primary btn-block"><?php echo anchor('register', 'Daftar'); ?></p> -->
                    <p class="text-center btn btn-primary btn-daftar"><?php echo anchor('register', 'Daftar'); ?></p>

                </p>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/templates')?>/plugins/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/templates')?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/templates')?>/dist/js/adminlte.min.js?v=3.2.0"></script>
</body>

</html>
