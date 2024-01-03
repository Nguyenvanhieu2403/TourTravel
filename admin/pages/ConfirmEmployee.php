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
                                                <a href="#" class="confirm-employee-trigger">
                                                    <i class="fa-solid fa-circle-plus confirm-employee-icon"></i>
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
                   
                            <div class="confirm-employee-form col-md-6 position-absolute top-40 start-50 translate-middle text-center bg-white">
                                <div class="close-confirm position-absolute top-0 end-0">
                                    <i class="fa-solid fa-xmark"></i>
                                </div>
                                <?php 
                                    $idEmployee = isset($_REQUEST['employeeId']) ? $_REQUEST['employeeId'] : '';
                                    if(!empty($idEmployee)){
                                        $profileEmployee = Employee::getEmployee($idEmployee);
                                        $fullName = $profileEmployee->get_name();
                                        echo ' <span>Do you want '.$fullName.' become your employee ?</span>';
                                    }
                                ?> 
                               
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
        if (localStorage.getItem('overlayVisible') === 'true') {
            $('.overlay').show();
        } else {
            $('.overlay').hide();
        }

        if (localStorage.getItem('displayEmployeeForm') === 'true') {
            $('.detail-employee').show();
        } else {
            $('.detail-employee').hide();
        }

        if (localStorage.getItem('displayConfirmEmployee') === 'true') {
            $('.confirm-employee-form').show();
        } else {
            $('.confirm-employee-form').hide();
        }

        // Display detail information employee
        $('.employee-row').click(function(){
            var employeeId = $(this).find('.idEmployee').text();
            $('#employeeForm input[name="employeeId"]').val(employeeId);
            localStorage.setItem('overlayVisible', 'true');
            localStorage.setItem('displayEmployeeForm', 'true');
            $('#employeeForm').submit(); 
        })
        $('.close-profile').click(function () {
            $('.detail-employee').hide();
            $('.overlay').hide();
            localStorage.setItem('overlayVisible', 'false');
            localStorage.setItem('displayEmployeeForm', 'false');
        }); 
        
        // Display confirm form employee
        $('.confirm-employee-trigger').click(function(e) {
            e.stopPropagation(); 
            var employeeId = $(this).closest('.employee-row').find('.idEmployee').text();
            $('#employeeForm input[name="employeeId"]').val(employeeId);
            localStorage.setItem('overlayVisible', 'true');
            localStorage.setItem('displayConfirmEmployee', 'true');
            $('#employeeForm').submit(); 
        });

        $('.close-confirm').click(function () {
            $('.confirm-employee-form').hide();
            $('.overlay').hide();
            localStorage.setItem('overlayVisible', 'false');
            localStorage.setItem('displayConfirmEmployee', 'false');
        }); 
        
    })
</script>
