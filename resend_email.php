<?php
session_start();
include "include/header.php";
?>

      <p class="login-box-msg">Resend email verification Link</p>

      <form action="php/resend_code.php" method="post" class="needs-validation" novalidate>
         <div class="form-group mt-3">
           <input type="email" class="form-control" name="resend_email" placeholder="E-Mail" required>
          </div>
            <!--g-recaptcha -->
         <div class="g-recaptcha mb-3" data-sitekey="6LdiQKspAAAAAGXoDkAwWCUTOsrU-NMqOP8o-_jT">
          </div>
         <!-- end recaptcha-->
                
           <div class="form-group mt-3">
                  <button type="submit" name="resend_btn"class="btn btn-primary">Resend link</button>
            </div>
     </form>
      <a href="login.php" class="text-center">I already have a membership</a>

<?php include ("include/script.php"); ?>
<?php include ("include/footer.php"); ?>