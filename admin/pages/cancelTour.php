<?php 
    include_once('../assets/database/ConnectToSql.php');

    if (isset($_GET['idCustomer'])) {
        $id = $_GET['idCustomer'];

        $sql = "UPDATE books set Status = 0 where IdUser = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param('i', $id);
        if($stmt->execute()) {
                echo '<script>alert(`Cancel successfully`)</script>';
                echo '<script>window.location.href = "ManagerCustomer.php";</script>';
                exit();
        } 
        else {
            echo '<script>alert(Delete fail`)</script>';
        }
        $stmt->close();
        $con->close();
    }
?>
