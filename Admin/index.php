<?php
  ob_start();
  session_start();
   include("include/db.php");
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action=" " method="POST">
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <input type="submit" class="btn btn-primary btn-block" name="login" value="Sign In">
          </div>
          <!-- /.col -->
        </div>
      </form>


      <?php
      
        if (isset($_POST['login'])){
          $email    = $_POST['email'];
          $password = $_POST['password'];
          // echo $email ."<br>". $password;
          $hassedPass = sha1($password);

          // Find login user from Database
          $sql = "SELECT * FROM users WHERE email='$email' ";
          $authUser = mysqli_query($db, $sql);

        while( $row = mysqli_fetch_array($authUser) ){
          $_SESSION['id']         = $row['id'];
          $_SESSION['fullname']   = $row['fullname'];
          $_SESSION['email']      = $row['email'];
          $_SESSION['username']   = $row['username'];
          $_SESSION['dbPassword'] = $row['password'];
          $_SESSION['phone']      = $row['phone'];
          $_SESSION['address']    = $row['address'];
          $_SESSION['role']       = $row['role'];
          $_SESSION['status']     = $row['status'];
          $_SESSION['image']      = $row['image'];
          $_SESSION['join_date']  = $row['join_date'];

          if( $email== $_SESSION['email'] && $hassedPass == $_SESSION['dbPassword'] && $_SESSION['status']==1 ){
            header("Location: dashboard.php");

          }
          else if( $email != $_SESSION['email'] || $hassedPass != $_SESSION['dbPassword'] ){
            header("Location: index.php");

          }
          else{
            header("Location: index.php");
          }
        }
      }

    ?>

      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="recover-password.php">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.php" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<?php 
ob_end_flush();
?>
</body>
</html>