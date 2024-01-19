<?php 
    class DbConnection{
        static function Connect(){
            ini_set("display_errors",1);
            $servername = 'localhost';
            $username = 'root';
            $password = 'Abc@123456789';
            $databasename = 'tourtravel';
            $conn = new mysqli($servername, $username, $password, $databasename);
        
            if($conn->connect_error){
                die("Kết nối thất bại: " . $conn->connect_error);
            }
            else{
                return $conn;
            }
        }
    }

    $con = mysqli_connect("localhost","root","Abc@123456789","tourtravel");

  // Check connection
  if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    // Change character set to utf8
    mysqli_set_charset($con,"utf8");
?>
