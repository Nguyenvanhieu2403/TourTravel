<?php
	include_once('../assets/database/ConnectToSql.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fullname = $_POST['fullNameBook'];
        $email = $_POST['emailBook'];
        $phone = $_POST['phoneBook'];
        $ticket = $_POST['ticketTypeBook'];
        $adult = $_POST['Adult'];
        $child = $_POST['Child'];
        $date = $_POST['checkIn'];
        $message = $_POST['messageBook'];
        $status = 1;


        $stmt = $con->prepare("insert into users(fullname, phonenumber, email, tickettype, adult, child, dateofdepartment, message, status) values ( ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssiissi", $fullname, $phone, $email, $ticket, $adult, $child, $date, $message, $status);
        

        if($stmt->execute()) {
            echo "Insert successfully";
        }
        else {
            echo "Insert fail";
        }
    }
    $con->close()
?>
