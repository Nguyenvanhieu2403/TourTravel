<?php require('includes/header.html'); ?>
<?php require('includes/navbar.html'); ?>

<div class="homepage">
    <div class="homepage_first">    
        <div class="homepage_search">
            <div class="container">
                <div class="row home justify-content-between">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-10 row mb-3">
                        <div class="col-lg-3 col-md-6 px-0">
                            <div class="destination d-flex p-1 my-1">
                                <div class="des-icon ms-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                        <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10"/>
                                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                    </svg>
                                </div>
                                <div class="des-infor ms-3">
                                    <label class="fw-bold" for="">Destination</label>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected>Where are you going ?</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>  
                        </div>
                        <div class="col-lg-3 col-md-6 px-0">
                            <div class="traveltype d-flex p-1 my-1">
                                <div class="travel-icon ms-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-text-paragraph" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M2 12.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5m0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5m4-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5"/>
                                    </svg>
                                </div>
                                <div class="travel-infor ms-3">
                                    <label class="fw-bold" for="">Travel Type</label>
                                    <select class="form-select" aria-label="Default select example" style="width: 120%">
                                        <option selected>All activity</option>
                                        <option value="1">Type 1</option>
                                        <option value="2">Type 2</option>
                                        <option value="3">Type 3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 px-0">
                            <div class="person d-flex p-1 my-1">
                                <div class="person-icon ms-2 col-xl-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                                        <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664z"/>
                                        <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5"/>
                                    </svg>
                                </div>
                                <div class="person-infor ms-3 col-xl-2">
                                    <label class="fw-bold" for="">Person</label>
                                    <select class="form-select" aria-label="Default select example" style="width: 150%">
                                        <option selected value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 px-0">
                            <div class="capslock d-flex p-1 my-1">
                                <div class="capslock-icon ms-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-capslock" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M7.27 1.047a1 1 0 0 1 1.46 0l6.345 6.77c.6.638.146 1.683-.73 1.683H11.5v1a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1v-1H1.654C.78 9.5.326 8.455.924 7.816L7.27 1.047zM14.346 8.5 8 1.731 1.654 8.5H4.5a1 1 0 0 1 1 1v1h5v-1a1 1 0 0 1 1-1zm-9.846 5a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1zm6 0h-5v1h5z"/>
                                    </svg>
                                </div>
                                <div class="capslock-infor ms-3">
                                    <p class="m-0 fw-bold">When</p>
                                    <input class="date" type="date" placeholder="Select your date">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-2 ps-0">
                        <div class="submit d-flex justify-content-center align-items-center">
                            <button class="fw-bold btn" type="submit">Find Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                        <div class="content">
                            <div class="address d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt mt-1" viewBox="0 0 16 16">
                                    <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10"/>
                                    <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                                </svg>
                                <h4 class="ps-2 fs-4 fw-normal">Mount Dtna, Italy</h4>
                            </div>
                            <div class="title">
                                <h3>Travel far enough, you meet <span class="yourself">YOURSELF.</span></h3>
                            </div>
                            <div class="price">
                                <h5>$250.00 / <span class="person">Person</span></h5>
                            </div>
                            <div class="detail">
                                <p>Sed convallis sit amet leo quis feugiat. Nunc interdum mollis facilisis.
                                Donec id the urna aliquet, suscipit turpis ut Donec id urna aliquet,
                                suscipit turpis ut, facilisis purus.Sed convallis sit amet leo quis feugiat.</p>
                            </div>
                            <div class="button">
                                <button class="booknow">Book Now</button>
                                <button class="viewdetails">View Details</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                        <img class="slide-img" src="../../../user/assets/img/homepage/slide/slide_1.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="homepage_second">
        <h2 class="text-center pb-5">Choose Your Package</h2>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                    <div class="package-card">
                        <div class="package-thumb">
                            <a href="">
                                <img class="package-img" src="../../../user/assets/img/homepage/package/pakage_1.png" alt="">
                            </a>
                            <p class="thumb-day">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                    <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/>
                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0"/>
                                </svg>
                                <span>3 Day & 2 Night</span>
                            </p>
                        </div>
                        <div class="package-body">
                            <div class="body-content">
                                <h3>
                                    <a class="text-decoration-none text-dark fs-5" href="">Etiam placerat dictum consequat an Pellentesque habitant morbi.</a>
                                </h3>
                            </div>
                            <div class="body-info">
                                <div class="book-btn">
                                    <a class="text-decoration-none" href="">BOOK NOW
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8"/>
                                        </svg>
                                    </a>
                                </div>
                                <div class="body-price">
                                    <span class="from">From</span>
                                    <h6>$79.00 <span class="person">Per Person</span></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                    <div class="package-card">
                        <div class="package-thumb">
                            <a href="">
                                <img class="package-img" src="../../../user/assets/img/homepage/package/pakage_2.png" alt="">
                            </a>
                            <p class="thumb-day">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                    <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/>
                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0"/>
                                </svg>
                                <span>5 Day & 6 Night</span>
                            </p>
                        </div>
                        <div class="package-body">
                            <div class="body-content">
                                <h3>
                                    <a class="text-decoration-none text-dark fs-5" href="">Etiam placerat dictum consequat an Pellentesque habitant morbi.</a>
                                </h3>
                            </div>
                            <div class="body-info">
                                <div class="book-btn">
                                    <a class="text-decoration-none" href="">BOOK NOW
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8"/>
                                        </svg>
                                    </a>
                                </div>
                                <div class="body-price">
                                    <span class="from">From</span>
                                    <h6>$79.00 <span class="person">Per Person</span></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                    <div class="package-card">
                        <div class="package-thumb">
                            <a href="">
                                <img class="package-img" src="../../../user/assets/img/homepage/package/pakage_3.png" alt="">
                            </a>
                            <p class="thumb-day">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                    <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/>
                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0"/>
                                </svg>
                                <span>4 Day & 3 Night</span>
                            </p>
                        </div>
                        <div class="package-body">
                            <div class="body-content">
                                <h3>
                                    <a class="text-decoration-none text-dark fs-5" href="">Etiam placerat dictum consequat an Pellentesque habitant morbi.</a>
                                </h3>
                            </div>
                            <div class="body-info">
                                <div class="book-btn">
                                    <a class="text-decoration-none" href="">BOOK NOW
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8"/>
                                        </svg>
                                    </a>
                                </div>
                                <div class="body-price">
                                    <span class="from">From</span>
                                    <h6>$79.00 <span class="person">Per Person</span></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                    <div class="package-card">
                        <div class="package-thumb">
                            <a href="">
                                <img class="package-img" src="../../../user/assets/img/homepage/package/pakage_4.png" alt="">
                            </a>
                            <p class="thumb-day">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                    <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/>
                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0"/>
                                </svg>
                                <span>5 Day & 6 Night</span>
                            </p>
                        </div>
                        <div class="package-body">
                            <div class="body-content">
                                <h3>
                                    <a class="text-decoration-none text-dark fs-5" href="">Etiam placerat dictum consequat an Pellentesque habitant morbi.</a>
                                </h3>
                            </div>
                            <div class="body-info">
                                <div class="book-btn">
                                    <a class="text-decoration-none" href="">BOOK NOW
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8"/>
                                        </svg>
                                    </a>
                                </div>
                                <div class="body-price">
                                    <span class="from">From</span>
                                    <h6>$79.00 <span class="person">Per Person</span></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                    <div class="package-card">
                        <div class="package-thumb">
                            <a href="">
                                <img class="package-img" src="../../../user/assets/img/homepage/package/pakage_5.png" alt="">
                            </a>
                            <p class="thumb-day">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                    <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/>
                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0"/>
                                </svg>
                                <span>4 Day & 3 Night</span>
                            </p>
                        </div>
                        <div class="package-body">
                            <div class="body-content">
                                <h3>
                                    <a class="text-decoration-none text-dark fs-5" href="">Etiam placerat dictum consequat an Pellentesque habitant morbi.</a>
                                </h3>
                            </div>
                            <div class="body-info">
                                <div class="book-btn">
                                    <a class="text-decoration-none" href="">BOOK NOW
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8"/>
                                        </svg>
                                    </a>
                                </div>
                                <div class="body-price">
                                    <span class="from">From</span>
                                    <h6>$79.00 <span class="person">Per Person</span></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                    <div class="package-card">
                        <div class="package-thumb">
                            <a href="">
                                <img class="package-img" src="../../../user/assets/img/homepage/package/pakage_6.png" alt="">
                            </a>
                            <p class="thumb-day">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                    <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/>
                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0"/>
                                </svg>
                                <span>3 Day & 2 Night</span>
                            </p>
                        </div>
                        <div class="package-body">
                            <div class="body-content">
                                <h3>
                                    <a class="text-decoration-none text-dark fs-5" href="">Etiam placerat dictum consequat an Pellentesque habitant morbi.</a>
                                </h3>
                            </div>
                            <div class="body-info">
                                <div class="book-btn">
                                    <a class="text-decoration-none" href="">BOOK NOW
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8"/>
                                        </svg>
                                    </a>
                                </div>
                                <div class="body-price">
                                    <span class="from">From</span>
                                    <h6>$79.00 <span class="person">Per Person</span></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="package-btn">
                    <a class="btn-viewall text-decoration-none" href="">View All</a>
                </div>
            </div>
        </div>
    </div>
    <div class="homepage_third">
        <h2 class="text-center">Top Destination</h2>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <div class="top-card my-3">
                        <div class="top-thumb">
                            <img src="../../../user/assets/img/homepage/top_destination/destination_1.png" alt="">
                        </div>
                        <div class="top-content">
                            <h4 class="content-title">
                                <a class="text-white text-decoration-none" href="">Nuremberg</a>
                            </h4>
                            <div class="content-place text-white">
                                <p><span>45</span> Place</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <div class="top-card my-3">
                        <div class="top-thumb">
                            <img src="../../../user/assets/img/homepage/top_destination/destination_2.png" alt="">
                        </div>
                        <div class="top-content">
                            <h4 class="content-title">
                                <a class="text-white text-decoration-none" href="">Bielefeld</a>
                            </h4>
                            <div class="content-place text-white">
                                <p><span>45</span> Place</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <div class="top-card my-3">
                        <div class="top-thumb">
                            <img src="../../../user/assets/img/homepage/top_destination/destination_3.png" alt="">
                        </div>
                        <div class="top-content">
                            <h4 class="content-title">
                                <a class="text-white text-decoration-none" href="">Bielefeld</a>
                            </h4>
                            <div class="content-place text-white">
                                <p><span>45</span> Place</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <div class="top-card my-3">
                        <div class="top-thumb">
                            <img src="../../../user/assets/img/homepage/top_destination/destination_4.png" alt="">
                        </div>
                        <div class="top-content">
                            <h4 class="content-title">
                                <a class="text-white text-decoration-none" href="">Augsburg</a>
                            </h4>
                            <div class="content-place text-white">
                                <p><span>45</span> Place</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <div class="top-card my-3">
                        <div class="top-thumb">
                            <img src="../../../user/assets/img/homepage/top_destination/destination_5.png" alt="">
                        </div>
                        <div class="top-content">
                            <h4 class="content-title">
                                <a class="text-white text-decoration-none" href="">Chemnitz</a>
                            </h4>
                            <div class="content-place text-white">
                                <p><span>45</span> Place</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <div class="top-card my-3">
                        <div class="top-thumb">
                            <img src="../../../user/assets/img/homepage/top_destination/destination_6.png" alt="">
                        </div>
                        <div class="top-content">
                            <h4 class="content-title">
                                <a class="text-white text-decoration-none" href="">Oberhausen</a>
                            </h4>
                            <div class="content-place text-white">
                                <p><span>45</span> Place</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <div class="top-card my-3">
                        <div class="top-thumb">
                            <img src="../../../user/assets/img/homepage/top_destination/destination_7.png" alt="">
                        </div>
                        <div class="top-content">
                            <h4 class="content-title">
                                <a class="text-white text-decoration-none" href="">Oberhausen</a>
                            </h4>
                            <div class="content-place text-white">
                                <p><span>45</span> Place</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <div class="top-card my-3">
                        <div class="top-thumb">
                            <img src="../../../user/assets/img/homepage/top_destination/destination_8.png" alt="">
                        </div>
                        <div class="top-content">
                            <h4 class="content-title">
                                <a class="text-white text-decoration-none" href="">Wiesbaden</a>
                            </h4>
                            <div class="content-place text-white">
                                <p><span>45</span> Place</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="homepage_four">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 p-0">
                    <div class="banner_left">
                        <div class="left-content">
                            <h2>Get 10% Off On <br><span>Family & Group</span> Tour</h2>
                            <h6>Sign up to receive the best offers on promotion and coupons. Don’t worry! It’s not Spam</h6>
                            <div class="explore-btn">
                                <a class="text-decoration-none" href="">Explore Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6 p-0">
                    <div class="banner_right">
                        <div class="right-content">
                            <h2>SUBSCRIBE OUR <br><span>NEWSLETTER</span></h2>
                            <h6>Sign up to receive the best offers on promotion and coupons. Don’t worry! It’s not Spam</h6>
                            <form onsubmit="return false" action="">
                                <div class="form-body">
                                    <input type="text" placeholder="Enter Your Email Here ...">
                                    <button type="submit"> Subscribe</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="homepage_five">
        <h2 class="text-center">Choose Your Package</h2>
        <div class="offer-button text-center">
            <button class="btn btn-10">10%</button>
            <button class="btn btn-20">20%</button>
            <button class="btn btn-30">30%</button>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                    <div class="package-card">
                        <div class="package-thumb">
                            <a href="">
                                <img class="package-img" src="../../../user/assets/img/homepage/package/pakage_1.png" alt="">
                            </a>
                            <p class="thumb-day">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                    <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/>
                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0"/>
                                </svg>
                                <span>3 Day & 2 Night</span>
                            </p>
                        </div>
                        <div class="package-body">
                            <div class="body-content">
                                <h3>
                                    <a class="text-decoration-none text-dark fs-5" href="">Etiam placerat dictum consequat an Pellentesque habitant morbi.</a>
                                </h3>
                            </div>
                            <div class="body-info">
                                <div class="book-btn">
                                    <a class="text-decoration-none" href="">BOOK NOW
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8"/>
                                        </svg>
                                    </a>
                                </div>
                                <div class="body-price">
                                    <span class="from">From</span>
                                    <h6>$79.00 <span class="person">Per Person</span></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                    <div class="package-card">
                        <div class="package-thumb">
                            <a href="">
                                <img class="package-img" src="../../../user/assets/img/homepage/package/pakage_2.png" alt="">
                            </a>
                            <p class="thumb-day">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                    <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/>
                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0"/>
                                </svg>
                                <span>5 Day & 6 Night</span>
                            </p>
                        </div>
                        <div class="package-body">
                            <div class="body-content">
                                <h3>
                                    <a class="text-decoration-none text-dark fs-5" href="">Etiam placerat dictum consequat an Pellentesque habitant morbi.</a>
                                </h3>
                            </div>
                            <div class="body-info">
                                <div class="book-btn">
                                    <a class="text-decoration-none" href="">BOOK NOW
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8"/>
                                        </svg>
                                    </a>
                                </div>
                                <div class="body-price">
                                    <span class="from">From</span>
                                    <h6>$79.00 <span class="person">Per Person</span></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                    <div class="package-card">
                        <div class="package-thumb">
                            <a href="">
                                <img class="package-img" src="../../../user/assets/img/homepage/package/pakage_3.png" alt="">
                            </a>
                            <p class="thumb-day">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                    <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/>
                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0"/>
                                </svg>
                                <span>4 Day & 3 Night</span>
                            </p>
                        </div>
                        <div class="package-body">
                            <div class="body-content">
                                <h3>
                                    <a class="text-decoration-none text-dark fs-5" href="">Etiam placerat dictum consequat an Pellentesque habitant morbi.</a>
                                </h3>
                            </div>
                            <div class="body-info">
                                <div class="book-btn">
                                    <a class="text-decoration-none" href="">BOOK NOW
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8"/>
                                        </svg>
                                    </a>
                                </div>
                                <div class="body-price">
                                    <span class="from">From</span>
                                    <h6>$79.00 <span class="person">Per Person</span></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                    <div class="package-card">
                        <div class="package-thumb">
                            <a href="">
                                <img class="package-img" src="../../../user/assets/img/homepage/package/pakage_4.png" alt="">
                            </a>
                            <p class="thumb-day">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                    <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/>
                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0"/>
                                </svg>
                                <span>5 Day & 6 Night</span>
                            </p>
                        </div>
                        <div class="package-body">
                            <div class="body-content">
                                <h3>
                                    <a class="text-decoration-none text-dark fs-5" href="">Etiam placerat dictum consequat an Pellentesque habitant morbi.</a>
                                </h3>
                            </div>
                            <div class="body-info">
                                <div class="book-btn">
                                    <a class="text-decoration-none" href="">BOOK NOW
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8"/>
                                        </svg>
                                    </a>
                                </div>
                                <div class="body-price">
                                    <span class="from">From</span>
                                    <h6>$79.00 <span class="person">Per Person</span></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                    <div class="package-card">
                        <div class="package-thumb">
                            <a href="">
                                <img class="package-img" src="../../../user/assets/img/homepage/package/pakage_5.png" alt="">
                            </a>
                            <p class="thumb-day">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                    <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/>
                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0"/>
                                </svg>
                                <span>4 Day & 3 Night</span>
                            </p>
                        </div>
                        <div class="package-body">
                            <div class="body-content">
                                <h3>
                                    <a class="text-decoration-none text-dark fs-5" href="">Etiam placerat dictum consequat an Pellentesque habitant morbi.</a>
                                </h3>
                            </div>
                            <div class="body-info">
                                <div class="book-btn">
                                    <a class="text-decoration-none" href="">BOOK NOW
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8"/>
                                        </svg>
                                    </a>
                                </div>
                                <div class="body-price">
                                    <span class="from">From</span>
                                    <h6>$79.00 <span class="person">Per Person</span></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
                    <div class="package-card">
                        <div class="package-thumb">
                            <a href="">
                                <img class="package-img" src="../../../user/assets/img/homepage/package/pakage_6.png" alt="">
                            </a>
                            <p class="thumb-day">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                    <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/>
                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0"/>
                                </svg>
                                <span>3 Day & 2 Night</span>
                            </p>
                        </div>
                        <div class="package-body">
                            <div class="body-content">
                                <h3>
                                    <a class="text-decoration-none text-dark fs-5" href="">Etiam placerat dictum consequat an Pellentesque habitant morbi.</a>
                                </h3>
                            </div>
                            <div class="body-info">
                                <div class="book-btn">
                                    <a class="text-decoration-none" href="">BOOK NOW
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8"/>
                                        </svg>
                                    </a>
                                </div>
                                <div class="body-price">
                                    <span class="from">From</span>
                                    <h6>$79.00 <span class="person">Per Person</span></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="package-btn">
                    <a class="btn-viewalloffer text-decoration-none" href="">View All Offer</a>
                </div>
            </div>
        </div>
    </div>
    <div class="homepage_six">
        <h2 class="text-center">Explore The world</h2>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col md-12 col lg-12 col-xl-12">
                    <div class="map position-relative">
                        <div class="map-img">
                            <img src="../../../user/assets/img/homepage/map/map.png" alt="">
                        </div>
                        <div class="location location-1">
                            <div class="location-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
                                </svg>
                            </div>
                            <div class="location-disc">
                                <h6>United States</h6>
                                <p>Sed rhoncus eros eu est faucibuses rhoncus. In lobortis, ex sit ametend ultricies blandit,</p>
                            </div>
                        </div>
                        <div class="location location-2">
                            <div class="location-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
                                </svg>
                            </div>
                            <div class="location-disc">
                                <h6>United Kingdom</h6>
                                <p>Sed rhoncus eros eu est faucibuses rhoncus. In lobortis, ex sit ametend ultricies blandit,</p>
                            </div>
                        </div>
                        <div class="location location-3">
                            <div class="location-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
                                </svg>
                            </div>
                            <div class="location-disc">
                                <h6>Chaina</h6>
                                <p>Sed rhoncus eros eu est faucibuses rhoncus. In lobortis, ex sit ametend ultricies blandit,</p>
                            </div>
                        </div>
                        <div class="location location-4">
                            <div class="location-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
                                </svg>
                            </div>
                            <div class="location-disc">
                                <h6>Singapore</h6>
                                <p>Sed rhoncus eros eu est faucibuses rhoncus. In lobortis, ex sit ametend ultricies blandit,</p>
                            </div>
                        </div>
                        <div class="location location-5">
                            <div class="location-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
                                </svg>
                            </div>
                            <div class="location-disc">
                                <h6>Brazil</h6>
                                <p>Sed rhoncus eros eu est faucibuses rhoncus. In lobortis, ex sit ametend ultricies blandit,</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="homepage_seven">
        <div class="feedback">
            <div class="container">
                <div class="row">
                    <h2 class="text-center text-white">What Our Travelar Say</h2>
                </div>
                <div class="row align-items-center justify-content-center">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="feedback-body d-flex justify-content-center">
                            <div class="feedback-content">
                                <div class="review-text">
                                    <p>Duis rutrum nisl urna. Maecenas vel libero faucibus
                                    nisi venenatis hendrerit a id lectus. Suspendissendt
                                    molestie turpis nec lacinia vehicula. Quisque eget
                                    volutpat purus. Aenean blandit magna maximus landi
                                    quam facilisis, tempor porttitor elit hendrerit.
                                    Aliquam cursus arcu vel bibendum pulvinar. Sed
                                    dictumtr blandit interdum. Sed pellentesque at nunc
                                    eget consectetur.</p>
                                </div>
                                <div class="content-info">
                                    <div class="review-info">
                                        <div class="info-thumb">
                                            <img src="../../../user/assets/img/homepage/reviewer/reviewer.png" alt="">
                                        </div>
                                        <div class="info-text">
                                            <h5>Mixis Pull</h5>
                                            <p>Traveller</p>
                                        </div>
                                    </div>
                                    <ul class="list-inline">
                                        <li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                        </svg></li>
                                        <li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                        </svg></li>
                                        <li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                        </svg></li>
                                        <li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                        </svg></li>
                                        <li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                        </svg></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="homepage_eight">
        <div class="container">
            <div class="row pb-5">
                <div class="col-sm-12 col-md-12 col-lg-7 col-xl-7">
                    <div class="blog text-start mb-3">
                        <h2>Lastest Blog</h2>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-5 col-xl-5">
                    <div class="btn-viewall text-xl-end">
                        <a class="text-decoration-none" href="">View All</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                    <div class="blog-card">
                        <div class="blog-thumb">
                            <div class="card-thumb">
                                <a href="">
                                    <img src="../../../user/assets/img/homepage/blogs/blog-md-1.png" alt="">
                                </a>
                            </div>
                            <div class="card-type">
                                <a class="text-decoration-none text-white fw-bold" href="">Tour</a>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="content-info">
                                <div class="info-user">
                                    <a class="user-icon text-decoration-none" href="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                                        </svg> <span>By John Smith</span>
                                    </a>
                                    <a class="user-date text-decoration-none" href="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-week" viewBox="0 0 16 16">
                                            <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z"/>
                                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
                                        </svg> November 16, 2021
                                    </a>
                                </div>
                                <h4 class="title">
                                    <a class="text-decoration-none text-dark" href="">vitae tempor convallis, mi ligula an suscipit nunc, ornare suscipit.</a>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                    <div class="blog-card">
                        <div class="blog-thumb">
                            <div class="card-thumb">
                                <a href="">
                                    <img src="../../../user/assets/img/homepage/blogs/blog-md-2.png" alt="">
                                </a>
                            </div>
                            <div class="card-type">
                                <a class="text-decoration-none text-white fw-bold" href="">Travel</a>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="content-info">
                                <div class="info-user">
                                    <a class="user-icon text-decoration-none" href="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                                        </svg> <span>By John Smith</span>
                                    </a>
                                    <a class="user-date text-decoration-none" href="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-week" viewBox="0 0 16 16">
                                            <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z"/>
                                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
                                        </svg> November 16, 2021
                                    </a>
                                </div>
                                <h4 class="title">
                                    <a class="text-decoration-none text-dark" href="">vitae tempor convallis, mi ligula an suscipit nunc, ornare suscipit.</a>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                    <div class="blog-card">
                        <div class="blog-thumb">
                            <div class="card-thumb">
                                <a href="">
                                    <img src="../../../user/assets/img/homepage/blogs/blog-md-3.png" alt="">
                                </a>
                            </div>
                            <div class="card-type">
                                <a class="text-decoration-none text-white fw-bold" href="">Guide</a>
                            </div>
                        </div>
                        <div class="blog-content">
                            <div class="content-info">
                                <div class="info-user">
                                    <a class="user-icon text-decoration-none" href="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                                        </svg> <span>By John Smith</span>
                                    </a>
                                    <a class="user-date text-decoration-none" href="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-week" viewBox="0 0 16 16">
                                            <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z"/>
                                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
                                        </svg> November 16, 2021
                                    </a>
                                </div>
                                <h4 class="title">
                                    <a class="text-decoration-none text-dark" href="">vitae tempor convallis, mi ligula an suscipit nunc, ornare suscipit.</a>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="homepage_nine">
        <div class="container-fuild">
            <div class="row m-0 d-flex justify-content-between">
                <div class="col-2 p-0 py-4">
                    <div class="social-card">
                        <div class="card-thumb">
                            <img src="../../../user/assets/img/homepage/gallary/gallary_1.png" alt="">
                        </div>
                        <a class="card-overlay">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-2 p-0 py-4">
                    <div class="social-card">
                        <div class="card-thumb">
                            <img src="../../../user/assets/img/homepage/gallary/gallary_2.png" alt="">
                        </div>
                        <a class="card-overlay">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-2 p-0 py-4">
                    <div class="social-card">
                        <div class="card-thumb">
                            <img src="../../../user/assets/img/homepage/gallary/gallary_3.png" alt="">
                        </div>
                        <a class="card-overlay">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-2 p-0 py-4">
                    <div class="social-card">
                        <div class="card-thumb">
                            <img src="../../../user/assets/img/homepage/gallary/gallary_4.png" alt="">
                        </div>
                        <a class="card-overlay">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-2 p-0 py-4">
                    <div class="social-card">
                        <div class="card-thumb">
                            <img src="../../../user/assets/img/homepage/gallary/gallary_5.png" alt="">
                        </div>
                        <a class="card-overlay">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require('includes/footer.html'); ?>