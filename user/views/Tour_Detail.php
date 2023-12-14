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

<div class="container">
    <div class="row tour__detail--container">
        <div class="col-md-8">
            <div class="row">
                <div class="col-12">
                    <img src="../../../user/assets/img/tour__detail/pd-thumb.png" alt="">
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
            <div class="row">
                <div class="col-md-12 m-4">
                    <ul class="nav nav-pills mb-12 tour__detail--navbar" id="pills-tab" role="tablist">
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
                            <div class="row position-relative">
                                <div class="tour__detail--img col-md-6">
                                    <img src="../../../user/assets/img/tour__detail/feat-img1.png" alt="">
                                </div>
                                <div class="tour__detail--img col-md-6">
                                    <img src="../../../user/assets/img/tour__detail/feat-img2.png" alt="">
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
                            <div class="row">
                                <table class="desti--detail__overview-table col-12">
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
                                                <div class="tour__detail--transport col-md-12">
                                                    <img src="../../../user/assets/img/tour__detail/bus.svg" alt="">
                                                    <span>Travel With Bus</span>
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
                                            <div class="col-6">
                                                <input type="text" placeholder="Your Full Name">
                                            </div>
                                            <div class="col-6">
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
                                    </div>
                                </aside>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-TravelPlan" role="tabpanel" aria-labelledby="pills-TravelPlan-tab">Hieu</div>
                        <div class="tab-pane fade" id="pills-TourGallary" role="tabpanel" aria-labelledby="pills-TourGallary-tab">Dz</div>
                        <div class="tab-pane fade" id="pills-Location" role="tabpanel" aria-labelledby="pills-Location-tab">Dz</div>
                    </div>
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
                            <form action="#" method="post" id="desti__detail--blog-sidebar-search">
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
                                        <input class="form-check-input" type="checkbox" id="cate">
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
                                    <input class="form-check-input" type="checkbox" id="cate">
                                    <label class="desti__detail--form-check-label m-1" for="cate">
                                        1 - 3 Days
                                    </label>
                                    
                                </li>
                                
                                <li class="desti__detail--category-check pt-2 pb-2 tour__duration">
                                    <input class="form-check-input" type="checkbox" id="cate">
                                    <label class="desti__detail--form-check-label m-1" for="cate">
                                        3 - 5 Days
                                    </label>
                                    
                                </li>

                                <li class="desti__detail--category-check pt-2 pb-2 tour__duration">
                                    <input class="form-check-input" type="checkbox" id="cate">
                                    <label class="desti__detail--form-check-label m-1" for="cate">
                                        5 - 7 Days
                                    </label>
                                    
                                </li>

                                <li class="desti__detail--category-check pt-2 pb-2 tour__duration">
                                    <input class="form-check-input" type="checkbox" id="cate">
                                    <label class="desti__detail--form-check-label m-1" for="cate">
                                        7 - 9 Days
                                    </label>
                                    
                                </li>

                                <li class="desti__detail--category-check pt-2 pb-2 tour__duration">
                                    <input class="form-check-input" type="checkbox" id="cate">
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

<?php require('includes/footer.html'); ?>