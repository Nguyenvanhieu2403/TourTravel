<?php require('includes/header.html'); ?>
<?php 
    // Connect to database
    $servername = 'localhost:3306';
    $username = 'root';
    $password = 'Nobisuke.8888';
    $databasename = 'travle';

    $connect = new mysqli($servername,$username,$password,$databasename);
    if($connect->connect_error){
        die("Kết nối thất bại ".$connect->connect_error);
    }

    // Input data
    $firstName ="";
    $lastName = "";
    $fullName = "";
    $phoneNumber = "";
    $email = "";
    $passwordAdmin = "";
    $status = 0;

    $errFirstName = "";
    $errLastName = "";
    $errPhoneNumber = "";
    $errEmail = "";
    $errPasswordAdmin = "";

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
                $errFirstName = 'First name is not valid';
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

        // Create query
        if($isValid){
            $newAccount = $connect->prepare("INSERT INTO `admin` (`FullName`, `PhoneNumber`, `Email`, `Password`, `Status`)
            VALUES (?,?,?,?,?);");
            $newAccount->bind_param("sissi", $fullName, $phoneNumber, $email,$passwordAdmin,$status);
            $newAccount->execute();
            $newAccount->close();
            $connect->close();
        }  
    }
?>
    <!-- <div class="register-container">
        <div class="register-intro">
            <div class="register-intro-logo">
                <img src="" alt="">
            </div>
            <div class="register-intro-heading"></div>
            <div class="register-intro-desc"></div>
            <div class="register-intro-contact"></div>
        </div>
        <div class="register-form">
            <form action="" method="POST">
                <input type="text" name="firstName" id="firstName" placeholder="First name"><br>
                <span style="color:red"><?php echo $errFirstName ?></span><br>

                <input type="text" name="lastName" id="lastName" placeholder="Last name"><br>
                <span style="color:red"><?php echo $errLastName ?></span><br>

                <input type="text" name="phoneNumber" id="phoneNumber" placeholder="Phone number"><br>
                <span style="color:red"><?php echo $errPhoneNumber ?></span><br>

                <input type="text" name="email" id="email" placeholder="Email"><br>
                <span style="color:red"><?php echo $errEmail ?></span><br>

                <input type="password" name="password" id="password" placeholder="Password"><br>
                <span style="color:red"><?php echo $errPasswordAdmin ?></span><br>

                <input type="submit">
            </form>
        </div>
    </div> -->
<div class="register">
    <div class="register-container">
        <div class="register-intro">
            <div class="register-intro-logo">
                <img src="\Source\user\assets\img\login_register\logo-w.svg" alt="" class="img-svg">
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
        <div class="register-form">
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
                    <span style="color:yellow"><?php echo $errPhoneNumber ?></span><br>
                </div>
                
                <div class="form-group group-email">
                    <input type="text" name="email" id="email" placeholder="Email"><br>
                    <span style="color:yellow"><?php echo $errEmail ?></span><br>
                </div>
                <div class="form-group group-password">
                    <input type="password" name="password" id="password" placeholder="Password"><br>
                    <span style="color:yellow"><?php echo $errPasswordAdmin ?></span><br>
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



