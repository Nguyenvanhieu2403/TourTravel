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
                                        <svg xmlns="http://www.w3.org/2000/svg" id="<?php echo $tour->Id; ?>" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
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

            $(".managerTour--icon__delete svg").click(function () {
                var id = $(this).attr("id");
                if (confirm("Are you sure you want to stop running this tour business?")) {
                    window.location.href = "ManagerTours.php?lock=" + encodeURIComponent(id);
                }
            });
        });

    </script>
</body>
