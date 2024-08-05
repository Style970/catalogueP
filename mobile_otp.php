<?php
session_start();
include "include/header.php";
?>

      <p class="login-box-msg">Mobile Number Verification </p>

      <form action="php/mobile_otp_code.php" method="post" class="needs-validation" novalidate>
          <input type="hidden" class="form-control" name="user_id" value="
          <?php if(isset($_SESSION['auth_user'])){
        echo $_SESSION['auth_user']['user_id'];} ?>
        ">
           
         <div class="form-group mt-3">
           <input type="number" class="form-control" name="otp_mobile" placeholder="Mobile Number" required>
          </div>
            <!--g-recaptcha -->
         <div class="g-recaptcha mb-3" data-sitekey="6LdiQKspAAAAAGXoDkAwWCUTOsrU-NMqOP8o-_jT">
          </div>
         <!-- end recaptcha-->
                
           <div class="form-group mt-3">
                  <button type="submit" name="otp_send_btn"class="btn btn-primary">Send OTP</button>
            </div>
     </form>
  
<?php include ("include/script.php"); ?>
<?php include ("include/footer.php"); ?>