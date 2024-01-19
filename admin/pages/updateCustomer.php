<?php 
    include_once('../assets/database/ConnectToSql.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['customerId'];
        
        $fullName = $_POST['FullName'];
        $email = $_POST['Email'];
        $phoneNumber = $_POST['PhoneNumber'];
        $tourType = $_POST['TourType'];
        $price = $_POST['Price'];
        $adult = $_POST['Adult'];
        $child = $_POST['Child'];
        $date = $_POST['Date'];
    
        $sql = "UPDATE books b
        JOIN users u ON b.IdUser = u.Id
        JOIN tourdetail td ON b.IdTour = td.TourId
        JOIN tour t ON td.TourId = t.Id
        SET
          u.FullName = ?,
          u.Email = ?,
          u.PhoneNumber = ?,
          t.TourType = ?,
          t.Price = ?,
          u.Adult = ?,
          u.Child = ?,
          b.CreateDate = ?
        WHERE
          b.IdUser = $id";
        $stmt = $con->prepare($sql);
        $stmt->bind_param('ssssdiis', $fullName, $email, $phoneNumber, $tourType, $price, $adult, $child, $date);
        if($stmt->execute()) {
            echo '<script>alert(`Update successfully`)</script>';
            echo '<script>window.location.href = "managerCustomer.php";</script>';
            exit();
        }
        else {
            echo '<script>alert(`Update failed. Error: ' . $stmt->error . '`)</script>';
        }
        $stmt->close();
        $con->close();
    }

?>