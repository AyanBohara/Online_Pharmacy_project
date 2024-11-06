<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
        integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="login.css">
    
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Signin-signup form</title>
</head>

<body>
<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

    <!-- register_form -->


    <div class="container" id="main">
        <div class="form-container sign-up-container">
             <form name="myForm" onsubmit="return validateForm()" action="register.php" method="post">
                <h2>Create Account</h2>
                <input type="text" name="FirstName" placeholder="First Name" id="FirstName"> <br>
                <input type="text" name="LastName" placeholder="Last Name" id="LastName"> <br>
                <input type="email" name="Email" placeholder="email" name="email" required>
                <br>
                <input type="password" name="Password" placeholder="Password" id="Password">

                <br>
                <button type="submit">Register</button>
            </form>
        </div>

        <!-- LOgin form -->



        <div class="form-container sign-in-container">
        <!-- <form name="myForm" onsubmit="return validateForm()"> -->
            <form action="login.php" method="post">
                <h2>Sign in</h2>
                <span>or use your account</span>
                <div class="input-field"></div>
                <input type="email" name="Email" placeholder="email" name="email" required>

                <input type="password" name="Password" placeholder="Password" required>

                <!-- <a href="#">Forgot your password?</a> -->
                <button type="submit">Login</button><br>
                <!-- <input type="checkbox" id="check">Remember me -->
                <!-- <label for="check">Remember me</label> -->
            </form>
        </div>




        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h2>Welcome Back</h2>
                    <p>To keep connected with us please login with your personal info</p>
                    <button onclick="removePanel()" class="ghost" id="signIn">Sign In</button>
                </div>

                <div class="overlay-panel overlay-right">
                    <h1>Hello Friend</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button onclick="addPanel()" class="ghost" id="signUp">Register</button>
                </div>
            </div>
        </div>
    </div>
    </form>
    <script type="text/javascript">
        function validateForm() {
            var firstName = document.forms["myForm"]["FirstName"].value;
            var lastName = document.forms["myForm"]["LastName"].value;
            var email = document.forms["myForm"]["Email"].value;
            var password = document.forms["myForm"]["Password"].value;

            if (firstName.trim() == "" || lastName.trim() == "" || email.trim() == "" || password.trim() == "") {
                alert("All fields must be filled out");
                return false;
            }

            if (!isValidName(firstName)) {
                alert("First name should only contain alphabetic characters");
                return false;
            }

            if (!isValidName(lastName)) {
                alert("Last name should only contain alphabetic characters");
                return false;
            }

            if (!isValidEmail(email)) {
                alert("Please enter a valid email address");
                return false;
            }

            if (!isValidPassword(password)) {
                alert("Password must be at least 5 characters long and contains lowercase letter, one digit, and one special character");
                return false;
            }

            return true; // Form will be submitted if all checks pass.
        }

        function isValidName(name) {
            var namePattern = /^[a-zA-Z]+$/;
            return namePattern.test(name);
        }

        function isValidEmail(email) {
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailPattern.test(email);
        }

        function isValidPassword(password) {
    var passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[@#$%^&+=]).{5,}$/;
    return passwordPattern.test(password);
}
let signUpButton = document.getElementById("signUp");
let signInButton = document.getElementById("signIn");
let container = document.getElementById("main");

signUpButton.addEventListener("click", () => {
  container.classList.add("right-panel-active");
});

signInButton.addEventListener("click", () => {
  container.classList.remove("right-panel-active");
});


    </script>
    <!-- <script src="main.js"></script> -->
</body>

</html>