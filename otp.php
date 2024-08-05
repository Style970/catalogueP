<?php
session_start();
include "include/header.php";
?>

      <p class="login-box-msg">Verify Mobile Number </p>

      <form action="php/otp_code.php" method="post" class="needs-validation" novalidate>
        <input type="hidden" name="mobile" value="<?php if(isset($_SESSION['mobile_session'])){
        echo $_SESSION['mobile_session'];} ?>">
         <div class="form-group mt-3">
           <input type="number" class="form-control" name="otp_mobile" placeholder="Enter OTP" required>
          </div>

                
           <div class="form-group mt-3">
                  <button type="submit" name="otp_verify_btn" class="btn btn-success">Verify OTP</button>
            </div>
            <div class="form-group mt-3">
              <button class="btn btn-link">Resend code ?</button>
            </div>
     </form>
  
<?php include ("include/script.php"); ?>
<?php include ("include/footer.php"); ?>