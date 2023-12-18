<?php require('includes/header.html'); ?>
<?php
	include_once('../assets/database/ConnectToSql.php');
?>

<div class="header-destination header-tour ">
    <div class="content">
        <h1 class="text-center fw-bold text-light">Tour Detail</h1>
        <div class="row">
            <h2 class="text-center dirc_destination__detail">
                <a href="#" class="header-destination__home header-destination__detail__home text-light">Home</a>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-right text-danger" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z"/>
                    <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z"/>
                </svg>
                <span class="header-destination__destination header-destination__detail__destination__detail text-light">Tour Detail</span>
            </h2>
        </div>
    </div>
</div> 

<?php 

    $queryPackage = "select t.Title as Title, t.Price as Price, img.Image as Image from tour t join images img on t.Id = img.TourId where img.Status = 3";
	$sql_Package = mysqli_query($con,$queryPackage); 
    $count = 0;
?>

<div class="container">
    <div class="row tour__detail--container">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                    <img class="col-12" src="../../../user/assets/img/tour__detail/pd-thumb.png" alt="">
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
                        Mount Dtna, Spain
                    </p>
                    <h2>San Francisco Golden Gate Bridge.</h2>
                </div>
                <div class="col-md-4 tour-detail__title--rate">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                    </svg>
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
                                    <h2>Package Details</h2>
                                    <p class="tour__detail--infor__description">
                                        Pellentesque accumsan magna in augue sagittis, non fringilla eros molestie. 
                                        Sed feugiat mi nec ex vehicula, nec vestibulum orci semper. 
                                        Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. 
                                        Donec tristique commodo fringilla. Duis aliquet varius mauris eget rutrum. 
                                        Nullam sit amet justo consequat, bibendum orci in, convallis enim. 
                                        Proin convallis neque viverra finibus cursus. Mauris lacinia lacinia erat in finibus. 
                                        In non enim libero.Pellentesque accumsan magna in augue sagittis, non fringilla eros molestie. 
                                        Sed feugiat mi nec ex vehicula, nec vestibulum orci semper. 
                                        Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. 
                                        Donec tristique commodo fringilla. Duis aliquet varius mauris eget rutrum. 
                                        Nullam sit amet justo consequat, bibendum orci in, convallis enim. 
                                        Proin convallis neque viverra finibus cursus. Mauris lacinia lacinia erat in finibus. 
                                        In non enim libero.
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
                                            <td>New York City</td>
                                        </tr>
                                        <tr>
                                            <th>Departure Time</th>
                                            <td>01 April, 2021 10.00AM</td>
                                        </tr>
                                        <tr>
                                            <th>Return Time</th>
                                            <td>08 April, 2021 10.00AM</td>
                                        </tr>
                                        <tr>
                                            <th>Included</th>
                                            <td>Specilaized Bilingual Guide Private Transport</td>
                                        </tr>
                                        <tr>
                                            <th>Excluded</th>
                                            <td>Additional Services Insurance Drink Tickets</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <div class="row">
                                                    <div class="tour__detail--transport col-md-12">
                                                        <img src="../../../user/assets/img/tour__detail/bus.svg" alt="">
                                                        <span>Travel With Bus</span>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <h1 class="text-dark pt-4 pb-4 fw-bold">Comments</h1>
                            <div class="row">
                                <div class="tour__detail--comment-avt col-md-2">
                                    <img src="../../../user/assets/img/tour__detail/commertor2.png" alt="">
                                </div>
                                <div class="tour__detail--comment__infor col-10">
                                    <div class="row">
                                        <div class="col-8 tour__detail--comment__title">
                                            <h5>Silvia Perry</h5>
                                            <span>2 April, 2021 10.00PM</span>
                                        </div>
                                        <div class="col-4 tour__detail--comment__rates">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                        </div>
                                        <div class="col-12 tour__detail--comment__description">
                                            <span>Morbi Dictum Pulvinar Velit, Id Mollis Lorem Faucibus AcUt Sed Lacinia Ipsum. Cibuses AcUt Sed Lacinia Ipsum. Suspendisse</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="tour__detail--comment-avt col-md-2">
                                    <img src="../../../user/assets/img/tour__detail/commertor2.png" alt="">
                                </div>
                                <div class="tour__detail--comment__infor col-10">
                                    <div class="row">
                                        <div class="col-8 tour__detail--comment__title">
                                            <h5>Silvia Perry</h5>
                                            <span>2 April, 2021 10.00PM</span>
                                        </div>
                                        <div class="col-4 tour__detail--comment__rates">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                        </div>
                                        <div class="col-12 tour__detail--comment__description">
                                            <span>Morbi Dictum Pulvinar Velit, Id Mollis Lorem Faucibus AcUt Sed Lacinia Ipsum. Cibuses AcUt Sed Lacinia Ipsum. Suspendisse</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="tour__detail--comment-avt col-md-2">
                                    <img src="../../../user/assets/img/tour__detail/commertor2.png" alt="">
                                </div>
                                <div class="tour__detail--comment__infor col-10">
                                    <div class="row">
                                        <div class="col-8 tour__detail--comment__title">
                                            <h5>Silvia Perry</h5>
                                            <span>2 April, 2021 10.00PM</span>
                                        </div>
                                        <div class="col-4 tour__detail--comment__rates">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                            </svg>
                                        </div>
                                        <div class="col-12 tour__detail--comment__description">
                                            <span>Morbi Dictum Pulvinar Velit, Id Mollis Lorem Faucibus AcUt Sed Lacinia Ipsum. Cibuses AcUt Sed Lacinia Ipsum. Suspendisse</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h6 class="tour__detail--viewALLComment">View All Comment</h6>
                            <div class="row">
                                <aside class="desti__detail--package-widget widget-tour-categoris mt-30 mb-4">
                                    <div class="desti__detail--widget-title">
                                        <h4>Leave Your Comment</h4>
                                    </div>
                                    <div class="desti__detail--widget-body">
                                        <div class="row tour__detail--comment__inputs">
                                            <div class="col-md-6">
                                                <input type="text" placeholder="Your Full Name">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" placeholder="Your Email">
                                            </div>
                                        </div>
                                        <div class="row tour__detail--comment__inputs">
                                            <div class="col-12">
                                                <input type="text" placeholder="Tour Type">
                                            </div>
                                        </div>
                                        <div class="row tour__detail--comment__inputs">
                                            <div class="col-12">
                                                <textarea name="" id="" cols="30" rows="10" placeholder="Write Message"></textarea>
                                            </div>
                                        </div>

                                        <div class="rate py-3 text-white mt-3">
                                            <div class="rating"> <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label> <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label> <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label> <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                                            </div>
                                        </div>
                                        <div class="row submite-btn m-2">
                                            <button class="col-md-3">Send Message</button>
                                        </div>
                                    </div>
                                </aside>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-TravelPlan" role="tabpanel" aria-labelledby="pills-TravelPlan-tab">
                            <div class="row">
                                <div class="tour__detail--information mt-5">
                                    <h2>Details</h2>
                                    <p class="tour__detail--infor__description">
                                        Pellentesque accumsan magna in augue sagittis, non fringilla eros molestie. 
                                        Sed feugiat mi nec ex vehicula, nec vestibulum orci semper. 
                                        Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. 
                                        Donec tristique commodo fringilla. Duis aliquet varius mauris eget rutrum. 
                                        Nullam sit amet justo consequat, bibendum orci in, convallis enim. 
                                        Proin convallis neque viverra finibus cursus. Mauris lacinia lacinia erat in finibus.
                                    </p>
                                    <div class="row">
                                        <div class="accordion plans-accordion" id="planAccordion">
                                            <div class="accordion-item plans-accordion-single">
                                                <div class="accordion-header" id="planHeadingOne">
                                                    <div class="accordion-button" data-bs-toggle="collapse" data-bs-target="#planCollapse1" aria-expanded="true" role="navigation">
                                                        <div class="paln-index-circle me-3">
                                                            <h4>01</h4>
                                                        </div>
                                                        <div class="plan-title">
                                                            <h5>DAY 1 : Departure And Small Tour</h5>
                                                            <h6>10.00 AM to 10.00 PM</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="planCollapse1" class="accordion-collapse collapse show" aria-labelledby="planHeadingOne" data-bs-parent="#planAccordion" style="">
                                                    <div class="accordion-body plan-info">
                                                        <p>Pellentesque accumsan magna in augue sagittis, non fringilla eros molestie. Sed feugiat mi nec ex vehicula, nec vestibulum orci semper. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec tristique commodo fringilla.</p>
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
                                            <div class="accordion-item plans-accordion-single">
                                                <div class="accordion-header" id="planHeadingTwo">
                                                    <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#planCollapse2" aria-expanded="true" role="navigation">
                                                        <div class="paln-index-circle">
                                                            <h4>02</h4>
                                                        </div>
                                                        <div class="plan-title">
                                                            <h5>DAY 1 : Departure And Small Tour</h5>
                                                            <h6>10.00 AM to 10.00 PM</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="planCollapse2" class="accordion-collapse collapse" aria-labelledby="planHeadingTwo" data-bs-parent="#planAccordion">
                                                    <div class="accordion-body plan-info">
                                                        <p>Pellentesque accumsan magna in augue sagittis, non fringilla eros molestie. Sed feugiat mi nec ex vehicula, nec vestibulum orci semper. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec tristique commodo fringilla.</p>
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
                                            <div class="accordion-item plans-accordion-single">
                                                <div class="accordion-header" id="planHeadingThree">
                                                    <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#planCollapse3" aria-expanded="true" aria-controls="planCollapse1" role="navigation">
                                                        <div class="paln-index-circle">
                                                            <h4>03</h4>
                                                        </div>
                                                        <div class="plan-title">
                                                            <h5>DAY 1 : Departure And Small Tour</h5>
                                                            <h6>10.00 AM to 10.00 PM</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="planCollapse3" class="accordion-collapse collapse" aria-labelledby="planHeadingThree" data-bs-parent="#planAccordion">
                                                    <div class="accordion-body plan-info">
                                                        <p>Pellentesque accumsan magna in augue sagittis, non fringilla eros molestie. Sed feugiat mi nec ex vehicula, nec vestibulum orci semper. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec tristique commodo fringilla.</p>
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
                                            <div class="accordion-item plans-accordion-single">
                                                <div class="accordion-header" id="planHeadingFour">
                                                    <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#planCollapse4" aria-expanded="true" role="navigation">
                                                        <div class="paln-index-circle">
                                                            <h4>04</h4>
                                                        </div>
                                                        <div class="plan-title">
                                                            <h5>DAY 1 : Departure And Small Tour</h5>
                                                            <h6>10.00 AM to 10.00 PM</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="planCollapse4" class="accordion-collapse collapse" aria-labelledby="planHeadingFour" data-bs-parent="#planAccordion">
                                                    <div class="accordion-body plan-info">
                                                        <p>Pellentesque accumsan magna in augue sagittis, non fringilla eros molestie. Sed feugiat mi nec ex vehicula, nec vestibulum orci semper. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec tristique commodo fringilla.</p>
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
                                            <div class="accordion-item plans-accordion-single">
                                                <div class="accordion-header" id="planHeadingFive">
                                                    <div class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#planCollapse5" aria-expanded="true" role="navigation">
                                                        <div class="paln-index-circle">
                                                            <h4>04</h4>
                                                        </div>
                                                        <div class="plan-title">
                                                            <h5>DAY 1 : Departure And Small Tour</h5>
                                                            <h6>10.00 AM to 10.00 PM</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="planCollapse5" class="accordion-collapse collapse" aria-labelledby="planHeadingFive" data-bs-parent="#planAccordion">
                                                    <div class="accordion-body plan-info">
                                                        <p>Pellentesque accumsan magna in augue sagittis, non fringilla eros molestie. Sed feugiat mi nec ex vehicula, nec vestibulum orci semper. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec tristique commodo fringilla.</p>
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
                    <h3 class="widget-lavel">$75 <span>Per Person</span></h3>
                </div>
                <div class="widget-body tour__detail--navbar__form">
                    <form action="#" method="post" id="booking-form">
                        <div class="booking-form-wrapper">
                            <div class="custom-input-group row">
                                <input type="text" placeholder="Your Full Name" id="name">
                            </div>
                            <div class="custom-input-group row">
                                <input type="email" placeholder="Your Email" id="email">
                            </div>
                            <div class="custom-input-group row">
                            <input type="tel" placeholder="Phone" id="phone">
                            </div>
                            <div class="custom-input-group position-relative row">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                </svg>
                                <select id="ticket_type">
                                    <option selected="">Tickets Type</option>
                                    <option value="1">Tickets Type 1</option>
                                    <option value="2">Tickets Type 2</option>
                                    <option value="3">Tickets Type 3</option>
                                </select>
                            </div>
                            <div class="row">
                            <div class="col-sm-6">
                                <!-- <div class="custom-input-group">
                                    <i class="bi bi-chevron-down"></i>
                                    <select id="truist-adult">
                                        <option selected="">Adult</option>
                                        <option value="1"> 1</option>
                                        <option value="2"> 2</option>
                                        <option value="3"> 3</option>
                                    </select>
                                </div> -->
                                <div class="custom-input-group position-relative row">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                    <select id="ticket_type">
                                        <option selected="">Adult</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>  
                            </div>
                            <div class="col-sm-6">
                                <div class="custom-input-group position-relative row">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                    <select id="ticket_type">
                                        <option selected="">Child</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>  
                            </div>
                            </div>
                            <div class="custom-input-group  position-relative row">
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
                                    <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/>
                                    <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                                </svg> -->
                                <input placeholder="Select your date" type="date" name="checkIn" id="datepicker2" value="" class="calendar hasDatepicker">
                            </div>
                            <div class="custom-input-group pt-4">
                            <textarea cols="45" rows="6" placeholder="Your message"></textarea>
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
    </div>
</div>

<?php require('includes/footer.html'); ?>