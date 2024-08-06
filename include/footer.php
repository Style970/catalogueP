<!-- bootstrap validation -->
<script>
 (function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }

        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();  

    // JavaScript for password confirmation
    document.addEventListener('DOMContentLoaded', function() {
      var passwordInput = document.getElementById('validationPassword');
      var confirmPasswordInput = document.getElementById('confirmPassword');
      var passwordError = document.getElementById('passwordError');

      confirmPasswordInput.addEventListener('input', function() {
        if (confirmPasswordInput.value !== passwordInput.value) {
          confirmPasswordInput.setCustomValidity('password do not match..');
          
          passwordError.style.display = 'block';
        } else {
          confirmPasswordInput.setCustomValidity('');
          passwordError.style.display = 'none';
        }
      });
    });
</script>
</body>
</html>