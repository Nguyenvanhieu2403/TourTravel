<?php 
    require(__DIR__. '\\include\\header-Links.html');
    require_once('../../admin/models/Tour.php');
    require_once('../../admin/models/TourDetail.php');

    if (isset($_GET['tour']) 
    && isset($_GET['img']) 
    && isset($_GET['tourDetail']) 
    && isset($_GET['travelPlan']) 
    && isset($_GET['imgDetail'])
    && isset($_GET['TourId'])
    && isset($_GET['TourDetailId'])) {
        $tour = json_decode(urldecode($_GET['tour']), true);
        $img = json_decode(urldecode($_GET['img']), true);
        $tourDetail = json_decode(urldecode($_GET['tourDetail']), true);
        $travelPlan = json_decode(urldecode($_GET['travelPlan']), true);
        $imgDetail = json_decode(urldecode($_GET['imgDetail']), true);
        $TourId = $_GET['TourId'];
        $TourDetailId = $_GET['TourDetailId'];

        // Kiểm tra xem giải mã JSON có thành công không
        if ($tour !== null && $img !== null && $tourDetail !== null && $travelPlan !== null && $imgDetail !== null) {
            // Gọi hàm InsertTour với dữ liệu đã giải mã
            $result = Tour::UpdateTour($tour, $img, $tourDetail, $travelPlan, $imgDetail, $TourId, $TourDetailId );
            if($result) {
                echo "<script>alert('Successfull')</script>";
                echo "<script>window.location.href = 'ManagerTours.php'</script>";
            } else {
                echo "<script>alert('Error')</script>";
                echo "<script>window.location.href = 'ManagerTours.php'</script>";
            }
        } else {
            // Xử lý lỗi nếu giải mã không thành công
            echo "Failed to decode JSON data.";
        }
    }
    $tours;
    $tourDetails;

    if(isset($_GET['id'])) {
        $tourId = $_GET['id'];
        $tours = Tour::GetTourById($tourId);
        $tourDetails = TourDetail::GetTourDetailByTourId($tourId);
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
            <?php foreach ($tours as $tour): ?>
            <div class="row ">
                <div class="managerTourDetail--container">  
                    <h1>Tour</h1>
                    <div class="row ms-5">
                        <div class="col-md-5 managerTourDetail--element m-3">
                            <div class="row">
                                <div class="col-md-4 text-start">
                                    <div class="tour_id">
                                        <span id="<?php echo $tour->Id ?>">Title Tour</span>
                                    </div>
                                </div>
                                <div class="col-md-8 text-end">
                                    <input class="w-100" type="text" name="titleTour" id="" value="<?php echo $tour->TitleTour ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 managerTourDetail--element m-3">
                            <div class="row">
                                <div class="col-md-4 text-start">
                                    <span>Price</span>
                                </div>
                                <div class="col-md-8 text-end">
                                    <input class="w-100" type="number" name="price" id="" value="<?php echo $tour->Price ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 managerTourDetail--element m-3">
                            <div class="row">
                                <div class="col-md-4 text-start">
                                    <span>Day</span>
                                </div>
                                <div class="col-md-8 text-end">
                                    <input class="w-100" type="number" name="day" id="" value="<?php echo $tour->Day ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 managerTourDetail--element m-3">
                            <div class="row">
                                <div class="col-md-4 text-start">
                                    <span>Night</span>
                                </div>
                                <div class="col-md-8 text-end">
                                    <input class="w-100" type="Number" name="night" id="" value="<?php echo $tour->Night ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 managerTourDetail--element m-3">
                            <div class="row">
                                <div class="col-md-4 text-start">
                                    <span>City</span>
                                </div>
                                <div class="col-md-8 text-end">
                                    <input class="w-100" type="text" name="city" id="" value="<?php echo $tour->City ?>">
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
                                        <option value="<?php echo $tour->TourType ?>"><?php echo $tour->TourType; $tourtypeCheck = $tour->TourType; ?></option>
                                    <?php foreach ($tourType as $type): 
                                        if($type->TourType == $tourtypeCheck) {
                                            continue;
                                        }
                                        else {
                                    ?>
                                        
                                        <option value="<?php echo $type->TourType; ?>"><?php echo $type->TourType; ?></option>
                                    <?php };endforeach; ?>
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
                                    <input class="w-100" type="text" name="img" id="" value="<?php echo $tour->Image ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

            <?php 
                if($tourDetails != null) {
                foreach ($tourDetails as $tourDetail): 
            ?>
            <div class="row mt-5">
                <div class="managerTourDetail--container">  
                    <h1>Tour Detail</h1>
                    <div class="row ms-5">
                        <div class="col-md-5 managerTourDetail--element m-3">
                            <div class="row">
                                <div class="col-md-4 text-start">
                                    <div class="TourDetal_Id">
                                        <span id="<?php echo $tourDetail->Id ?>">Name</span>
                                    </div>
                                </div>
                                <div class="col-md-8 text-end">
                                    <input class="w-100" type="text" name="nameDetail" id="" value="<?php echo $tourDetail->Name ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 managerTourDetail--element m-3">
                            <div class="row">
                                <div class="col-md-4 text-start">
                                    <span>Description</span>
                                </div>
                                <div class="col-md-8 text-end">
                                    <textarea class="w-100" type="text" name="description" id="" ><?php echo $tourDetail->DescriptionInfo ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 managerTourDetail--element m-3">
                            <div class="row">
                                <div class="col-md-4 text-start">
                                    <span>Title Information</span>
                                </div>
                                <div class="col-md-8 text-end">
                                    <input class="w-100" type="text" name="titleInformation" id="" value="<?php echo $tourDetail->TitleInfor ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 managerTourDetail--element m-3">
                            <div class="row">
                                <div class="col-md-4 text-start">
                                    <span>Title Travel Plan</span>
                                </div>
                                <div class="col-md-8 text-end">
                                    <input class="w-100" type="text" name="titleTravelPlan" id="" value="<?php echo $tourDetail->TitleTravelPlan ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 managerTourDetail--element m-3">
                            <div class="row">
                                <div class="col-md-4 text-start">
                                    <span>Transport</span>
                                </div>
                                <div class="col-md-8 text-end">
                                    <input class="w-100" type="text" name="transport" id="" value="<?php echo $tourDetail->Transport ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 managerTourDetail--element m-3">
                            <div class="row">
                                <div class="col-md-4 text-start">
                                    <span>Departure Time</span>
                                </div>
                                <div class="col-md-8 text-end">
                                    <input class="w-100" type="date" name="departureTime" id="" value="<?php echo $tourDetail->DepartureTime ?>">
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
                                            <td>Title</td>
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
                        <div class="col-md-5"></div>
                        
                        <div class="col-md-5 managerTourDetail--element m-3">
                            <div class="row">
                                <div class="col-md-4 text-start">
                                    <span>Return Time</span>
                                </div>
                                <div class="col-md-8 text-end">
                                    <input class="w-100" type="date" name="returnTime" id="" value="<?php echo $tourDetail->ReturnTime ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 managerTourDetail--element m-3">
                            <div class="row">
                                <div class="col-md-4 text-start">
                                    <span>Included</span>
                                </div>
                                <div class="col-md-8 text-end">
                                    <input class="w-100" type="text" name="included" id="" value="<?php echo $tourDetail->Included ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 managerTourDetail--element m-3">
                            <div class="row">
                                <div class="col-md-4 text-start">
                                    <span>Excluded</span>
                                </div>
                                <div class="col-md-8 text-end">
                                    <input class="w-100" type="text" name="excluded" id="" value="<?php echo $tourDetail->Excluded ?>">
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
                                        <input class="w-100" type="text" name="img" id="img" value="<?php echo $tourDetail->Image ?>">
                                    </div>
                                    <span><button class="plus add-img"><i class="fa-solid fa-plus"></i></button></span>
                                    <span><button class="minus delete-img"><i class="fa-solid fa-minus"></i></button></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5"></div>

                        <div class="col-md-10 text-end m-3">
                            <button class="btn btn-danger m-3 p-3 ManagerTourDetail__cancel">Cancel</button>
                            <button class="btn btn-primary m-3 p-3 ManagerTourDetail__save">Save</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
            endforeach;  }?>
        </div>
    </div>
    <?php require(__DIR__. '\\include\\libraryJs-Links.html')?>
    <script src="../../../admin/assets/js/header.js"></script> 
    <script src="../../../admin/assets/js/slideBar.js"></script>
</body>

<script>
var columnData = [];

function editCell(cell, i) {
    var currentData = $(cell).html();
    var columnIndex = $(cell).index() - 1;

    if (!columnData[columnIndex]) {
        columnData[columnIndex] = [];
    }

    var input = "";
    if(i == 1) {
        input = $("<input>").css('width', '80px').attr('type', 'time').val(currentData);
    }
    else {
        input = $("<input>").css('width', '80px').val(currentData);
    }

    input.blur(function () {
        columnData[columnIndex].push(input.val());
        $(cell).html(input.val());
    });

    $(cell).html("");
    $(cell).append(input);

    input.focus();
}

$('.size_plus').click(function () {
    themCotSize();
});

const table_size = $("#table_size");

function themCotSize() {
    var title = $("#title");
    var start_time = $("#start_time");
    var end_time = $("#end_time");
    var content = $("#content");

    title.append('<td onclick="editCell(this, 0)"></td>');
    start_time.append('<td onclick="editCell(this, 1)"></td>');
    end_time.append('<td onclick="editCell(this, 1)"></td>');
    content.append('<td onclick="editCell(this, 0)"></td>');

    if (columnData.length > 0 && columnData[0] === null) {
        columnData.shift();
    }
}

$('.size_minus').click(function () {
    const columnCount = table_size.find('tr:first td, tr:first th').length;

    if (columnCount >= 2) {
        table_size.find('tr').each(function () {
            $(this).find('td:last, th:last').remove();
        });

        // Remove data for the last column
        columnData.pop();
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
    var titleTour = $('.managerTourDetail--element input[name="titleTour"]').val();
    var price = $('.managerTourDetail--element input[name="price"]').val();
    var day = $('.managerTourDetail--element input[name="day"]').val();
    var night = $('.managerTourDetail--element input[name="night"]').val();
    var city = $('.managerTourDetail--element input[name="city"]').val();
    var tourType = $('.managerTourDetail--element select[name="tourType"]').val();
    var img = $('.managerTourDetail--element input[name="img"]').val();

    var nameDetail = $('.managerTourDetail--element input[name="nameDetail"]').val();
    var description = $('.managerTourDetail--element textarea[name="description"]').val();
    var titleInformation = $('.managerTourDetail--element input[name="titleInformation"]').val();
    var titleTravelPlan = $('.managerTourDetail--element input[name="titleTravelPlan"]').val();
    var transport = $('.managerTourDetail--element input[name="transport"]').val();
    var departureTime = $('.managerTourDetail--element input[name="departureTime"]').val();
    var returnTime = $('.managerTourDetail--element input[name="returnTime"]').val();
    var included = $('.managerTourDetail--element input[name="included"]').val();
    var excluded = $('.managerTourDetail--element input[name="excluded"]').val();


    Tour = {
        titleTour: titleTour,
        price: price,
        day: day,
        night: night,
        city: city,
        tourType: tourType
    }

    imgTour = {
        img
    }

    TourDetail = {
        Name: nameDetail,
        DestinationInfor: description,
        TitleInfor: titleInformation,
        TitleTravelPlan: titleTravelPlan,
        Transport: transport,
        DepartureTime: departureTime,
        ReturnTime: returnTime,
        Included: included,
        Excluded: excluded
    }

    if (columnData.length > 0 && columnData[0] === null) {
        columnData.shift();
    }

    var TourId = $('.TourDetal_Id span').attr('id');
    var TourDetailId = $('.TourDetal_Id span').attr('id');

    TravelPlan =columnData;
    ImgDetail = layGiaTriInput();
    // window.location.href = `ManagerTourDetail.php?tour=${Tour}&img=${imgTour}&tourDetail=${TourDetail}&travelPlan=${TravelPlan}&imgDetail=${ImgDetail}`;
    var tourString = encodeURIComponent(JSON.stringify(Tour));
    var imgString = encodeURIComponent(JSON.stringify(imgTour));
    var tourDetailString = encodeURIComponent(JSON.stringify(TourDetail));
    var travelPlanString = encodeURIComponent(JSON.stringify(TravelPlan));
    var ImgDetail = encodeURIComponent(JSON.stringify(ImgDetail));

    // Truyền dữ liệu qua URL
    window.location.href = `UpdateTourDetail.php?tour=${tourString}&img=${imgString}&tourDetail=${tourDetailString}&travelPlan=${travelPlanString}&imgDetail=${ImgDetail}&TourId=${TourId}&TourDetailId=${TourDetailId}`;
    // console.log(TravelPlan);
    // console.log(travelPlanString);
});

$('.ManagerTourDetail__cancel').click(function(e) {
    window.location.href = `ManagerTours.php`;
});

function layGiaTriInput() {
    var imgValues = $('#img-container').find('input').map(function() {
        return $(this).val();
    }).get();

    return imgValues;
}


</script>
