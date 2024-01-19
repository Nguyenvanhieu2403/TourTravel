<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $des = $_POST['city'];
        $tourtype = $_POST['tourtype'];
        $person = $_POST['person'];
        $date = $_POST['date'];

        // echo $des .' ' .$tourtype .' ' .$person .' ' .$date;
        $sqlTour = "select * from tour where City = $des and TourType = $tourtype";
    }
?>