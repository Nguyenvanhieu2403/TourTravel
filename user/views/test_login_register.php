<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello Minh dep zai</h1>
    <?php
        if (isset($_SESSION['idDepartment'])) {
            echo $_SESSION['idDepartment'];
            
        } else {
            echo "idDepartment is not set in the session.";
        }
        
    ?>
</body>
</html>