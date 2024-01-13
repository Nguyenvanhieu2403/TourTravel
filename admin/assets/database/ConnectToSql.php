<?php
  class DBConnection{
    static function Connect() {
        ini_set("display_errors",1);
        $servername = "localhost";
        $username = "root";
        $password = "provipxop";
        $dbname = "tourtravel";
        // Khởi tạo kết nối
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Kiểm tra kết nối
        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }else{
            return $conn;
        }
    }
  }
  $con = mysqli_connect("localhost","root","provipxop","tourtravel");

  // Check connection
  if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
      // Change character set to utf8
    mysqli_set_charset($con,"utf8");
	
?>