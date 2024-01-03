<?php
    require(__DIR__. '\\include\\header-Links.html');
	include_once('../assets/database/ConnectToSql.php');
?>
<?php 

    // Input data
    $firstName ="";
    $lastName = "";
    $fullName = "";
    $phoneNumber = "";
    $email = "";
    $dob = "";
    $passwordAdmin = "";
    $repeatPasswordAdmin = "";
    $status = 0;

    $errFirstName = "";
    $errLastName = "";
    $errPhoneNumber = "";
    $errEmail = "";
    $errPasswordAdmin = "";
    $errDob = "";
    $errRepeatPasswordAdmin = "";
    // Validate 
    $isValid = true;
    $nameRegex = '/^[^\W\d_]+$/u';
    $passwordRegex = '/^(?=.*[!@#$%^&*()_+{}\[\]:;<>,.?~\\-])(?=.*[A-Z])(?!.*\s).*$/';
    $phoneRegex = '/^\d{10}$/';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(empty($_POST["firstName"])){
            $errFirstName = 'First name is required';
            $isValid = false;
        }
        else{
            $firstName = $_POST["firstName"];
            if(!preg_match($nameRegex,$firstName)){
                $errFirstName = '<br>First name is not valid';
                $isValid = false;
            }
        }
        if(empty($_POST["lastName"])){
            $errLastName = 'Last name is required';
            $isValid = false;
        }
        else{
            $lastName = $_POST["lastName"];
            if(!preg_match($nameRegex,$lastName)){
                $errLastName = 'Last name is not valid';
                $isValid = false;
            }
            $fullName = $firstName . ' ' . $lastName;
        }
        if(empty($_POST["phoneNumber"])){
            $errPhoneNumber = 'Phone number is required';
            $isValid = false;
        }
        else{
            $phoneNumber = $_POST["phoneNumber"];
            if(!preg_match($phoneRegex,$phoneNumber)){
                $errPhoneNumber = 'Phone number is not valid (10 numbers)';
                $isValid = false;
            }
        }
        if(empty($_POST["email"])){
            $errEmail = 'Email is required';
            $isValid = false;
        }
        else{
            $email = $_POST["email"];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errEmail = 'Email is not valid (required @ character)';
                $isValid = false;
            }
            else{
                $checkAccount = $con->prepare("SELECT * FROM `employees` WHERE `Email` = ? ");
                $checkAccount->bind_param("s", $email);
                $checkAccount->execute();
                $result = $checkAccount->get_result();
                if($result->num_rows > 0){
                    $errEmail = "This email has been registered";
                    $checkAccount->close();
                    $con->close();
                    $isValid = false;
                }
            }
        }
        if(empty($_POST["dob"])){
            $errDob = 'Date of birth is required';
            $isValid = false;
        }
        else{
            $dob = $_POST["dob"];
        }
        if(empty($_POST["password"])){
            $errPasswordAdmin = 'Password is required';
            $isValid = false;
        }
        else{
            $passwordAdmin = $_POST["password"];
            if(!preg_match($passwordRegex,$passwordAdmin)){
                $errPasswordAdmin = 'Password is not valid, password contains at least one <br>special character, a capital letter, and no spaces';
                $isValid = false;
            }
        }
        if(empty($_POST["repeat-password"])){
            $errPasswordAdmin = 'Repeat password is required';
            $isValid = false;
        }
        else{
            $repeatPasswordAdmin = $_POST["repeat-password"];
            if($repeatPasswordAdmin !== $passwordAdmin){
                $errRepeatPasswordAdmin = 'Repeat password is not match';
                $isValid = false;
            }
        }
        // Create query
        if($isValid){
            $dobFormatted = date('Y-m-d', strtotime($dob));
            // Encrypt password 
            $passwordEncode = password_hash($passwordAdmin,PASSWORD_DEFAULT);
            $newAccount = $con->prepare("INSERT INTO `employees` (`FullName`, `PhoneNumber`, `Email`, `Password`,`DOB`, `Status`)
            VALUES (?,?,?,?,?,?);");
            $newAccount->bind_param("sisssi", $fullName, $phoneNumber, $email,$passwordEncode,$dob,$status);
            $newAccount->execute();
            $newAccount->close();
            $con->close();
        }  
    }
?>

<div class="register">
    <div class="register-container">
        <div class="row m-0 container-fluid p-0">
            <div class="register-intro col-md-6 ">
                <div class="register-intro-logo">
                    <img src="/user/assets/img/login_register/logo-w.svg" alt="" class="img-svg">
                </div>
                <div class="register-intro-heading">
                    <h1>Welcome! <br>To Our Website </h1>
                </div>
                <div class="register-intro-desc">
                    <p>Travel is life, experiencing wonderful things,<br> we bring you memorable trips, helping you love life more.</p>
                </div>
                <div class="register-intro-contact">
                    <div class="register-contact-fb">
                        <a href="#">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                    </div>
                    <div class="register-contact-ig">
                        <a href="#">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    </div>
                    <div class="register-contact-tw">
                        <a href="#">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="register-form col-md-6 col-sm-12">
                <h1>Register</h1>
                <form action="" method="POST">
                    <div class="form-group group-name">
                        <input type="text" name="firstName" id="firstName" placeholder="First name"><br>
                        <span style="color:yellow"><?php echo $errFirstName ?></span><br>
        
                        <input type="text" name="lastName" id="lastName" placeholder="Last name"><br>
                        <span style="color:yellow"><?php echo $errLastName ?></span><br>
                    </div>
                    
                    <div class="form-group group-phoneNumber">
                        <input type="text" name="phoneNumber" id="phoneNumber" placeholder="Phone number"><br>
                        <i class="fa-solid fa-phone"></i>
                        <span style="color:yellow"><?php echo $errPhoneNumber ?></span><br>
                    </div>
                    
                    <div class="form-group group-email">
                        <input type="text" name="email" id="email" placeholder="Email"><br>
                        <i class="fa-regular fa-envelope"></i>
                        <span style="color:yellow"><?php echo $errEmail ?></span><br>
                    </div>
                    <div class="form-group group-dob">
                        <input type="date" name="dob" id="dob" placeholder="Date of birth"><br>
                        <span style="color:yellow"><?php echo $errDob ?></span><br>
                    </div>
                    <div class="form-group group-password">
                        <input type="password" name="password" id="password" placeholder="Password"><br>
                        <i class="fa-solid fa-lock"></i>
                        <span style="color:yellow"><?php echo $errPasswordAdmin ?></span><br>
                    </div>
                    <div class="form-group group-password">
                        <input type="password" name="repeat-password" id="repeat-password" placeholder="Repeat password"><br>
                        <i class="fa-solid fa-lock"></i>
                        <span style="color:yellow"><?php echo $errRepeatPasswordAdmin ?></span><br>
                    </div>
                    <div class="form-group group-submit">
                        <input type="submit" value="Register">
                    </div>
                    <div class="register-navigate-login">
                        <p>Already have account? <a href="./login.php">Sign In</a> </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



