<?php require(__DIR__ . '\\include\\header-Links.html')?>
<style>
    .header-row {
        background-color: #3498db; /* Màu nền xanh dương */
        color: #ffffff; /* Màu chữ trắng */
    }
</style>
<body>
    <div class="test row m-0">
        <?php require('include/slideBar.html')?>
        <div class=" col-md-10 ">
            <div class="row">
                <div class="col-md-12">
                    <?php require('include/header.html')?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="container-confirm-employee p-3 mt-4">
                        <h2>Nhân viên chưa được phân công phòng ban</h2>
                        <form method="post" id="employeeForm">
                            <table class="table table-hover ">
                                <thead>
                                    <tr class="table-danger">
                                        <th class="text-center align-middle">Mã nhân viên</th>
                                        <th>Họ tên</th>
                                        <th>Số điện thoại</th>
                                        <th>Email</th>
                                        <th class="text-center align-middle">Hành động</th>
                                    </tr>
                                </thead>
                                
                                <?php    
                                    include("../models/employeeModel.php");
                                    $listEmployees = Employee::getEmployeesWithoutDept();
                                    foreach ($listEmployees as $item) {
                                ?>
                                    <tbody>
                                        <tr class="employee-row check table-secondary">
                                            <td class="idEmployee text-center align-middle"><?php echo $item->get_id() ?></td>
                                            <td class="nameEmployee"><?php echo $item->get_name() ?></td>
                                            <td><?php echo "0". $item->get_phoneNumber() ?></td>
                                            <td><?php echo $item->get_email() ?></td>
                                            <td class="text-center align-middle">
                                                <a href="">
                                                    <i class="fa-solid fa-circle-plus"></i>
                                                </a>
                                            </td> 
                                        </tr>
                                    </tbody>
                                <?php        
                                    }
                                ?>    
                            </table>
                            <input type="hidden" name="employeeId" value="">
                           
                            <div class="detail-employee-form col-md-6 position-absolute top-50 start-50 translate-middle">
                                <?php 
                                    $idEmployee = isset($_REQUEST['employeeId']) ? $_REQUEST['employeeId'] : '';
                                    if(!empty($idEmployee)){
                                        $profileEmployee = Employee::getEmployee($idEmployee);
                                    echo '
                                    <div class="detail-employee">
                                        <div class="row border bg-white container-detail-employee">
                                            <div class="close-profile position-absolute end-0">
                                                <i class="fa-solid fa-xmark"></i>
                                            </div>
                                            <div class="col-md-4 p-0">
                                                <div class=" mb-4 p-0">
                                                    <div class="card-body text-center">
                                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                                                        class="rounded-circle img-fluid" style="width: 120px;">
                                                        <h5 class="my-3">'. $profileEmployee->get_name() . '</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class=" mb-4">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <p class="mb-0">ID</p>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <p class="text-muted mb-0">'. $profileEmployee->get_id() .'</p>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <p class="mb-0">Full Name</p>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <p class="text-muted mb-0">'. $profileEmployee->get_name() .'</p>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <p class="mb-0">Date of birth</p>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <p class="text-muted mb-0">'. $profileEmployee->get_dob() .'</p>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <p class="mb-0">Gender</p>
                                                            </div>
                                                            <div class="col-sm-9">';
                                                            if ($profileEmployee->get_sex() == 1) {
                                                                echo '<p class="text-muted mb-0">Male</p>';
                                                            } else {
                                                                echo '<p class="text-muted mb-0">Female</p>';
                                                            }
                                                        echo '</div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <p class="mb-0">Department</p>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <p class="text-muted mb-0">DEV</p>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <p class="mb-0">Position</p>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="" id="">
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <p class="mb-0">Email</p>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <p class="text-muted mb-0">'. $profileEmployee->get_email() .'</p>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <p class="mb-0">Phone</p>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <p class="text-muted mb-0">'. $profileEmployee->get_phoneNumber() .'</p>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <p class="mb-0">Address</p>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <p class="text-muted mb-0">'. $profileEmployee->get_address() .'</p>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <p class="mb-0">Status</p>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <select name="" id="">
                                                                    <option value="0">Is active</option>
                                                                    <option value="0">Stop working</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                ';
                                    }
                                    ;?>
                            </div>
                            <div class="overlay"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require('include/libraryJs-Links.html')?>
    <script src="../../admin/assets/js/header.js"></script>
    <script src="../../admin/assets/js/slideBar.js"></script> 
</body>
<script>
    $(document).ready(function(){
        $('.detail-employee').hide();
        if (localStorage.getItem('overlayVisible') === 'true') {
            $('.overlay').show();
        } else {
            $('.overlay').hide();
        }
        
        $('.employee-row').click(function(){
            var employeeId = $(this).find('.idEmployee').text();
            // Set the value of the hidden input in the form
            $('#employeeForm input[name="employeeId"]').val(employeeId);
            localStorage.setItem('overlayVisible', 'true');
            $('#employeeForm').submit(); 
        })
        $('.close-profile').click(function () {
            $('.detail-employee').hide();
            $('.overlay').hide();
            localStorage.setItem('overlayVisible', 'false');
        });
        
        $('.detail-employee').show();
    })
</script>
