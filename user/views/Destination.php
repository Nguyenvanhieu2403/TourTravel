<?php require('includes/header.html'); ?>
<?php require('includes/navbar.html'); ?>
<?php
include_once('../assets/database/ConnectToSql.php');
?>
<div class="header-destination ">
    <div class="content">
        <h1 class="text-center fw-bold text-light">Destination</h1>
        <div class="row">
            <h2 class="text-center dirc_destination">
                <a href="homepage.php" class="header-destination__home text-light">Home</a>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-chevron-double-right text-danger" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z" />
                    <path fill-rule="evenodd"
                        d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z" />
                </svg>
                <span class="header-destination__destination text-light">Destination</span>
            </h2>
        </div>
    </div>
</div>

<?php
$itemsPerPage = 8; // Number of items to display per page
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // Current page, default is 1

$offset = ($currentPage - 1) * $itemsPerPage;

// Your existing query code with modifications for pagination
$query = "SELECT count(d.Id) as totalItems,  d.*, COUNT(ctd.Id) AS NumberOfTours 
          FROM tourtravel.destination d 
          LEFT JOIN tourtravel.citytourdestination ctd ON d.Id = ctd.IdDestination 
          left JOIN tourtravel.tour t ON ctd.IdTour = t.Id ";

if (isset($_GET['search']) && isset($_GET['param'])) {
    $searchValue = $_GET['search'];
    $paramValue = $_GET['param'];
    $query .= "WHERE d.City LIKE '%$searchValue%' AND t.TourType IN ($paramValue) ";
} elseif (isset($_GET['search'])) {
    $searchValue = $_GET['search'];
    $query .= "WHERE d.City LIKE '%$searchValue%' ";
} elseif (isset($_GET['param'])) {
    $paramValue = $_GET['param'];
    $query .= "WHERE t.TourType IN ($paramValue) ";
}

$query .= "GROUP BY d.City, d.Id, d.Image LIMIT $itemsPerPage OFFSET $offset";

$sql_destination = mysqli_query($con, $query);


$querycount = "SELECT count(d.Id) as totalItems
               FROM tourtravel.destination d 
               LEFT JOIN tourtravel.tour t ON d.City = t.City ";
$sqlcount = mysqli_query($con, $querycount);
$countData = mysqli_fetch_assoc($sqlcount);
$totalItems = $countData['totalItems'];
?>

<?php
if (mysqli_num_rows($sql_destination) > 0) {
?>

<div class="container mt-5 mb-5">
    <div class="row">
        <?php
    while ($row_destination = mysqli_fetch_array($sql_destination)) {
        ?>
        <div class="col-lg-3 col-md-4 col-sm-6 desti--items">
            <div class="desti-content" id="<?php echo $row_destination['Id'] ?>">
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
<!-- Pagination links -->
<div class="row m-3">
    <div class="col-md-12">
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <?php
                    // Calculate the total number of pages
                    $totalPages = ceil($totalItems / $itemsPerPage);

                    // Previous page link
                    $prevPage = max($currentPage - 1, 1);
                    echo "<li class='page-item'><a class='page-link' href='Destination.php?page=$prevPage' aria-label='Previous'><span aria-hidden='true'>&laquo;</span></a></li>";

                    // Page links
                    $startPage = max(min($currentPage - 2, $totalPages - 4), 1);
                    $endPage = min($startPage + 4, $totalPages);

                    for ($i = $startPage; $i <= $endPage; $i++) {
                        echo "<li class='page-item " . ($currentPage == $i ? 'active' : '') . "'><a class='page-link' href='Destination.php?page=$i'>$i</a></li>";
                    }

                    // Next page link
                    if ($endPage < $totalPages) {
                        $nextPage = $endPage + 1;
                        echo "<li class='page-item'><a class='page-link' href='Destination.php?page=$nextPage' aria-label='Next'><span aria-hidden='true'>&raquo;</span></a></li>";
                    }
                ?>
            </ul>
        </nav>
    </div>
</div>
<?php
} else {
    echo "<h1>Không có dữ liệu</h1>";
}
?>

<script>
    $(document).ready(function () {
        $(".desti-content").click(function () {
            // Lấy id của phần tử destinationt
            var destinationId = $(this).attr("id");
            // Chuyển trang theo id của destinationt
            window.location.href = "Destination_Detail.php?id=" + destinationId;
        });
    });
</script>

<?php require('includes/footer.html'); ?>
