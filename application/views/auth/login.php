<!DOCTYPE html>
<html>

<head>
    <!-- <title>Sistem Informasi Database Kelompok Tani</title> -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>css/loginstyle.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <img class="wave" src="<?= base_url('assets/'); ?>img/wave.png">
    <div class="container">
        <div class="img">
            <img src="<?= base_url('assets/'); ?>img/bg.svg">
        </div>
        <div class="login-content">
            <form class="user" method="post" action="<?= base_url('auth'); ?>">
                <img src="<?= base_url('assets/'); ?>img/jabar.png">
                <h2 class="title">SIDAKEP LOGIN</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <input type="text" class="form-control form-control-user" placeholder="username" id="username" name="username" value="<?= set_value('username'); ?>">
                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <input type="password" class="form-control form-control-user" placeholder="password" id="password" name="password">
                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Login
                </button>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="<?= base_url('assets/'); ?>js/main.js"></script>
</body>

</html>