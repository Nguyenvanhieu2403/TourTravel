<?php require('includes/header.html'); ?>
<?php require('includes/navbar.html'); ?>
<?php
	include_once('../assets/database/ConnectToSql.php');
?>

<?php
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "select td.*, i.Image as Image, t.City as City, t.Price as Price  from tourdetail td join images i on td.Id = i.TourDetailId join tour t on t.id = td.TourId where i.Status = 1 and td.TourId = $id";
	    $sql_tourDetail = mysqli_query($con,$query); 

        $queryTravelPlan = "SELECT tp.* FROM travelplan tp join tourdetail td on tp.TourDetailId = td.Id WHERE td.TourId = $id";
        $sql_TravelPlan = mysqli_query($con, $queryTravelPlan);

        $queryPackage = "select t.Title as Title, t.Price as Price, img.Image as Image from tour t join images img on t.Id = img.TourId where img.Status = 3";
        $sql_Package = mysqli_query($con,$queryPackage); 
        $count = 0;

        $queryRate ="select ROUND(AVG(c.Rate)) as Rate from comments c join tour t on t.id = c.IdTour ;";
        $sql_Rate = mysqli_query($con,$queryRate);

        $queryComment = "select c.* from comments c join tour t on t.id = c.IdTour where t.id = $id order by c.DateCreate desc limit 10";
        $sql_Comment = mysqli_query($con,$queryComment);

        $queryCountComment = "select count(c.id) as CommentNumber from comments c join tour t on t.id = c.IdTour where t.id = $id";
        $sql_CountComment = mysqli_query($con,$queryCountComment);
        
    }
    else {
        
    }

    
?>

<div class="header-destination header-tour ">
    <div class="content">
        <h1 class="text-center fw-bold text-light">Tour Detail</h1>
        <div class="row">
            <h2 class="text-center dirc_destination__detail">
                <a href="homepage.php" class="header-destination__home header-destination__detail__home text-light">Home</a>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-right text-danger" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z"/>
                    <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z"/>
                </svg>
                <span class="header-destination__destination header-destination__detail__destination__detail text-light">Tour Detail</span>
            </h2>
        </div>
    </div>
</div> 

<div class="container">
    <div class="row tour__detail--container">
    <?php
    if(mysqli_num_rows($sql_tourDetail) > 0) {
        while($row_tourDetail = mysqli_fetch_array($sql_tourDetail)){
            
    ?>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                    <img class="col-12" src="<?php echo $row_tourDetail['Image'] ?>" alt="">
                    </div>
                </div>
            </div>
            <div class="row align-items-lg-center tour-detail__title mt-4">
                <div class="col-md-8 tour-detail__title--location">
                    <p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                            <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10"/>
                            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                        </svg>
                        <?php echo $row_tourDetail['City'] ?>
                    </p>
                    <h2><?php echo $row_tourDetail['Name'] ?></h2>
                </div>
                <div class="col-md-4 tour-detail__title--rate">
                    <?php
                        while($row_Rate = mysqli_fetch_array($sql_Rate)){ 
                            for($i= 1; $i <=5; $i++){
                                if($row_Rate['Rate'] == null){
                                    $row_Rate['Rate'] = 0;
                                }
                                if( $i <= $row_Rate['Rate']) {
                                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill text-danger" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>';
                                }
                                else {
                                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                    </svg>';
                                }
                            }
                        }
                    ?>
                </div>
            </div>
            <div class="row tour-detail__row--navbar">
                <div class="col-md-12 m-4">
                    <ul class="nav nav-pills mb-12 tour__detail--navbar__content" id="pills-tab" role="tablist">
                        <li class="tour--detail__nav-item " role="presentation">
                            <button class="nav-link active" id="pills-Information-tab" data-bs-toggle="pill" data-bs-target="#pills-Information" type="button" role="tab" aria-controls="pills-Information" aria-selected="true">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-lg" viewBox="0 0 16 16">
                                        <path d="m9.708 6.075-3.024.379-.108.502.595.108c.387.093.464.232.38.619l-.975 4.577c-.255 1.183.14 1.74 1.067 1.74.72 0 1.554-.332 1.933-.789l.116-.549c-.263.232-.65.325-.905.325-.363 0-.494-.255-.402-.704l1.323-6.208Zm.091-2.755a1.32 1.32 0 1 1-2.64 0 1.32 1.32 0 0 1 2.64 0"/>
                                    </svg>
                                    Information
                                </span>
                            </button>
                        </li>
                        <li class="tour--detail__nav-item " role="presentation">
                            <button class="nav-link" id="pills-TravelPlan-tab" data-bs-toggle="pill" data-bs-target="#pills-TravelPlan" type="button" role="tab" aria-controls="pills-TravelPlan" aria-selected="false">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-spreadsheet" viewBox="0 0 16 16">
                                        <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V9H3V2a1 1 0 0 1 1-1h5.5zM3 12v-2h2v2zm0 1h2v2H4a1 1 0 0 1-1-1zm3 2v-2h3v2zm4 0v-2h3v1a1 1 0 0 1-1 1zm3-3h-3v-2h3zm-7 0v-2h3v2z"/>
                                    </svg>    
                                    Travel Plan
                                </span>
                            </button>
                        </li>
                        <li class="tour--detail__nav-item " role="presentation">
                            <button class="nav-link" id="pills-TourGallary-tab" data-bs-toggle="pill" data-bs-target="#pills-TourGallary" type="button" role="tab" aria-controls="pills-TourGallary" aria-selected="false">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-images" viewBox="0 0 16 16">
                                        <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3"/>
                                        <path d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2M14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1M2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10"/>
                                    </svg>    
                                    Tour Gallary
                                </span>
                            </button>
                        </li>
                        <li class="tour--detail__nav-item " role="presentation">
                            <button class="nav-link" id="pills-Location-tab" data-bs-toggle="pill" data-bs-target="#pills-Location" type="button" role="tab" aria-controls="pills-Location" aria-selected="false">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                        <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10"/>
                                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                    </svg>    
                                    Location
                                </span>
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-Information" role="tabpanel" aria-labelledby="pills-Information-tab">
                            <div class="row">
                                <div class="tour__detail--information mt-5">
                                    <h2><?php echo $row_tourDetail['TitleInfor'] ?></h2>
                                    <p class="tour__detail--infor__description">
                                        <?php echo $row_tourDetail['DescriptionInfor'] ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="tour__detail--img col-md-6">
                                    <div class="row">
                                        <img class="col-md-12" src="../../../user/assets/img/tour__detail/feat-img1.png" alt="">
                                    </div>
                                </div>
                                <div class="tour__detail--img col-md-6">
                                    <div class="row">
                                        <img class="col-md-12" src="../../../user/assets/img/tour__detail/feat-img2.png" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="featured-video col-md-12">
                                    <img src="../../../user/assets/img/tour__detail/feat-img3.png" alt="">
                                    <div class="video-overlay col-md-12">
                                        <a href="https://www.youtube.com/watch?v=_sI_Ps7JSEk" class="play-icon video-popup" target="_blank" data-fancybox="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-play-fill" viewBox="0 0 16 16">
                                                <path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row tour__detail--table">
                                <table class="desti--detail__overview-table col-md-12">
                                    <tbody>
                                        <tr>
                                            <th>Destination</th>
                                            <td><?php echo $row_tourDetail['City'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Departure Time</th>
                                            <td><?php echo $row_tourDetail['DepartureTime'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Return Time</th>
                                            <td><?php echo $row_tourDetail['ReturnTime'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Included</th>
                                            <td><?php echo $row_tourDetail['Included'] ?></td>
                                        </tr>
                                        <tr>
                                            <th>Excluded</th>
                                            <td><?php echo $row_tourDetail['Excluded'] ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <div class="row">
                                                    <div class="tour__detail--transport col-md-12">
                                                        <img src="../../../user/assets/img/tour__detail/bus.svg" alt="">
                                                        <span>Travel With <?php echo $row_tourDetail['Transport'] ?></span>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <?php
                                while($row_Countcomments = mysqli_fetch_array($sql_CountComment)){ 
                                ?>
                            <h3 class="text-dark pt-4 pb-4 fw-bold">Comments(<?php echo $row_Countcomments['CommentNumber']; ?>)</h3>
                            <?php
                                }
                            ?>
                            <?php
                                $countComment = 1;
                                while($row_comments = mysqli_fetch_array($sql_Comment)){ 
                                    if($countComment <=5) {
                                ?>
                                <div class="row mb-2">
                                    <div class="tour__detail--comment-avt col-md-2">
                                        <img src="../../../user/assets/img/tour__detail/commertor2.png" alt="">
                                    </div>
                                    <div class="tour__detail--comment__infor col-10">
                                        <div class="row">
                                            <div class="col-8 tour__detail--comment__title">
                                                <h5><?php echo $row_comments['FullName'] ?></h5>
                                                <span><?php echo $row_comments['DateCreate'] ?></span>
                                            </div>
                                            <div class="col-4 tour__detail--comment__rates">
                                                <?php 
                                                    for($i = 1; $i<=5; $i++) {
                                                        if($i <= $row_comments['Rate']) {
                                                            echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                            </svg>';
                                                        }
                                                        else {
                                                            echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                                <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                                            </svg>';
                                                        }
                                                    }
                                                ?>
                                            </div>
                                            <div class="col-12 tour__detail--comment__description">
                                                <span><?php echo $row_comments['Message'] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    $countComment ++;
                                    }
                                    else {
                                ?>
                                <div class="tour__detail--showhide row mb-2 hidden" id="tour__detail--showhide">
                                    <div class="tour__detail--comment-avt col-md-2">
                                        <img src="../../../user/assets/img/tour__detail/commertor2.png" alt="">
                                    </div>
                                    <div class="tour__detail--comment__infor col-10">
                                        <div class="row">
                                            <div class="col-8 tour__detail--comment__title">
                                                <h5><?php echo $row_comments['FullName'] ?></h5>
                                                <span><?php echo $row_comments['DateCreate'] ?></span>
                                            </div>
                                            <div class="col-4 tour__detail--comment__rates">
                                                <?php 
                                                    for($i = 1; $i<=5; $i++) {
                                                        if($i <= $row_comments['Rate']) {
                                                            echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                                            </svg>';
                                                        }
                                                        else {
                                                            echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                                <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                                                            </svg>';
                                                        }
                                                    }
                                                ?>
                                            </div>
                                            <div class="col-12 tour__detail--comment__description">
                                                <span><?php echo $row_comments['Message'] ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                    }
                                }
                            ?>
                            <h6 class="tour__detail--viewALLComment" id="viewAllComments">View All Comment</h6>
                            <div class="row">
                                <aside class="desti__detail--package-widget widget-tour-categoris mt-30 mb-4">
                                    <div class="desti__detail--widget-title">
                                        <h4>Leave Your Comment</h4>
                                    </div>
                                    <div class="desti__detail--widget-body">
                                        <form method="POST" id="commentForm">
                                            <div class="row tour__detail--comment__inputs">
                                                <div class="col-md-6">
                                                    <input type="text" name="fullName" placeholder="Your Full Name" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="email" name="email" placeholder="Your Email" required>
                                                </div>
                                            </div>
                                            <div class="row tour__detail--comment__inputs">
                                                <div class="col-12">
                                                    <input type="text" name="tourType" placeholder="Tour Type" required>
                                                </div>
                                            </div>
                                            <div class="row tour__detail--comment__inputs">
                                                <div class="col-12">
                                                    <textarea name="message" cols="30" rows="10" placeholder="Write Message" required></textarea>
                                                </div>
                                            </div>
                                            <div class="rate py-3 text-white mt-3">
                                                <div class="rating">
                                                    <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                                                    <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                                                    <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                                                    <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                                                    <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                                                </div>
                                            </div>
                                            <div class="row submite-btn m-2">
                                                <button type="submit" class="col-md-3">Send Message</button>
                                            </div>
                                        </form>
                                    </div>

                                </aside>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-TravelPlan" role="tabpanel" aria-labelledby="pills-TravelPlan-tab">
                            <div class="row">
                                <div class="tour__detail--information mt-5">
                                    <h2><?php echo $row_tourDetail['TitleTravelPlan'] ?></h2>
                                    <p class="tour__detail--infor__description">
                                        <?php echo $row_tourDetail['DescriptionTravelPlan'] ?>
                                    </p>
                                    <div class="row">
                                        <div class="accordion plans-accordion" id="planAccordion">
                                            <?php
                                                $countTravelPlan = 0;
                                                while($row_TravelPlan = mysqli_fetch_array($sql_TravelPlan)){ 
                                                    $countTravelPlan ++;
                                                    $collapseId = "planCollapse" . $countTravelPlan;
                                            ?>
                                                <div class="accordion-item plans-accordion-single">
                                                    <div class="accordion-header" id="planHeadingOne">
                                                        <div class="accordion-button" data-bs-toggle="collapse" data-bs-target="#<?php echo $collapseId ?>" aria-expanded="true" role="navigation">
                                                            <div class="paln-index-circle me-3">
                                                                <h4>0<?php echo $countTravelPlan; ?></h4>
                                                            </div>
                                                            <div class="plan-title">
                                                                <h5>DAY <?php echo $countTravelPlan.": ";  echo $row_TravelPlan['Title'] ?></h5>
                                                                <h6><?php echo $row_TravelPlan['StartTime'] ?> to <?php echo $row_TravelPlan['EndTime'] ?></h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="<?php echo $collapseId ?>" class="accordion-collapse collapse show" aria-labelledby="planHeadingOne" data-bs-parent="#planAccordion" style="">
                                                        <div class="accordion-body plan-info">
                                                            <p><?php echo $row_TravelPlan['Description'] ?></p>
                                                            <ul>
                                                                <li>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                                                        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022"/>
                                                                    </svg>
                                                                    Specilaized Bilingual Guide
                                                                </li>
                                                                <li>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                                                        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022"/>
                                                                    </svg>
                                                                    Private Transport
                                                                </li>
                                                                <li>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                                                        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022"/>
                                                                    </svg>
                                                                    Entrance Fees
                                                                </li>
                                                                <li>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                                                                        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022"/>
                                                                    </svg>
                                                                    Box Lunch,Water,Dinner and Snacks
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-TourGallary" role="tabpanel" aria-labelledby="pills-TourGallary-tab">
                            <div class="row mt-5 mb-1">

                                <div class="col-md-6 mb-4">
                                    <div class="tour__detail--gallary__img position-relative">
                                        <div class="tour__detail--gallary col-12">
                                            <img src="../../../user/assets/img/tour__detail/pgl-1.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="tour__detail--gallary__img">
                                        <div class="tour__detail--gallary col-12">
                                            <img src="../../../user/assets/img/tour__detail/pgl-2.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <div class="tour__detail--gallary__img">
                                        <div class="tour__detail--gallary col-12">
                                            <img src="../../../user/assets/img/tour__detail/pgx-1.png" alt="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="tour__detail--gallary__img">
                                        <div class="tour__detail--gallary col-12">
                                            <img src="../../../user/assets/img/tour__detail/pgl-3.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="tour__detail--gallary__img">
                                        <div class="tour__detail--gallary col-12">
                                            <img src="../../../user/assets/img/tour__detail/pgl-4.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <div class="tour__detail--gallary__img">
                                        <div class="tour__detail--gallary col-12">
                                            <img src="../../../user/assets/img/tour__detail/pgx-2.png" alt="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="tour__detail--gallary__img">
                                        <div class="tour__detail--gallary col-12">
                                            <img src="../../../user/assets/img/tour__detail/pgl-5.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="tour__detail--gallary__img">
                                        <div class="tour__detail--gallary col-12">
                                            <img src="../../../user/assets/img/tour__detail/pgl-6.png" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <div class="tour__detail--gallary__img">
                                        <div class="tour__detail--gallary col-12">
                                            <img src="../../../user/assets/img/tour__detail/pgx-3.png" alt="">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-Location" role="tabpanel" aria-labelledby="pills-Location-tab">
                            <div class="row mt-5 mb-5">
                                <iframe 
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.816814555946!2d105.73938337479642!3d21.
                                    040014487392796!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135096b31fa7abb%3A0xff645782804911af!
                                    2zVHLGsOG7nW5nIMSR4bqhaSBo4buNYyBDw7RuZyBuZ2jhu4cgxJDDtG5nIMOB!5e0!3m2!1svi!2s!4v1702392857182!5m2!1svi!2s" 
                                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mt-5 mt-lg-0">
            <aside class="tour__detail-widget-style-2 widget-form mt-30">
                <div class="tour__detail--navbar widget-title text-center d-flex justify-content-between">
                    <h4>Book This Tour</h4>
                    <h3 class="widget-lavel">$<?php echo $row_tourDetail['Price'] ?> <span>Per Person</span></h3>
                </div>
                <div class="widget-body tour__detail--navbar__form">
                    <form action="#" method="post" id="booking-form">
                        <div class="booking-form-wrapper">
                            <div class="custom-input-group row">
                                <input type="text" placeholder="Your Full Name" id="name" name="fullNameBook">
                            </div>
                            <div class="custom-input-group row">
                                <input type="email" placeholder="Your Email" id="email" name="emailBook">
                            </div>
                            <div class="custom-input-group row">
                            <input type="tel" placeholder="Phone" id="phone" name="phoneBook">
                            </div>
                            <div class="custom-input-group position-relative row">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                </svg>
                                <select id="ticket_type" name="ticketTypeBook">
                                    <option selected="">Tickets Type</option>
                                    <option value="1">Tickets Type 1</option>
                                    <option value="2">Tickets Type 2</option>
                                    <option value="3">Tickets Type 3</option>
                                </select>
                            </div>
                            <div class="row">
                            <div class="col-sm-6">
                                <div class="custom-input-group position-relative row">
                                    <input type="number" name="Adult" id="Adult" placeholder="Adult" min="0">
                                </div>  
                            </div>
                            <div class="col-sm-6">
                                <div class="custom-input-group position-relative row">
                                    <input type="number" name="Child" id="Child" placeholder="Child" min="0">
                                </div>  
                            </div>
                            </div>
                            <div class="custom-input-group  position-relative row">
                                <input placeholder="Select your date" type="date" name="checkIn" id="datepicker2" value="" class="calendar hasDatepicker">
                            </div>
                            <div class="custom-input-group pt-4">
                            <textarea cols="45" rows="6" placeholder="Your message" name="messageBook"></textarea>
                            </div>
                            <div class="custom-input-group row">
                                <div class="submite-btn col-12 row  ">
                                    <button type="submit">Book Now</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </aside>

            <aside class="desti__detail--package-widget widget-tour-destination mt-4 mb-4">
                <div class="desti__detail--widget-title  tour__detail--widget-title">
                    <h4 class="text-light">New Package</h4>
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

            <aside class="desti__detail--package-widget widget-tour-destination mt-30 mb-4">
                <div class="desti__detail--widget-title  tour__detail--widget-title">
                    <h4 class="text-light">Package Tag</h4>
                </div>
                <div class="desti__detail--widget-body">
                    <div class="row">
                        <div class="tour__detail--packages__tag col-3 m-1">
                            <span>Adventure</span>
                        </div>
                        <div class="tour__detail--packages__tag col-3 m-1">
                            <span>Trip</span>
                        </div>
                        <div class="tour__detail--packages__tag col-3 m-1">
                            <span>Guided</span>
                        </div>
                        <div class="tour__detail--packages__tag col-3 m-1">
                            <span>Historical</span>
                        </div>
                        <div class="tour__detail--packages__tag col-3 m-1">
                            <span>Road Trips</span>
                        </div>
                        <div class="tour__detail--packages__tag col-3 m-1">
                            <span>Tourist</span>
                        </div>
                        <div class="tour__detail--packages__tag col-3 m-1">
                            <span>Tourist</span>
                        </div>
                        <div class="tour__detail--packages__tag col-3 m-1">
                            <span>Tourist</span>
                        </div>
                    </div>
                </div>
            </aside>

            <aside class="desti__detail--package-widget widget-tour-destination mt-30 mb-4">
                <div class="row">
                    <div class="col-md-12">
                        <img src="../../../user/assets/img/banner/sidebar-banner.png" alt="">
                    </div>
                </div>
            </aside>
        </div>
        <?php
                }
            }else {
                echo '<h1 class="text-center">Không có dữ liệu</h1>';
            }
        ?>
    </div>
</div>

<?php 
    // Xử lý comment
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lấy dữ liệu từ form
        $fullNameComment = $_POST["fullName"];
        $emailComment = $_POST["email"];
        $tourTypeComment = $_POST["tourType"];
        $messageComment = $_POST["message"];
        $ratingComment = $_POST["rating"];
        $dateCreateComment = gmdate("Y-m-d H:i:s");
        $statusComment = 1;

        // Thực hiện truy vấn insert
        $sql = $con->prepare("INSERT INTO comments ( IdTour, FullName, Email, TourType, Message, Rate, Status, DateCreate) 
                VALUES (?,?, ?, ?, ?, ?,?,?)");
        $sql->bind_param("issssiis", $id, $fullNameComment,$emailComment, $tourTypeComment, $messageComment, $ratingComment, $statusComment, $dateCreateComment);
        $sql->execute();
        $sql->close();
        $con->close();
        if ($sql) {
            echo '<script>alert("Comment successfully");</script>';
            echo '<script>window.location.href = window.location.href;</script>';
            exit();
            // echo '<script>window.location.href = "Tour_Detail.php?id='.$id.'";</script>';
            exit();
        } else {
            echo '<script>alert("Error: ' . $con->error . '");</script>';
        }
    }
?>

<?php 
    // Xử lý  booking
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lấy dữ liệu từ form
        $fullName = $_POST["fullNameBook"];
        $email = $_POST["emailBook"];
        $phone = $_POST["phoneBook"];
        $ticketType = $_POST["ticketTypeBook"];
        $adult = $_POST["Adult"];
        $child = $_POST["Child"];
        $message = $_POST["messageBook"];
        $date = $_POST["CheckIn"];
        $dateCreate = gmdate("Y-m-d");
        $status = 1;

        // Khởi tạo biến để kiểm tra trạng thái giao dịch
        $transactionStatus = true;

        // Thực hiện truy vấn insert
        $sql = $con->prepare("INSERT INTO users (FullName, PhoneNumber, Email, TicketType, Adult, Child, DateOfDepartment, Message, Status) 
                VALUES (?,?, ?, ?, ?, ?,?,?,?)");
        $sql->bind_param("ssssiissi", $fullName, $phone, $email, $ticketType, $adult, $child, $date, $message, $status);
        $sql->execute();

        // Kiểm tra xem insert vào bảng users có thành công không
        if ($sql->affected_rows > 0) {
            $newUserId = $sql->insert_id;

            // Thực hiện truy vấn insert vào bảng books
            $sqlBook = $con->prepare("INSERT INTO books ( IdUser, IdTour, CreateDate, CreateBy, Status) 
                VALUES (?,?, ?, ?, ?)");
            $sqlBook->bind_param("iisii", $newUserId, $id, $dateCreate, $newUserId, $status);
            $sqlBook->execute();

            // Kiểm tra xem insert vào bảng books có thành công không
            if ($sqlBook->affected_rows <= 0) {
                // Nếu insert vào bảng books không thành công, đặt biến kiểm tra giao dịch thành false
                $transactionStatus = false;
            }
        } else {
            // Nếu insert vào bảng users không thành công, đặt biến kiểm tra giao dịch thành false
            $transactionStatus = false;
        }

        // Kiểm tra trạng thái giao dịch và thực hiện rollback nếu cần
        if (!$transactionStatus) {
            $con->rollback();
            echo '<script>alert("Error: Transaction failed. ' . $con->error . '");</script>';
        } else {
            // Nếu mọi thứ thành công, commit transaction
            $con->commit();
            echo '<script>alert("Booking successfully");</script>';
            echo '<script>window.location.href = "Tour_Detail.php?id='.$id.'";</script>';
            exit();
        }

        // Đóng statement sau khi sử dụng
        $sql->close();
        $sqlBook->close();

        // Đóng kết nối
        $con->close();
    }
?>


<script>
    $(document).ready(function() {
        $("#viewAllComments").click(function() {
            $("[id^=tour__detail--showhide]").toggleClass("hidden");
            var isHidden = $("[id^=tour__detail--showhide]").hasClass("hidden");
            
            // Đặt lại nội dung dựa trên trạng thái của lớp "hidden"
            $(this).text(isHidden ?  "View All Comments" : "Hidden Less Comments" );
        });
    });

    // $(document).ready(function() {
    //     // Bắt sự kiện click vào nút Send Message
    //     $("button.col-md-3").click(function() {
    //         // Thực hiện các hành động khi nút được click
    //         alert("Nút Send Message đã được click!");
    //         // Thêm các hành động khác tùy ý ở đây
    //     });
    // });

</script>

<?php require('includes/footer.html'); ?>