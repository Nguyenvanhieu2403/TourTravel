<?php 
    require(__DIR__. '\\include\\header-Links.html');
    require_once('../../admin/models/Account.php');
    $accounts;
    if (isset($_GET['search']) && isset($_GET['position'])) {
        $search = $_GET['search'];
        $position = $_GET['position'];
        $accounts = Account::Search($position, $search);
    } 
    else if (isset($_GET['search'])) {
        $search = $_GET['search'];
        $accounts = Account::Search(null, $search);
    } 
    else if (isset($_GET['position'])) {
        $position = $_GET['position'];
        $accounts = Account::Search($position, null);
    }else {
        $accounts = Account::GetAll();
    }
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
                                <label>Position</label>
                                <select name="Position" id="positionSelect">
                                    <option value="All">All</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Manager">Manager</option>
                                    <option value="Staff">Staff</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 text-end">
                    <h3 class="totalRecords">Total: <span><?php echo count($accounts); ?></span></h3>
                </div>
            </div>
            <div class="row m-5">
                <div class="col-md-12 managerAccount__table">
                    <table class="col-md-12">
                        <thead class="managerAccount__table-title">
                            <tr>
                                <th>STT</th>
                                <th>ID</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Status</th>
                                <th>Person locked</th>
                                <th>Date locked</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count= 1; foreach ($accounts as $account): ?>
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $account->Id; ?></td>
                                    <td><?php echo $account->FullName; ?></td>
                                    <td><?php echo $account->Email; ?></td>
                                    <td><?php echo "0".$account->PhoneNumber; ?></td>
                                    <td>
                                        <?php 
                                            // Status = 4: Open
                                            // Status = 5: Locked
                                            if($account->Status == 0){
                                                echo "Employee";
                                            }
                                            else if($account->Status == 1){
                                                echo "Account has not been approved";
                                            }
                                            else if($account->Status == 2){
                                                echo "Account has been approved";
                                            }
                                            else if($account->Status == 3){
                                                echo "Supper admin";
                                            }
                                            else if($account->Status == 4){
                                                echo "Open";
                                            }
                                            else if($account->Status == 5){
                                                echo "Locked";
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $account->ModifyBy; ?></td>
                                    <td><?php echo $account->ModifyDate; ?></td>
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
            var postionSearch = ""; 
            $("#positionSelect").change(function () {
                postionSearch = $(this).val();
                console.log(postionSearch);
            });
            $("#managerAccount--search__Text").submit(function (event) {
                event.preventDefault();
                var search = $("input[type='search']").val();
                if (search.trim() !== "" && postionSearch.trim() !== "") {
                    window.location.href = "ManagerAccount.php?search=" + encodeURIComponent(search) + "&position=" + encodeURIComponent(postionSearch);
                } else if (search.trim() !== "") {
                    window.location.href = "ManagerAccount.php?search=" + encodeURIComponent(search);
                } else if (postionSearch.trim() !== "") {
                    window.location.href = "ManagerAccount.php?position=" + encodeURIComponent(postionSearch);
                } else {
                    window.location.href = "ManagerAccount.php";
                }
            });
        });

    </script>
</body>
