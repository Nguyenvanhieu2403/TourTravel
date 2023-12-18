<?php require('includes/header.html'); ?>
<?php
	include_once('../assets/database/ConnectToSql.php');
 ?>
<div class="header-destination ">
    <div class="content">
        <h1 class="text-center fw-bold text-light">Destination</h1>
        <div class="row">
            <h2 class="text-center dirc_destination">
                <a href="#" class="header-destination__home text-light">Home</a>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-right text-danger" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z"/>
                    <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z"/>
                </svg>
                <span class="header-destination__destination text-light">Destination</span>
            </h2>
        </div>
    </div>
</div>  

<?php
    $query = "SELECT d.*, COUNT(t.Id) AS NumberOfTours FROM tourtravel.destination d left JOIN tourtravel.tour t ON d.City = t.City GROUP BY d.City, d.Id, d.Image; ";
	$sql_destination = mysqli_query($con,$query); 
?>

<div class="container mt-5 mb-5">
    <div class="row">
    <?php
	while($row_destination = mysqli_fetch_array($sql_destination)){ 
	?>
        <div class="col-lg-3 col-md-4 col-sm-6 desti--items">
            <div class="desti-content ">
                <div class="desti-content__img">
                    <img src="<?php echo $row_destination['Image'] ?>" alt="">
                </div>
                <div class="desti-text text-light">
                    <h2 class="text-center ml-3 desti-title"><?php echo $row_destination['City'] ?></h2>
                    <p class="desti_places"><?php echo $row_destination['NumberOfTours'] ?> Places</p>
                </div>
            </div>
        </div>
    <?php
        } 
    ?>
    </div>
</div>


<?php require('includes/footer.html'); ?>