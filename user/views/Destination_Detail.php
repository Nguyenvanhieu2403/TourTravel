<?php require('includes/header.html'); ?>
<?php
	include_once('../assets/database/ConnectToSql.php');
?>
<div class="header-destination header-destination__detail ">
    <div class="content">
        <h1 class="text-center fw-bold text-light">Destination Details</h1>
        <div class="row">
            <h2 class="text-center dirc_destination__detail">
                <a href="#" class="header-destination__home header-destination__detail__home text-light">Home</a>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-right text-danger" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z"/>
                    <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z"/>
                </svg>
                <span class="header-destination__destination header-destination__detail__destination__detail text-light">Destination detail</span>
            </h2>
        </div>
    </div>
</div>  

<?php
    if (isset($_GET['id'])) {
        // Lấy giá trị id từ tham số 'id'
        $destinationId = $_GET['id'];

        $query = "select d.City as City, dt.DepartureTime as DepartureTime, dt.Description1 as Description1, dt.Description2 as Description2, dt.ReturnTime as ReturnTime, dt.TiTle as Title, img.Image as Image from destination d join destinationdetail dt on d.Id = dt.DestinationId join images img on dt.Id = img.DestinationDetailId where img.Status = 1 and d.Id = $destinationId";
        $sql_destinationDetail = mysqli_query($con,$query); 

        $queryImg = "select img.Image as Image from  destinationdetail dt join images img on dt.Id = img.DestinationDetailId where img.Status = 2";
        $sql_destinationDetailImg = mysqli_query($con,$queryImg);

        $queryTourType = "select distinct TourType from Tour";
        $sql_tourType = mysqli_query($con,$queryTourType);
    } else {
        // Trường hợp không có tham số 'id'
        echo "Không có id được cung cấp.";
        return;
    }
?>

<?php
    if(mysqli_num_rows($sql_destinationDetail) > 0) {

?>

<div class="container desti__detail--container">
    <div class="desti__detail--content">
        <div class="row">
            <?php
                while($row_destinationDetail = mysqli_fetch_array($sql_destinationDetail)){ 
            ?>
            <div class="col-lg-8">
                <img src="<?php echo $row_destinationDetail['Image'] ?>" alt="">
                <h1 class="desti__detail--title text-dark pt-4 pb-4 fw-bold"><?php echo $row_destinationDetail['Title'] ?></h1>
                <div class="desti__detail--description">
                    <p>
                        <?php echo $row_destinationDetail['Description1'] ?>
                    </p>
                </div>
                
                <div class="row p-4">
                    <?php
                        while($row_destinationDetailImg = mysqli_fetch_array($sql_destinationDetailImg)){ 
                    ?>
                        <div class="col-6">
                            <img src="<?php echo $row_destinationDetailImg['Image'] ?>" alt="">
                        </div>
                    <?php
                        }    
                    ?>
                </div>
                
                <div class="desti__detail--description">
                    <p>
                        <?php echo $row_destinationDetail['Description2'] ?>
                    </p>
                </div>
                <h1 class="text-dark pt-4 pb-4 fw-bold">Overview</h1>
                <div class="row">
                    <table class="desti--detail__overview-table col-12">
                        <tbody>
                            <tr>
                                <th>Destination</th>
                                <td><?php echo $row_destinationDetail['City'] ?></td>
                            </tr>
                            <tr>
                                <th>Departure Time</th>
                                <td><?php echo $row_destinationDetail['DepartureTime'] ?></td>
                            </tr>
                            <tr>
                                <th>Return  Time</th>
                                <td><?php echo $row_destinationDetail['ReturnTime'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <h1 class="text-dark pt-4 pb-4 fw-bold">Map</h1>
                <div class="row">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.816814555946!2d105.73938337479642!3d21.
                        040014487392796!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135096b31fa7abb%3A0xff645782804911af!
                        2zVHLGsOG7nW5nIMSR4bqhaSBo4buNYyBDw7RuZyBuZ2jhu4cgxJDDtG5nIMOB!5e0!3m2!1svi!2s!4v1702392857182!5m2!1svi!2s" 
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
            <?php
                } 
            ?>
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
                                    while($row_tourType = mysqli_fetch_array($sql_tourType)){
                                ?>
                                <li class="desti__detail--category-check pt-2 pb-2">
                                    <label class="desti__detail--form-check-label" for="cate">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z"/>
                                            <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z"/>
                                        </svg>
                                        <?php echo $row_tourType['TourType'] ?> 
                                    </label>
                                    <input class="form-check-input" type="checkbox" id="cate" value="<?php echo $row_tourType['TourType'] ?>">
                                </li>

                                <?php
                                    }
                                ?>
                            </ul>
                        </div>
                    </aside>

                    <aside class="desti__detail--package-widget widget-tour-destination mt-30 mb-4">
                        <div class="desti__detail--widget-title">
                            <h4>New Destination</h4>
                        </div>
                        <div class="desti__detail--widget-body">
                            <div class="row">
                                <div class="col-md-4 p-2">
                                    <img src="../../../user/assets/img/destination__detail/desc-img-2.png" alt="">
                                </div>
                                <div class="col-md-4 p-2">
                                    <img src="../../../user/assets/img/destination__detail/desc-img-3.png" alt="">
                                </div>
                                <div class="col-md-4 p-2">
                                    <img src="../../../user/assets/img/destination__detail/desc-img-4.png" alt="">
                                </div>
                                <div class="col-md-4 p-2">
                                    <img src="../../../user/assets/img/destination__detail/desc-img-5.png" alt="">
                                </div>
                                <div class="col-md-4 p-2">
                                    <img src="../../../user/assets/img/destination__detail/desc-img-6.png" alt="">
                                </div>
                                <div class="col-md-4 p-2">
                                    <img src="../../../user/assets/img/destination__detail/desc-img-7.png" alt="">
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
    </div>
</div>

<?php
    } else {
        echo "<h1>Không có dữ liệu</h1>";
    }
?>
<script>
    var TourType = "";
    $(document).ready(function() {
        // Xử lý sự kiện khi checkbox được chọn/deselect
        $("input[type='checkbox']").on("change", function() {
            updateSelectedCheckboxes();
        });

        // Hàm để cập nhật danh sách các checkbox được chọn
        function updateSelectedCheckboxes() {
            // Lặp qua tất cả các checkbox và lấy giá trị của những cái được chọn
            var selectedCheckboxes = [];
            $("input[type='checkbox']:checked").each(function() {
                selectedCheckboxes.push("'"+$(this).val()+"'");
            });
            TourType = selectedCheckboxes.join(", ");
        }
    });


    $("#desti__detail--blog-sidebar-search").submit(function(event) {
        // Ngăn chặn việc gửi form đi (chặn lại hành động mặc định của form)
        event.preventDefault();

        // Lấy giá trị từ thẻ input
        var destinationValue = $("input[type='search']").val();

        // Kiểm tra xem giá trị có tồn tại không
        if (destinationValue.trim() !== "" && TourType.trim() !== "") {
            // Chuyển hướng đến trang Destination với tham số truyền vào
            window.location.href = "Destination.php?search=" + encodeURIComponent(destinationValue) + "&param=" + encodeURIComponent(TourType);
        }
        else if (destinationValue.trim() !== "") {
            // Chuyển hướng đến trang Destination với tham số truyền vào
            window.location.href = "Destination.php?search=" + encodeURIComponent(destinationValue);
        }
        else if (TourType.trim() !== "") {
            // Chuyển hướng đến trang Destination với tham số truyền vào
            window.location.href = "Destination.php?param=" + encodeURIComponent(TourType);
        }
    });
</script>


<?php require('includes/footer.html'); ?>