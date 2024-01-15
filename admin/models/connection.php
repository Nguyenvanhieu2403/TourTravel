<?php 
    class DbConnection{
        static function Connect(){
            ini_set("display_errors",1);
            $servername = 'localhost';
            $username = 'root';
            $password = 'Nobisuke.8888';
            $databasename = 'travel';
            $conn = new mysqli($servername, $username, $password, $databasename);
        
            if($conn->connect_error){
                die("Kết nối thất bại: " . $conn->connect_error);
            }
            else{
                return $conn;
            }
        }
    }

    $con = mysqli_connect("localhost","root","Nobisuke.8888","travel");
    // Check connection
    if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    // Change character set to utf8
    mysqli_set_charset($con,"utf8");
?>
