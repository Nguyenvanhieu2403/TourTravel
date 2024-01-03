<?php
    require(__DIR__. '\\include\\header-Links.html');
	include_once('../assets/database/ConnectToSql.php');
?>
<?php 
    // Check cookie 
    $rememberedUsername = isset($_COOKIE['username']) ? $_COOKIE['username'] : '';
    $rememberedPassword = isset($_COOKIE['password']) ? $_COOKIE['password'] : '';

    // Post data
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nameAccount = $_POST["nameAccount"];
        $passwordAdmin = $_POST["passwordAdmin"];
        $rememberMe = isset($_POST["remember_me"]) && $_POST["remember_me"] === 'on';
        $checkAccount = $con->prepare("SELECT * FROM `employees` WHERE `Email` = ? AND `Password` = ?");
        $checkAccount->bind_param("ss", $nameAccount, $passwordAdmin);
        $checkAccount->execute();

        // Get result from query 
        $result = $checkAccount->get_result();
        // Status = 0: Employee's account
        // Status = 1: Account has not been approved
        // Status = 2: Account has been approved
        // Status = 3: Supper admin's account

        if ($result->num_rows > 0) {
            // Convert result to array 
            $row = $result->fetch_assoc();
            $status = $row['Status'];
            $Id = $row['Id'];
            if($status == 0){
                header("Location: dashBoard.php"); // For employee
            }
            else if($status == 1){
                echo "Tài khoản chưa được phê duyệt";
            }
            else if($status == 2){
                if($rememberMe)
                {
                    $hour = time() + 3600 * 24 * 30;
                    setcookie('username', $nameAccount, $hour);
                    setcookie('password', $passwordAdmin, $hour);
                    setcookie('Id', $Id, $hour);
                    $Id = $_COOKIE['Id'];
                    echo "<script> alert($Id)</script>";
                }
                else {
                    // Hủy cookie
                    setcookie('username', '', time() - 3600); 
                    setcookie('password', '', time() - 3600);
                    setcookie('Id', '', time() - 3600);
                }
                echo "Đăng nhập thành công";
                header("Location: dashBoard.php"); // Change to home page (admin)
            }
            else{
                echo "Đăng nhập với quyền supper admin thành công";
                // header("Location: test.html"); // Change to home page
            }
            $checkAccount->close();

        } else {
            echo "Tài khoản hoặc mật khẩu không đúng";
            $checkAccount->close();
        }
    }
?>
    <!-- <form action="" method="POST">
        <input type="text" name="nameAccount" id="nameAccount" placeholder="Email" value="<?php echo $rememberedUsername; ?>"><br>
        <input type="password" name="passwordAdmin" id="passwordAdmin" placeholder="Password" value="<?php echo $rememberedPassword; ?>"><br>
        <input type="checkbox" name="remember_me" <?php echo $rememberedUsername !== '' ? 'checked' : ''; ?>/> Remember me <br>
        <input type="submit">
    </form> -->
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
                <h1>Sign In</h1>
                <form action="" method="POST">
                    <div class="form-group group-nameAccount">
                        <input type="text" name="nameAccount" id="nameAccount" placeholder="Email" value="<?php echo $rememberedUsername; ?>"><br>
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <div class="form-group group-password">
                        <input type="password" name="passwordAdmin" id="passwordAdmin" placeholder="Password" value="<?php echo $rememberedPassword; ?>"><br>
                        <i class="fa-solid fa-lock"></i>
                    </div>
                    <div class="group-checkbox">
                        <input type="checkbox" name="remember_me" <?php echo $rememberedUsername !== '' ? 'checked' : ''; ?>/><span style="color:#fff">Remember me </span> <br>
                    </div>
                    <div class="form-group group-submit group-login">
                        <input type="submit" value="Login">
                    </div>
                    <div class="register-navigate-login">
                        <p>Don't have an account? <a href="./register.php">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>



