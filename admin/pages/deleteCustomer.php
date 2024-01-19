<?php 
    include_once('../assets/database/ConnectToSql.php');

    if (isset($_GET['idCustomer'])) {
        $id = $_GET['idCustomer'];

        $sqlBook = "DELETE FROM books WHERE IdUser = $id";
        $stmtBook = $con->prepare($sqlBook);
        if($stmtBook->execute()) {
            $sqlUser = "DELETE FROM users WHERE Id = $id";
            $stmtUser = $con->prepare($sqlUser);
            if($stmtUser->execute()) {
                echo '<script>alert(`Delete successfully`)</script>';
                echo '<script>window.location.href = "managerCustomer.php";</script>';
                exit();
            }
            else {
                echo '<script>alert(Delete fail`)</script>';
            }
        }
        else {
            echo '<script>alert(Delete fail`)</script>';
        }
        $stmtBook->close();
        $stmtUser->close();
        $con->close();
    }
?>