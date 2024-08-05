<?php
session_start();
include "include/header.php";
?>

      <p class="login-box-msg">Change pasword</p>

      <form action="php/pass_change_code.php" method="post" class="needs-validation" novalidate>
        
                       <!-- token -->
               <input type="hidden" class="form-control" name="pass_token" value="<?php if(isset($_GET['token'])){echo $_GET['token'];}?>">
               <!-- token -->
               <div class="form-group mt-3">
               <input type="hidden" class="form-control" name="pass_email" value="<?php if(isset($_GET['email'])){echo $_GET['email'];}?>" placeholder="Enter E-mail">
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
                
                <div class="form-group mt-3">
                  <button type="submit" name="update_pass_btn"class="btn btn-primary">Update Password</button>
                </div>
        
      </form>

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


</script><!-- Strong password
<?php include ("include/footer.php"); ?>