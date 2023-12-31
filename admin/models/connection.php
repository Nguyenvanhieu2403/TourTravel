<?php 
    class DbConnection{
        static function Connect(){
            ini_set("display_errors",1);
            $servername = 'localhost:3306';
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
?>