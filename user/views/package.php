<?php
	include_once('../assets/database/ConnectToSql.php');
?>

<?php
    if (isset($_POST['priceRange'])) {
        $priceRange = $_POST['priceRange'];

        $queryPackage='';

        switch ($priceRange) {
            case '50':
                $queryPackage = "select * from tour where price <= 30 limit 6";
                break;

            case '51-100':
                $queryPackage = "select * from tour where price between 31 and 100 limit 6";
                break;

            case '100-plus':
                $queryPackage = "select * from tour where price > 100 limit 6";
                break;

            default:
                echo "Yêu cầu không hợp lệ";
                exit;
        }

        $sqlPackage = mysqli_query($con, $queryPackage);

        $html = '';
        while ($row_package = mysqli_fetch_array($sqlPackage)) {
            $tourId = $row_package['Id'];
            $queryImage = "select Image from images WHERE TourId = $tourId";
            $sqlImage = mysqli_query($con, $queryImage);
            $row_image = mysqli_fetch_array($sqlImage);
            $html .= <<<HTML
            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                <div class="package-card">
                    <div class="package-thumb">
                        <a href="">
                            <img class="package-img" src="{$row_image['Image']}" alt="">
                        </a>
                        <p class="thumb-day">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/>
                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0"/>
                            </svg>
                            <span>{$row_package['Day']} Day & {$row_package['Night']} Night</span>
                        </p>
                    </div>
                    <div class="package-body">
                        <div class="body-content">
                            <h3>
                                <a class="text-decoration-none text-dark fs-5" href="">{$row_package['Title']}.</a>
                            </h3>
                        </div>
                        <div class="body-info">
                            <div class="book-btn">
                                <a class="text-decoration-none" href="Tour_Detail.php?id={$tourId}">BOOK NOW
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="body-price">
                                <span class="from">From</span>
                                <h6>$ {$row_package['Price']}.00 <span class="person">Per Person</span></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            HTML;
        }
        echo $html;
    } else {
        echo "Yêu cầu không hợp lệ";
    }
?>