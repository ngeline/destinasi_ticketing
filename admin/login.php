<?php
  session_start();
  if(isset($_SESSION["level"])){
    header(`Location: ./`.$_SESSION["level"]."/dashboard.php?dashboard");
  }

  include('../setting/connection.php');
  include('../controllers/Authentication/login.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/server/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../assets/server/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/server/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="admin/login.php" class="h1"><b>Admin</b>Ticketing</a>
    </div>
    <div class="card-body">
      <?php
        if(isset($_SESSION["error"])){
            $error = $_SESSION["error"];
            echo '<div class="bg-danger text-center my-1 mx-1"><span class="text-uppercase text-white">'.$error.'</span></div>';
        }
      ?> 
      <p class="login-box-msg">Login to start your session</p>

      <form action="" method="post" id="form-login">
        <div class="input-group mb-3">
          <input name="username" type="username" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="password" type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../assets/server/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/server/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/server/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../assets/server/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">

$(function () {
  $('#form-login').validate({
    rules: {
      username: {
        required: true,
      },
      password: {
        required: true,
        minlength: 3
      }
    },
    messages: {
      username: {
        required: "Mohon isi username!"
      },
      password: {
        required: "Mohon isi password Anda!",
        minlength: "Password tidak boleh kurang dari 3 karakter!"
      }
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.input-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
</body>
</html>

<?php
    unset($_SESSION["error"]);
?>