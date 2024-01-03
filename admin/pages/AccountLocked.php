<?php 
    require(__DIR__. '\\include\\header-Links.html');
    require_once('../../admin/models/Account.php');
    if(isset($_COOKIE['Id'])){
        $Id = $_COOKIE['Id'];
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $accounts = Account::SearchAccountLock($search);
        }
        else if(isset($_GET['lock'])) {
            $idLock = $_GET['lock'];
            $accounts = Account::LockAccount($idLock, 4, $Id);
            echo "<script>alert('Mở khóa tài khoản thành công')</script>";
            echo "<script>window.location.href = 'AccountLocked.php';</script>";
        }
        else {
            $accounts = Account::GetAllAccountLock(5);
        }
    }
    else{
        header("Location: login.php");
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
                <div class="col-md-12 text-end">
                    <h3 class="totalRecords">Total: <span><?php echo is_array($accounts) ? count($accounts) : 0; ?></span></h3>
                </div>
            </div>
            <div class="row m-5">
                <div class="col-md-12 managerAccount__table">
                    <table class="col-md-12">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Status</th>
                                <th>Person locked</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($accounts as $account): ?>
                                <tr>
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
                                    <td>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" id="<?php echo $account->Id; ?>" class="bi bi-unlock-fill text-success lock_account" viewBox="0 0 16 16">
                                        <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2"/>
                                        </svg>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
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
            $("#managerAccount--search__Text").submit(function (event) {
                event.preventDefault();
                var search = $("input[type='search']").val();
                 if (search.trim() !== "") {
                    window.location.href = "AccountLocked.php?search=" + encodeURIComponent(search);
                } else {
                    window.location.href = "AccountLocked.php";
                }
            });
            $(document).ready(function () {
                $(".lock_account").click(function () {
                    var Id = $(this).attr("id");
                    if(confirm("Bạn có chắc muốn mở khóa tài khoản này không?")) {
                        window.location.href = "AccountLocked.php?lock=" + Id;
                    }
                    else {
                        return false;
                    }
                });
            });
        });
        
    </script>
</body>
