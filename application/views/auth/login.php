<!DOCTYPE html>
<html>
<head>
  <title>Halaman Login</title>
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      background-image: url('background-image.jpg'); /* Ganti 'background-image.jpg' dengan URL gambar latar belakang Anda */
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      background-attachment: fixed;
      opacity: 0.8; /* Atur tingkat opacity sesuai keinginan Anda */
    }

    .login-box {
      max-width: 400px;
      width: 100%;
      text-align: center;
    }

    .login-logo {
      text-align: center;
    }

    .card.login-card-body {
      padding: 20px;
      background: rgba(255, 255, 255, 0.8); /* Atur latar belakang kartu dengan opacity */
    }

    .btn-primary {
      width: 100%;
    }
  </style>
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="<?= base_url() ?>">PRESENSI</a>
    </div>
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Silahkan Login</p>
        <?= $this->session->flashdata('message'); ?>

        <form action="<?= base_url('auth') ?>" method="post">
          <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Remember Me</label>
              </div>
            </div>
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
          </div>
        </form>

        <p class="mb-1" style="text-align: left;">
          <a href="<?= base_url('auth/forgot_password') ?>" style="text-align: left;">I forgot my password</a>
        </p>
        <p class="mb-0" style="text-align: left;">
          <a href="<?= base_url('auth/registration') ?>" class="text-center" style="text-align: left;">Register a new membership</a>
        </p>
      </div>
    </div>
  </div>
</body>
</html>
