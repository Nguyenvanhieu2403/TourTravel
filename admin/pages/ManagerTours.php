<?php 
    require(__DIR__. '\\include\\header-Links.html');
    require_once('../../admin/models/Tour.php');
    $tours;
    if (isset($_GET['search']) && isset($_GET['tourtype'])) {
        $search = $_GET['search'];
        $tourtype = $_GET['tourtype'];
        $tours = Tour::Search($search, $tourtype,1);
    } 
    else if (isset($_GET['search'])) {
        $search = $_GET['search'];
        $tours = Tour::Search($search, null,1);
    } 
    else if (isset($_GET['tourtype'])) {
        $tourtype = $_GET['tourtype'];
        $tours = Tour::Search(null, $tourtype,1);
    }else {
        $tours = Tour::GetAll(1);
    }

    if (isset($_GET['lock'])) {
        $id = $_GET['lock'];
        $result = Tour::CancelTour($id, 0);
        if ($result) {
            echo "<script>alert('Lock tour successfully!')</script>";
        } else {
            echo "<script>alert('Lock tour failed!')</script>";
        }
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
            <div class="row m-5 ManagerAccount__search--row">
                <div class="col-md-4">
                    <form action="javascript:void(0);" method="post" id="managerAccount--search__Text">
                        <div class="ManagerAccount__search">
                            <input type="search" placeholder="Search..." class="ManagerAccount__search--input">
                            <button type="submit">SEARCH</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row m-5">
                <div class="col-md-6">
                    <div class="container">
                        <form class="filter">
                            <div class="item">
                                <label>Tour Type</label>
                                <select name="TourType" id="TourType">
                                    <option value="">All</option>
                                    <?php foreach ($tourType as $type): ?>
                                        <option value="<?php echo $type->TourType; ?>"><?php echo $type->TourType; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 text-end">
                    <h3 class="totalRecords">Total: <span><?php echo count($tours); ?></span></h3>
                </div>
            </div>
            <div class="row m-5">
                <div class="col-md-12 managerAccount__table ">
                    <table class="col-md-12">
                        <thead class="managerAccount__table-title">
                            <tr>
                                <th>STT</th>
                                <th>ID</th>
                                <th>Tour Name</th>
                                <th>Tour Type</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Create By</th>
                                <th>CreateDate</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count= 1; foreach ($tours as $tour): ?>
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $tour->Id; ?></td>
                                    <td><?php echo $tour->TitleTour; ?></td>
                                    <td><?php echo $tour->TourType; ?></td>
                                    <td><?php echo $tour->Price; ?></td>
                                    <td><?php echo $tour->Status==0?"Lock":"Open"; ?></td>
                                    <td><?php echo $tour->CreateBy; ?></td>
                                    <td>
                                        <?php 
                                        if($tour->CreateDate != null)  {
                                            $dateTime = new DateTime($tour->CreateDate);
                                            $formattedDate = $dateTime->format('d-m-Y');
                                            echo $formattedDate;
                                        }
                                        ?>
                                    </td>
                                    <td class="managerTour--icon__delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" id="<?php echo $tour->Id; ?>" fill="currentColor" class="bi bi-arrow-repeat managerTour_update" viewBox="0 0 16 16">
                                            <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41m-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9"/>
                                            <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5 5 0 0 0 8 3M3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9z"/>
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" id="<?php echo $tour->Id; ?>" width="20" height="20" fill="currentColor" class="bi bi-trash3-fill managerTour_remove" viewBox="0 0 16 16">
                                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                                        </svg>
                                    </td>
                                </tr>
                            <?php $count++; endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php require(__DIR__. '\\include\\libraryJs-Links.html')?>
    <script src="../../../admin/assets/js/header.js"></script> 
    <script src="../../../admin/assets/js/slideBar.js"></script>

    <script>
        $(document).ready(function () {
            var TourType = ""; 
            $("#TourType").change(function () {
                TourType = $(this).val();
                console.log(TourType);
            });
            $("#managerAccount--search__Text").submit(function (event) {
                event.preventDefault();
                var search = $("input[type='search']").val();
                if (search.trim() !== "" && TourType.trim() !== "") {
                    window.location.href = "ManagerTours.php?search=" + encodeURIComponent(search) + "&tourtype=" + encodeURIComponent(TourType);
                } else if (search.trim() !== "") {
                    window.location.href = "ManagerTours.php?search=" + encodeURIComponent(search);
                } else if (TourType.trim() !== "") {
                    window.location.href = "ManagerTours.php?tourtype=" + encodeURIComponent(TourType);
                } else {
                    window.location.href = "ManagerTours.php";
                }
            });

            $(".managerTour_remove").click(function () {
                var id = $(this).attr("id");
                if (confirm("Are you sure you want to stop running this tour business?")) {
                    window.location.href = "ManagerTours.php?lock=" + encodeURIComponent(id);
                }
            });

            $(".managerTour_update").click(function () {
                var id = $(this).attr("id");
                window.location.href = "UpdateTourDetail.php?id=" + encodeURIComponent(id);
            });
        });

    </script>
</body>
