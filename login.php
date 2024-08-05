<?php
require_once "google_api/config.php";
if(isset($_SESSION['auth'])){
  
    if($_SESSION['auth'] == "1"){
    $_SESSION['status'] = "<h6 class='text-danger'>Alredy loged in</h6>";
  header('Location: admin/index.php');
    exit(0);
  }else{
    if($_SESSION['auth'] == "2"){
      $_SESSION['status'] = "<h6 class='text-danger'>Alredy loged in</h6>";
      header('Location: user_dashbord/index.php');
      exit(0);
    }else{
    //  header('Location: login.php');
   //  exit(0);
    }
  
  }
}
$loginURL = $gClient->createAuthUrl();

include "include/header.php";
?>

      <p class="login-box-msg">Sign in to start your session</p>

      <form action="admin/loginCode.php" method="post" class="needs-validation" novalidate>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" required>
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
            <button type="submit" name="login_btn" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="<?php echo $loginURL ?>" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="fogot_pass.php">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.php" class="text-center">Register a new membership</a>
      </p>

<?php include ("include/script.php"); ?>
<?php include ("include/footer.php"); ?>