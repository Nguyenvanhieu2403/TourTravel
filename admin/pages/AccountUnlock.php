<?php 
    require(__DIR__. '\\include\\header-Links.html');
    require_once('../../admin/models/Account.php');
    $IdInfor = 0;
    if(isset($_COOKIE['Id'])){
        $Id = $_COOKIE['Id'];
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $accounts = Account::SearchAccountLock($search);
        }
        else if(isset($_GET['lock'])) {
            $idLock = $_GET['lock'];
            $accounts = Account::LockAccount($idLock, 5, $Id);
            echo "<script>alert('Khóa tài khoản thành công')</script>";
            echo "<script>window.location.href = 'AccountUnLock.php';</script>";
        }
        else if (isset($_GET['Id']) && isset($_GET['permission'])) {
            $id = $_GET['Id'];
            $permission = $_GET['permission'];
            if($permission == 0){
                $permission = "Staff";
            }
            else if($permission == 1){
                $permission = "Manager";
            }
            else if($permission == 2){
                $permission = "Admin";
            }
            $accounts = Account::GrantPermissions($id, $permission, $Id);
            echo "<script>alert('Cấp quyền thành công')</script>";
            echo "<script>window.location.href = 'AccountUnLock.php';</script>";
        }
        else {
            $accounts = Account::GetAllAccountLock(4);
        }
    }
    else{
        header("Location: login.php");
    }
    $Infors = Account::GetInforAccount(1);
?>  
<body class = "body">
    <div class="row m-0 position-relative">
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
                                <th>Date Create</th>
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
                                        <div class="row accountUnLock__permisstion">
                                            <div class="col-md-6">
                                                <svg fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                                width="30" height="30" viewBox="0 0 358.397 358.397"class="text-success grant__permissions" id="<?php echo $account->Id; ?>"
                                                xml:space="preserve">
                                                    <g>
                                                        <g>
                                                            <path d="M334.6,186.963c-21.191,1.305-49.056,22.493-75.92,34.646c-32.929,14.917-84.208,2.924-84.213,2.924
                                                                c7.889-3.695,40.04-11.37,46.52-14.21c34.406-15.124,31.506-46.689,15.115-46.423c-21.662,0.344-34.365,5.679-77.576,11.552
                                                                c-32.746,4.47-71.467,2.843-90.043,9.935C42.252,195.385,0,262.779,0,262.779l65.322,63.286c0,0,40.428-39.819,60.092-39.819
                                                                c44.82,0,46.621-0.597,88.26-2.843c17.691-0.967,21.396-1.673,31.5-5.105c53.957-18.242,111.881-66.818,112.947-72.646
                                                                C360.607,192.1,345.811,186.285,334.6,186.963z"/>
                                                            <path d="M145.498,130.335c20.209,0,36.666-16.316,36.91-36.464h83.426v23.9c0,2.577,2.105,4.681,4.703,4.681h17.127
                                                                c2.603,0,4.703-2.104,4.703-4.681v-10.406h22.723v10.406c0,2.577,2.103,4.681,4.703,4.681h17.164c2.59,0,4.693-2.104,4.693-4.681
                                                                V73.458c0-2.598-2.104-4.701-4.693-4.701l-154.549,0.033c-0.244-20.145-16.701-36.458-36.91-36.458
                                                                c-20.395,0-36.953,16.578-36.953,36.937v24.132C108.545,113.758,125.103,130.335,145.498,130.335z M130.179,69.269
                                                                c0-8.445,6.855-15.314,15.318-15.314c8.43,0,15.316,6.869,15.316,15.314v24.132c0,8.446-6.887,15.312-15.316,15.312
                                                                c-8.463,0-15.318-6.866-15.318-15.312V69.269z"/>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="col-md-6">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" id="<?php echo $account->Id; ?>" class="bi bi-lock-fill lock_account text-danger" viewBox="0 0 16 16">
                                                    <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2"/>
                                                </svg>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="position-absolute h-100 AccountUnlock--form__infor-main">
            <div class="confirm-employee-form col-md-6 position-absolute top-50 start-50 translate-middle text-center bg-white AccountUnlock--form__infor">
                <div class="close-confirm position-absolute top-0 end-0">
                    <i class="fa-solid fa-xmark AccountUnlock__close--formInfor"></i>
                </div>
                <div class="row AccountUnlock__infor position-relative">
                <?php 
                                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['IdInfor'])) {
                                    // Lấy giá trị 'IdInfor' từ POST data
                                    $IdInfor = $_POST['IdInfor'];
                                    $Infors = Account::GetInforAccount($IdInfor);
                            ?>
                    <div class="col-md-4">
                        <div class="AccountUnlock__img--infor">
                            <img src=" <?php echo (($Infors->Sex)==1?"../../../admin/assets/img/User_img/user-avatar-male.png":"../../../admin/assets/img/User_img/user-avatar-female.png")  ; ?>" alt="">
                        </div>
                    </div>
                    <div class="col-md-8 text-start">
                        <div class="row">
                            
                            <p>Mã nhân viên: <?php echo $Infors->Id ; ?></p>
                            <p>Họ và tên: <?php echo $Infors->FullName  ; ?> </p>
                            <div class="row">
                                <div class="col-md-5">
                                    <p>Ngày sinh: 
                                        <?php 
                                            $dateTime = new DateTime($Infors->DOB);
                                            $newFormat = $dateTime->format('d/m/Y');
                                            echo   $newFormat; 
                                        ?> 
                                    </p>
                                </div>  
                                <div class="col-md-7">
                                    <p>Giới tính: <?php echo (($Infors->Sex)==1?"Nam":"Nữ")  ; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <p>Đơn vị: <?php echo $Infors->Department  ; ?>  </p>
                                </div>
                                <div class="col-md-7">
                                    <p>Chức vụ: <?php echo $Infors->Position  ; ?> </p>
                                </div>
                            </div>
                            <p>Email: <?php echo $Infors->Email  ; ?> </p>
                            <p>Số điện thoại: <?php echo "0".$Infors->PhoneNumber  ; ?> </p>
                            <div class="row">
                                <div class="col-md-3">
                                    Quyền: 
                                </div>
                                <div class="col-md-9">
                                    <!-- <select name="permission" id="permission">
                                        <option value=""><?php echo $Infors->Position  ; ?></option>
                                        <option value="0">Nhân viên</option>
                                        <option value="1">Quản lý</option>
                                        <option value="2">Quản trị viên</option>
                                    </select> -->
                                    <select name="permission" id="permission">
                                        <?php if ($Infors->Position == "Staff"): ?>
                                            <option value="0" selected><?php echo $Infors->Position  ; ?></option>
                                        <?php else: ?>
                                            <option value="0">Staff</option>
                                        <?php endif; ?>

                                        <?php if ($Infors->Position == "Manager"): ?>
                                            <option value="1" selected><?php echo $Infors->Position  ; ?></option>
                                        <?php else: ?>
                                            <option value="1">Manager</option>
                                        <?php endif; ?>

                                        <?php if ($Infors->Position == "Admin"): ?>
                                            <option value="2" selected><?php echo $Infors->Position  ; ?></option>
                                        <?php else: ?>
                                            <option value="2">Admin</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            

                            <div class="row justify-content-evenly m-5 AccountUnlock--formInfor_btn">
                                <button class="btn col-md-3 btn-danger AccountUnlock--formInfor_btnCancel">Cancel</button>
                                <button class="btn col-md-3 btn-success AccountUnlock--formInfor_btnSave" id="<?php echo $Infors->Id ; ?>">Save</button>
                            </div>
                        </div>
                    </div>
                    <?php
                        // }
                    }
                    ?>
                </div> 
            </div>
            <div class="overlay"></div>   
        </div>                    
        <!-- <div class="overlay">
            
        </div> -->
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
                    window.location.href = "AccountUnLock.php?search=" + encodeURIComponent(search);
                } else {
                    window.location.href = "AccountUnLock.php";
                }
            });
            $(document).ready(function () {
                $(".lock_account").click(function () {
                    var Id = $(this).attr("id");
                    if(confirm("Bạn có chắc muốn khóa khóa tài khoản này không?")) {
                        window.location.href = "AccountUnLock.php?lock=" + Id;
                    }
                    else {
                        return false;
                    }
                });
            });
            $(document).ready(function () {
                $(".close-confirm").click(function () {
                    $(".AccountUnlock--form__infor-main").css("display", "none");
                });

                $(".AccountUnlock--formInfor_btnCancel").click(function () {
                    $(".AccountUnlock--form__infor-main").css("display", "none");
                });
            });

            $(document).ready(function () {
                $(".grant__permissions").click(function (event) {
                    event.preventDefault();
                    var Id = $(this).attr("id");
                    $.post({
                        type: 'POST',
                        url: 'AccountUnlock.php',
                        data: { 'IdInfor': Id },
                        success: function (response) {
                            $(".body").html(response);
                            $(".AccountUnlock--form__infor-main").css("display", "block");
                        }
                    });
                    return false;
                });
            });
            $(document).ready(function () {
                $(".AccountUnlock--formInfor_btnSave").click(function () {
                    var selectedPermission = $("#permission").val();
                    if(selectedPermission == 0){
                        selectedPermission = "Staff";
                    }
                    else if(selectedPermission == 1){
                        selectedPermission = "Manager";
                    }
                    else if(selectedPermission == 2){
                        selectedPermission = "Admin";
                    }
                    if(confirm("Bạn có chắc muốn cấp quyền " + selectedPermission + " cho tài khoản này không?")) {
                        var Id = $(this).attr("id");
                        
                        // Kiểm tra xem giá trị đã được chọn hay không
                        if (selectedPermission) {
                            // Thêm giá trị vào URL và chuyển hướng trang
                            window.location.href = "AccountUnLock.php?Id=" + Id +"&permission=" + selectedPermission;

                            // Ẩn các phần tử sau khi nhấp "Save"
                            $(".confirm-employee-form").css("display", "none");
                            $(".overlay").css("display", "none");
                        } else {
                            // Xử lý khi không có giá trị nào được chọn (nếu cần)
                            alert("Please select a permission before saving.");
                        }
                    }
                    else {
                        return false;
                    }
                });
            });
        });
        
        
    </script>
</body>
