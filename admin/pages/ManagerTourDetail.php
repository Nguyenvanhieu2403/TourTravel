<?php 
    require(__DIR__. '\\include\\header-Links.html');
    require_once('../../admin/models/Tour.php');
    $tours;
    if (isset($_GET['search']) && isset($_GET['tourtype'])) {
        $search = $_GET['search'];
        $tourtype = $_GET['tourtype'];
        $tours = Tour::Search($search, $tourtype);
    } 
    else if (isset($_GET['search'])) {
        $search = $_GET['search'];
        $tours = Tour::Search($search, null);
    } 
    else if (isset($_GET['tourtype'])) {
        $tourtype = $_GET['tourtype'];
        $tours = Tour::Search(null, $tourtype);
    }else {
        $tours = Tour::GetAll();
    }

    if (isset($_GET['lock'])) {
        $id = $_GET['lock'];
        Tour::DeleteTour($id);
        header("Location: ManagerTours.php");
    }

    $tourType = Tour::GetAllTourType();
?>
<body>
    <div class="test row m-0">
        <?php require('include/slideBar.html')?>
        <div class=" col-md-10 ">
            <div class="row">
                <div class="col-md-12">
                    <?php require('include/header.html')?>
                </div>
            </div>
            <div class="row ">
                <div class="managerTourDetail--container">  
                    <h1>Tour</h1>
                    <div class="row ms-5">
                        <div class="col-md-5 managerTourDetail--element m-3">
                            <div class="row">
                                <div class="col-md-4 text-start">
                                    <span>Title Tour</span>
                                </div>
                                <div class="col-md-8 text-end">
                                    <input class="w-100" type="text" name="titleTour" id="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 managerTourDetail--element m-3">
                            <div class="row">
                                <div class="col-md-4 text-start">
                                    <span>Price</span>
                                </div>
                                <div class="col-md-8 text-end">
                                    <input class="w-100" type="number" name="price" id="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 managerTourDetail--element m-3">
                            <div class="row">
                                <div class="col-md-4 text-start">
                                    <span>Day</span>
                                </div>
                                <div class="col-md-8 text-end">
                                    <input class="w-100" type="number" name="day" id="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 managerTourDetail--element m-3">
                            <div class="row">
                                <div class="col-md-4 text-start">
                                    <span>Night</span>
                                </div>
                                <div class="col-md-8 text-end">
                                    <input class="w-100" type="Number" name="night" id="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 managerTourDetail--element m-3">
                            <div class="row">
                                <div class="col-md-4 text-start">
                                    <span>City</span>
                                </div>
                                <div class="col-md-8 text-end">
                                    <input class="w-100" type="text" name="city" id="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 managerTourDetail--element m-3">
                            <div class="row">
                                <div class="col-md-4 text-start">
                                    <span>Tour Type</span>
                                </div>
                                <div class="col-md-8 text-end">
                                    <select name="tourType" id="TourType">
                                        <option value="New York City">New York City</option>
                                        <option value="Adventure Tour">Adventure Tour</option>
                                        <option value="Couple Tour">Couple Tour</option>
                                        <option value=" Village Tour"> Village Tour</option>
                                        <option value="Group Tour">Group Tour</option>
                                        <option value="Village Tour">Village Tour</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 managerTourDetail--element m-3">
                            <div class="row">
                                <div class="col-md-4 text-start">
                                    <span>Image</span>
                                </div>
                                <div class="col-md-8 text-end">
                                    <input class="w-100" type="text" name="img" id="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="managerTourDetail--container">  
                    <h1>Tour Detail</h1>
                    <div class="row ms-5">
                        <div class="col-md-5 managerTourDetail--element m-3">
                            <div class="row">
                                <div class="col-md-4 text-start">
                                    <span>Name</span>
                                </div>
                                <div class="col-md-8 text-end">
                                    <input class="w-100" type="text" name="" id="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 managerTourDetail--element m-3">
                            <div class="row">
                                <div class="col-md-4 text-start">
                                    <span>Title Information</span>
                                </div>
                                <div class="col-md-8 text-end">
                                    <input class="w-100" type="text" name="" id="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 managerTourDetail--element m-3">
                            <div class="row">
                                <div class="col-md-4 text-start">
                                    <span>Title Travel Plan</span>
                                </div>
                                <div class="col-md-8 text-end">
                                    <input class="w-100" type="text" name="" id="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 managerTourDetail--element m-3">
                            <div class="row">
                                <div class="col-md-4 text-start">
                                    <span>Transport</span>
                                </div>
                                <div class="col-md-8 text-end">
                                    <input class="w-100" type="text" name="" id="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 managerTourDetail--element m-3">
                            <div class="row">
                                <div class="col-md-4 text-start">
                                    <span>Plan Detail</span>
                                </div>
                                <div class="col-md-8">
                                    <table id="table_size">
                                        <tr id="title">
                                            <th>Title</th>
                                        </tr>
                                        <tr id="start_time">
                                            <td>Start Time</td>
                                        </tr>
                                        <tr id="end_time">
                                            <td>End Time</td>
                                        </tr>
                                        <tr id="content">
                                            <td>Content</td>
                                        </tr>
                                    </table>
                                    <span><button class="plus size_plus"><i class="fa-solid fa-plus"></i></button></span>
                                    <span><button class="minus size_minus"><i class="fa-solid fa-minus"></i></button></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">

                        </div>
                        <div class="col-md-5 managerTourDetail--element m-3">
                            <div class="row">
                                <div class="col-md-4 text-start">
                                    <span>Departure Time</span>
                                </div>
                                <div class="col-md-8 text-end">
                                    <input class="w-100" type="text" name="" id="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 managerTourDetail--element m-3">
                            <div class="row">
                                <div class="col-md-4 text-start">
                                    <span>Return Time</span>
                                </div>
                                <div class="col-md-8 text-end">
                                    <input class="w-100" type="text" name="" id="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 managerTourDetail--element m-3">
                            <div class="row">
                                <div class="col-md-4 text-start">
                                    <span>Included</span>
                                </div>
                                <div class="col-md-8 text-end">
                                    <input class="w-100" type="text" name="" id="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 managerTourDetail--element m-3">
                            <div class="row">
                                <div class="col-md-4 text-start">
                                    <span>Excluded</span>
                                </div>
                                <div class="col-md-8 text-end">
                                    <input class="w-100" type="text" name="" id="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 managerTourDetail--element m-3">
                            <div class="row">
                                <div class="col-md-4 text-start">
                                    <span>Images</span>
                                </div>
                                <div class="col-md-8 text-end img-container">
                                    <div id="img-container">
                                        <input class="w-100" type="text" name="img" id="img">
                                    </div>
                                    <span><button class="plus add-img"><i class="fa-solid fa-plus"></i></button></span>
                                    <span><button class="minus delete-img"><i class="fa-solid fa-minus"></i></button></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5"></div>

                        <div class="col-md-10 text-end m-3">
                            <button class="btn btn-danger m-3 p-3">Cancel</button>
                            <button class="btn btn-primary m-3 p-3 ManagerTourDetail__save">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require(__DIR__. '\\include\\libraryJs-Links.html')?>
    <script src="../../../admin/assets/js/header.js"></script> 
    <script src="../../../admin/assets/js/slideBar.js"></script>
</body>

<script>
    function editCell(cell) {
    var currentData = $(cell).html();

    var input = $("<input>").css('width', '50px').val(currentData);

    input.blur(function () {
        $(cell).html(input.val());
    });

    $(cell).html("");
    $(cell).append(input);

    input.focus();
}

$('.size_plus').click(function() {
    themCotSize();
});

const table_size = $("#table_size");

function themCotSize() {
    var title = $("#title");
    var start_time = $("#start_time");
    var end_time = $("#end_time");
    var content = $("#content");

    title.append('<th onclick="editCell(this)"></th>');
    start_time.append('<td onclick="editCell(this)"></td>');
    end_time.append('<td onclick="editCell(this)"></td>');
    content.append('<td onclick="editCell(this)"></td>');
}

$('.size_minus').click(function() {
    const columnCount = table_size.find('tr:first td, tr:first th').length;

    if (columnCount >= 3) {
        table_size.find('tr').each(function() {
            $(this).find('td:last, th:last').remove();
        });
    }
});

// Thêm ảnh
$(document).ready(function () {
    $('.add-img').click(function() {
        themInput();
    });

    $('.delete-img').click(function() {
        xoaInput();
    });
});

    function themInput() {
        var imgContainer = $('#img-container');
        var input = $("<input>").addClass('w-100').attr('type', 'text').attr('name', 'img');
        imgContainer.append(input);
    }

    function xoaInput() {
        var imgContainer = $('#img-container');
        var inputs = imgContainer.find('input');

        if (inputs.length > 1) {
            inputs.last().remove();
        }
    }

    $('.ManagerTourDetail__save').click(function(e) {
        e.preventDefault();
        var titleTour = $('.managerTourDetail--element input[name="titleTour"]').val();
        var price = $('.managerTourDetail--element input[name="price"]').val();
        var day = $('.managerTourDetail--element input[name="day"]').val();
        var night = $('.managerTourDetail--element input[name="night"]').val();
        var city = $('.managerTourDetail--element input[name="city"]').val();
        var tourType = $('.managerTourDetail--element select[name="tourType"]').val();
        var img = $('.managerTourDetail--element input[name="img"]').val();

        Tour = {
            titleTour: titleTour,
            price: price,
            day: day,
            night: night,
            city: city,
            tourType: tourType,
            img: img
        }

        // window.location.href = `ManagerTourDetail.php?tour=${Tour}`;
        console.log(Tour);
    });


</script>
