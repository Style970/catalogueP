<?php
session_start();
include "include/header.php";
?>

      <p class="login-box-msg">Create Password Reset Link</p>

      <form action="php/forgot_code.php" method="post" class="needs-validation" novalidate>
                       <div class="form-group mt-3">
               <input type="email" class="form-control" name="email" placeholder="Enter E-Mail" required>
                </div>
                            <!--g-recaptcha -->
               <div class="g-recaptcha mb-3" data-sitekey="6LdiQKspAAAAAGXoDkAwWCUTOsrU-NMqOP8o-_jT">
              </div>
              <!-- end recaptcha-->
                
                <div class="form-group mt-3">
                  <button type="submit" name="pass_reset_btn"class="btn btn-primary">Send Password reset link</button>
                </div>
        </form>
      <a href="login.php" class="text-center">Go to login</a>
      
<?php include ("include/script.php"); ?>
<?php include ("include/footer.php"); ?>