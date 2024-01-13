<?php require('includes/header.html'); ?>
<?php require('includes/navbar.html'); ?>
<?php
	include_once('../assets/database/ConnectToSql.php');
?>

<div class="header-destination header-tour ">
    <div class="content">
        <h1 class="text-center fw-bold text-light">Tour</h1>
        <div class="row">
            <h2 class="text-center dirc_destination__detail">
                <a href="#" class="header-destination__home header-destination__detail__home text-light">Home</a>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-right text-danger" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z"/>
                    <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z"/>
                </svg>
                <span class="header-destination__destination header-destination__detail__destination__detail text-light">Tour</span>
            </h2>
        </div>
    </div>
</div> 

<?php

    $queryTourType = "select distinct TourType from tour where Status = 1";
	$sql_TourType = mysqli_query($con,$queryTourType); 

    $queryPackage = "select t.Title as Title, t.Price as Price, img.Image as Image from tour t join images img on t.Id = img.TourId where img.Status = 3";
	$sql_Package = mysqli_query($con,$queryPackage); 
    $count = 0;

    // Pagding
    $itemsPerPage = 8;

    // Get the current page number from the query string
    $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;

    // Calculate the offset for the SQL query
    $offset = ($currentPage - 1) * $itemsPerPage;

    // Modify your existing query to include LIMIT and OFFSET
    $query = "SELECT COUNT(*) as totalItems,t.Id, t.Title as Title, t.Price as Price, t.Day as Day, t.Night as Night, t.City as City, img.Image as Image 
              FROM tour t 
              JOIN images img ON t.Id = img.TourId 
              WHERE img.Status = 1";

    if(isset($_GET['search'])) {
        $search = $_GET['search'];
        $query .= " AND t.Title LIKE N'%$search%'";
    }
    else if(isset($_GET['param'])) {
        $param = $_GET['param'];
        $query .= " AND t.TourType IN ($param)";
    }
    else if(isset($_GET['duration'])) {
        $duration = $_GET['duration'];
        $query .= " AND t.Day IN ($duration)";
    }
    $query .= " GROUP BY t.Id, t.Title, t.Price, t.Day, t.Night, t.City, img.Image";
    $query .= " LIMIT $offset, $itemsPerPage";

    // Execute the modified query
    $sql_tour = mysqli_query($con, $query);

    $countQuery = "SELECT COUNT(*) as totalItems FROM tour t JOIN images img ON t.Id = img.TourId WHERE img.Status = 1";
    $countResult = mysqli_query($con, $countQuery);
    $countData = mysqli_fetch_assoc($countResult);
    $totalItems = $countData['totalItems'];
?>

<div class="container">
    <div class="tour__container">
        <div class="row">
            <div class="col-md-8">
                <div class="row row-items">
                    <?php
                        while($row_tour = mysqli_fetch_array($sql_tour)){ 
                    ?>
                        <div class="col-md-6 row-item mb-3">
                            <div class="tour__img">
                                <img src="<?php echo $row_tour['Image'] ?>" alt="">
                                <div class="tour__time">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                        <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/>
                                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0"/>
                                    </svg>
                                    <span><?php echo $row_tour['Day'] ?> Day & <?php echo $row_tour['Night'] ?> Night</span>
                                </div>
                            </div>
                            <div class="tour__title mt-4">
                                <h4><?php echo $row_tour['Title'] ?></h4>
                            </div>
                            <div class="tour__description">
                                <div class="row tour__description--items">
                                    <div class="tour__description--btn col-6" Id="<?php echo $row_tour['Id'] ?>">
                                        <a href="#" class="btn btn-light">
                                            Book Now
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8"/>
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="tour-description--price col-6">
                                        <span>From</span>
                                        <h6 >
                                            <span class="fs-5 fw-bold ">$<?php echo number_format($row_tour['Price'], 2, '.', '') ?></span>
                                            <span class="tour-description--price__per">Per Person</span>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                        }    
                    ?>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <nav aria-label="tour__pagination">
                        <?php   

                            function buildUrl($page) {
                                $url = "Tour.php?page=$page";

                                if (isset($_GET['search'])) {
                                    $url .= "&search=" . urlencode($_GET['search']);
                                }

                                if (isset($_GET['param'])) {
                                    $url .= "&param=" . urlencode($_GET['param']);
                                }

                                if (isset($_GET['duration'])) {
                                    $url .= "&duration=" . urlencode($_GET['duration']);
                                }

                                return $url;
                            }

                            echo "<div class='col-md-12'>";
                            echo "<nav aria-label='tour__pagination'>";
                            echo "<ul class='pagination justify-content-center'>";
                            
                            // Calculate the total number of pages
                            $totalPages = ceil($totalItems / $itemsPerPage);
                            
                            // Previous page link
                            $prevPage = max($currentPage - 1, 1);
                            echo "<li class='page-item'><a class='page-link' href='" . buildUrl($prevPage) . "' aria-label='Previous'><span aria-hidden='true'>&laquo;</span></a></li>";
                            
                            // Page links
                            $startPage = max(min($currentPage - 2, $totalPages - 4), 1);
                            $endPage = min($startPage + 4, $totalPages);
                            
                            for ($i = $startPage; $i <= $endPage; $i++) {
                                echo "<li class='page-item " . ($currentPage == $i ? 'active' : '') . "'><a class='page-link' href='" . buildUrl($i) . "'>$i</a></li>";
                            }
                            
                            // Next page link
                            if ($endPage < $totalPages) {
                                $nextPage = $endPage + 1;
                                echo "<li class='page-item'><a class='page-link' href='" . buildUrl($nextPage) . "' aria-label='Next'><span aria-hidden='true'>&raquo;</span></a></li>";
                            }
                            
                            echo "</ul>";
                            echo "</nav>";
                            echo "</div>";
                        ?>

                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-5 mt-lg-0">
                <div class="desti__detail--sidebar">
                    <aside class="desti__detail--package-widget desti__detail--widget-search mb-4">
                        <div class="desti__detail--widget-title">
                            <h4>Search Here</h4>
                        </div>
                        <div class="desti__detail--widget-body">
                            <form action="javascript:void(0);" method="post" id="desti__detail--blog-sidebar-search">
                                <div class="desti__detail--search-input-group">
                                    <input type="search" placeholder="Your Destination">
                                    <button type="submit">SEARCH</button>
                                </div>
                            </form>
                        </div>
                    </aside>
                    <aside class="desti__detail--package-widget widget-tour-categoris mt-30 mb-4">
                        <div class="desti__detail--widget-title">
                            <h4>Category</h4>
                        </div>
                        <div class="desti__detail--widget-body">
                            <ul>
                                <?php
                                    while($row_tourType = mysqli_fetch_array($sql_TourType)){ 
                                ?>
                                    <li class="desti__detail--category-check pt-2 pb-2">
                                        <label class="desti__detail--form-check-label" for="cate">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-right" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z"/>
                                                <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z"/>
                                            </svg>
                                            <?php echo $row_tourType['TourType'] ?>
                                        </label>
                                        <input class="form-check-input" type="checkbox" id="cate" name="tourtype[]" value="<?php echo $row_tourType['TourType'] ?>">
                                    </li>
                                <?php
                                    }
                                ?>
                            </ul>
                        </div>
                    </aside>

                    <aside class="desti__detail--package-widget widget-tour-destination mt-30 mb-4">
                        <div class="desti__detail--widget-title">
                            <h4>Chooes Your Duration</h4>
                        </div>
                        <div class="desti__detail--widget-body">
                            <ul>
                                <li class="desti__detail--category-check pt-2 pb-2 tour__duration ">
                                    <input class="form-check-input" type="checkbox" id="cate" name="duration[]" value="1','2','3">
                                    <label class="desti__detail--form-check-label m-1" for="cate">
                                        1 - 3 Days
                                    </label>
                                    
                                </li>
                                
                                <li class="desti__detail--category-check pt-2 pb-2 tour__duration">
                                    <input class="form-check-input" type="checkbox" id="cate" name="duration[]" value="3','4','5">
                                    <label class="desti__detail--form-check-label m-1" for="cate">
                                        3 - 5 Days
                                    </label>
                                    
                                </li>

                                <li class="desti__detail--category-check pt-2 pb-2 tour__duration">
                                    <input class="form-check-input" type="checkbox" id="cate" name="duration[]" value="5','6','7">
                                    <label class="desti__detail--form-check-label m-1" for="cate">
                                        5 - 7 Days
                                    </label>
                                    
                                </li>

                                <li class="desti__detail--category-check pt-2 pb-2 tour__duration">
                                    <input class="form-check-input" type="checkbox" id="cate" name="duration[]" value="7','8','9">
                                    <label class="desti__detail--form-check-label m-1" for="cate">
                                        7 - 9 Days
                                    </label>
                                    
                                </li>

                                <li class="desti__detail--category-check pt-2 pb-2 tour__duration">
                                    <input class="form-check-input" type="checkbox" id="cate" name="duration[]" value="9','10','11">
                                    <label class="desti__detail--form-check-label m-1" for="cate">
                                        9 - 11 Days
                                    </label>
                                    
                                </li>
                            </ul>
                        </div>
                    </aside>

                    <aside class="desti__detail--package-widget widget-tour-destination mt-30 mb-4">
                        <div class="desti__detail--widget-title">
                            <h4>New Package</h4>
                        </div>
                        <div class="desti__detail--widget-body">
                            <?php
                                while($row_package = mysqli_fetch_array($sql_Package) and $count < 5){ 
                            ?>
                                <div class="row mt-2 mb-2">
                                    <div class="col-md-3 package__img">
                                        <img src="<?php echo $row_package['Image'] ?>" alt="">
                                    </div>
                                    <div class="col-md-9">
                                        <span class="package__title"><?php echo $row_package['Title'] ?></span>
                                        <h6 class="fs-6 fw-normal">From</h6>
                                        <h6 class="newPackage__price">
                                            <span class="fs-6 fw-bold">$<?php echo $row_package['Price'] ?></span>
                                            <span class="tour-description--price__per">Per Person</span>
                                        </h6>
                                    </div>
                                </div>
                            <?php
                                $count++;
                                }
                            ?>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var TourType = "";
    var Duration = "";
    $(document).ready(function() {
        // Xử lý sự kiện khi checkbox được chọn/deselect
        $("input[type='checkbox']").on("change", function() {
            updateSelectedTourType();
            updateSelectedDuration();
        });

        // Hàm để cập nhật danh sách các checkbox được chọn
        function updateSelectedTourType() {
            // Lặp qua tất cả các checkbox và lấy giá trị của những cái được chọn
            var selectedTourType = [];
            $("input[name='tourtype[]']:checked").each(function() {
                selectedTourType.push("'"+$(this).val()+"'");
            });
            TourType = selectedTourType.join(", ");
        }

        function updateSelectedDuration() {
            // Lặp qua tất cả các checkbox và lấy giá trị của những cái được chọn
            var selectedDuration = [];
            $("input[name='duration[]']:checked").each(function() {
                selectedDuration.push("'"+$(this).val()+"'");
            });
            Duration = selectedDuration.join(", ");
        }
    });


    $("#desti__detail--blog-sidebar-search").submit(function(event) {
        // Ngăn chặn việc gửi form đi (chặn lại hành động mặc định của form)
        event.preventDefault();

        // Lấy giá trị từ thẻ input
        var destinationValue = $("input[type='search']").val();

        // Kiểm tra xem giá trị có tồn tại không
        if (destinationValue.trim() !== "" && TourType.trim() !== "" && Duration.trim() !== "") {
            // Chuyển hướng đến trang Destination với tham số truyền vào
            window.location.href = "Tour.php?search=" + encodeURIComponent(destinationValue) + "&param=" + encodeURIComponent(TourType) + "&duration=" + encodeURIComponent(Duration);
        }
        else if (destinationValue.trim() !== "") {
            // Chuyển hướng đến trang Destination với tham số truyền vào
            window.location.href = "Tour.php?search=" + encodeURIComponent(destinationValue);
        }
        else if (TourType.trim() !== "") {
            // Chuyển hướng đến trang Destination với tham số truyền vào
            window.location.href = "Tour.php?param=" + encodeURIComponent(TourType);
        }
        else if (Duration.trim() !== "") {
            // Chuyển hướng đến trang Destination với tham số truyền vào
            window.location.href = "Tour.php?duration=" + encodeURIComponent(Duration);
        }
        else {
            // Chuyển hướng đến trang Destination
            window.location.href = "Tour.php";
        }
    });

    $(document).ready(function() {
        $(".tour__description--btn").click(function() {
        // Lấy id của phần tử destinationt
        var destinationId = $(this).attr("Id");
        // Chuyển trang theo id của destinationt
        window.location.href = "Tour_Detail.php?id=" + destinationId;
        });
    });
</script>


<?php require('includes/footer.html'); ?>