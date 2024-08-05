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

      <p class="login-box-msg">Register a new membership</p>

      <form action="php/code.php" method="post" class="needs-validation" novalidate>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Full name" name="singup_name" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="singup_email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        
        <div class="input-group mb-3">
          <input type="tel" class="form-control" placeholder="Mobile" pattern="^\d{4}\d{3}\d{3}$" name="singup_mobile" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-mobile"></span>
            </div>
          </div>
        </div>
        
      <!-- password -->
        <div class="input-group mb-3">
		<input type="password" class="form-control" id="validationPassword" minlength="8" name="password" placeholder="Password" value="" required>
		<div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
		<div  class="progress input-group" style="height: 5px;">
    <div id="progressbar" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 10%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
      
    </div>
		</div>
		<small id="passwordHelpBlock" class="form-text text-muted">
					Your password must be 8-20 characters long, must contain special characters "!@#$%&*_?",0-9,A-Z,a-z.
		</small>

				<div id="feedbackin" class="valid-feedback">
					Strong Password!
				</div>
				<div id="feedbackirn" class="invalid-feedback">
					Atlead 8 characters,
					Number, special character 
					Caplital Letter and Small letters
				</div>                    
      </div>
      <!-- password end -->  
      <div class="input-group mb-3">
          <input type="password" name="cpassword" id="confirmPassword" class="form-control" placeholder="Retype password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <div class="input-group">
            <div id="passwordError" class="invalid-feedback">
        password do not match..
        </div>
          </div>
        </div> <!--confirm pass end -->
    
           <div class="input-group mb-3">
       <!--g-recaptcha -->
        <div class="g-recaptcha mb-3" data-sitekey="6LdiQKspAAAAAGXoDkAwWCUTOsrU-NMqOP8o-_jT">
         </div>
        <!-- end recaptcha-->
        </div>
        
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary form-check">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree" required class="form-check-input">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
              <div class="invalid-feedback">
             Please check terms and condition.
             </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="register_btn" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
       
      </form>

      <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="<?php echo $loginURL ?>" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div>

      <a href="login.php" class="text-center">I already have a membership</a>

<?php include ("include/script.php"); ?>
<!-- bootstrap Strong password validation -->
<script>
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      // making sure password enters the right characters
		form.validationPassword.addEventListener('keypress', function(event){
			console.log("keypress");
			console.log("event.which: " + event.which);
			var checkx = true;
			var chr = String.fromCharCode(event.which);
			console.log("char: " + chr);
			  

			var matchedCase = new Array();
			matchedCase.push("[!@#$%&*_?]"); // Special Charector
			matchedCase.push("[A-Z]");      // Uppercase Alpabates
			matchedCase.push("[0-9]");      // Numbers
			matchedCase.push("[a-z]");

			for (var i = 0; i < matchedCase.length; i++) {
				if (new RegExp(matchedCase[i]).test(chr)) {
					console.log("checkx: is true");					
					checkx = false;
				}
			}	
      
      if(form.validationPassword.value.length >= 20)
        checkx = true;
			
			if ( checkx ) {
                event.preventDefault();
              	event.stopPropagation();	  
          	}

		});
    
    //Validate Password to have more than 8 Characters and A capital Letter, small letter, number and special character
		// Create an array and push all possible values that you want in password
		var matchedCase = new Array();
		matchedCase.push("[$@$$!%*#?&]"); // Special Charector
		matchedCase.push("[A-Z]");      // Uppercase Alpabates
		matchedCase.push("[0-9]");      // Numbers
		matchedCase.push("[a-z]");     // Lowercase Alphabates
		

		form.validationPassword.addEventListener('keyup', function(){
		
		var messageCase = new Array();
		messageCase.push(" Special Charector"); // Special Charector
		messageCase.push(" Upper Case");      // Uppercase Alpabates
		messageCase.push(" Numbers");      // Numbers
		messageCase.push(" Lower Case");     // Lowercase Alphabates

		var ctr = 0;
		var rti = "";
		for (var i = 0; i < matchedCase.length; i++) {
			if (new RegExp(matchedCase[i]).test(form.validationPassword.value)) {
				if(i == 0) messageCase.splice(messageCase.indexOf(" Special Charector"), 1);
				if(i == 1) messageCase.splice(messageCase.indexOf(" Upper Case"), 1);
				if(i == 2) messageCase.splice(messageCase.indexOf(" Numbers"), 1);
				if(i == 3) messageCase.splice(messageCase.indexOf(" Lower Case"), 1);
				ctr++;
				//console.log(ctr);
				//console.log(rti);
			}
		}		
		
		
		//console.log(rti);
		// Display it
		var progressbar = 0;
		var strength = "";
		var bClass = "";
		switch (ctr) {
		case 0:
		case 1: 
			strength = "Way too Weak";
			progressbar = 15;
			bClass = "bg-danger";
			break;
		case 2:
			strength = "Very Weak";
			progressbar = 25;
			bClass = "bg-danger";
			break;
		case 3:
			strength = "Weak";	
			progressbar = 34;
			bClass = "bg-warning";			
			break;
		case 4:
			strength = "Medium";
			progressbar = 65;
			bClass = "bg-warning";						
			break;
		}
		
		if (strength == "Medium" && form.validationPassword.value.length >= 8 ) {
			strength = "Strong";
			bClass = "bg-success";			
			form.validationPassword.setCustomValidity("");			
		} else {
			form.validationPassword.setCustomValidity(strength);
		}

		var sometext = "";

		if(form.validationPassword.value.length < 8 ){
      var lengthI = 8 - form.validationPassword.value.length;
			sometext += ` ${lengthI} more Characters, `;
		} 

		sometext += messageCase;
		console.log(sometext);
		
		console.log(sometext);

		if(sometext){
			sometext = " You Need" + sometext;
		}


		$("#feedbackin, #feedbackirn").text(strength + sometext);
		$("#progressbar").removeClass( "bg-danger bg-warning bg-success" ).addClass(bClass);
		var plength = form.validationPassword.value.length ;
		if(plength > 0) progressbar += ((plength - 0) * 1.75) ;
		//console.log("plength: " + plength);
		var  percentage = progressbar + "%";
		form.validationPassword.parentNode.classList.add('was-validated');
		//console.log("pacentage: " + percentage);
		$("#progressbar").width( percentage );

				if(form.validationPassword.checkValidity() === true){
					form.verifyPassword.disabled = false;
				} else {
					form.verifyPassword.disabled = true;
				}
          		 
      
    }); 
      

      
    });
  }, false);
})();


</script><!-- Strong password -->
<?php include ("include/footer.php"); ?>