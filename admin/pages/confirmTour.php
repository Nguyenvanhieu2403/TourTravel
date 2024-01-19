<?php 
    include_once('../assets/database/ConnectToSql.php');
    session_start();
    $userId = "";
    if(isset($_SESSION["id"])) {
        $userId = $_SESSION["id"];
    }

    if (isset($_GET['idCustomer'])) {
        $id = $_GET['idCustomer'];

        $sql = "UPDATE books set books.Status = 2, Confirm = now(), idEmployee = $userId where books.IdUser = $id";
        $stmt = $con->prepare($sql);
        if($stmt->execute()) {
                echo '<script>alert(`Confirm successfully`)</script>';
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
