<?php require(__DIR__ . '\\include\\header-Links.html')?>
<?php include("../models/employeeModel.php");?>

<?php 
    session_start();
?>
<!-- Search function -->
<?php                                    
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['searchEmployeeButton'])){
        $nameEmployee = $_POST['searchEmployee'];
        $listEmployees = Employee::searchEmployeeWithDept($nameEmployee);
    }
    else{
        $idDepartment = $_SESSION['idDepartment'];
        $listEmployees = Employee::getEmployeeInDepartment($idDepartment);
    }
?>

<!-- Delete function -->
<?php 

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
            <div class="row">
                <div class="col-md-12">
                    <div class="container-confirm-employee p-3 mt-4 ">
                        <!-- <h2>Nhân viên chưa được phân công phòng ban</h2> -->
                        <div class="d-flex justify-content-between">
                            <div class="confirm-employee-search my-4">
                                <form action="" method="post" class="mt-5">
                                    <div class="blog-detail-search-group d-flex">
                                        <input type="search" name="searchEmployee" placeholder="Name employee">
                                        <button type="submit" name="searchEmployeeButton">SEARCH</button>
                                    </div>
                                </form>
                            </div>
                            <div class="confirm-employee-total">
                                <span>Total employee: <span style="font-weight: bold;"><?php $totalEm =  Employee::totalEmployee($listEmployees); echo $totalEm; ?></span></span>
                            </div>
                        </div>

                        <form method="post" id="employeeForm" class="table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
                            <table class="table table-hover table-bordered table-dark ">
                                <thead>
                                    <tr >
                                        <th scope="col" class="text-center align-middle">Mã nhân viên</th>
                                        <th scope="col" class="text-center align-middle">Họ tên</th>
                                        <th scope="col" class="text-center align-middle">Số điện thoại</th>
                                        <th scope="col" class="text-center align-middle">Email</th>
                                        <th scope="col" class="text-center align-middle" >Hành động</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                        <?php    
                                            foreach ($listEmployees as $item) {
                                        ?>
                                   
                                        <tr class="employee-row check table-secondary">
                                            <td class="idEmployee text-center align-middle"><?php echo $item->get_id() ?></td>
                                            <td class="nameEmployee"><?php echo $item->get_name() ?></td>
                                            <td><?php echo "0". $item->get_phoneNumber() ?></td>
                                            <td><?php echo $item->get_email() ?></td>
                                            <td class="text-center align-middle">
                                                <a href="#" class="delete-employee-trigger" title="Delete employee from your department">
                                                    <i class="fa-solid fa-circle-xmark confirm-employee-icon"></i>
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
                                        $profileEmployee = Employee::getEmployeeById($idEmployee);   
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
                                                                <p class="text-muted mb-0">'. $profileEmployee->get_department() .'</p>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <p class="mb-0">Position</p>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                '. (!empty($profileEmployee->get_position()) ? '<input type="text" name="position" id="position" value="' . $profileEmployee->get_position() . '">' : '<input type="text" name="position" id="position">') .'
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
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="updateEmployeeId" value="' . $idEmployee . '">
                                            <div class="d-flex justify-content-end group-btn-delete-em">
                                                <button type="submit" name="btnUpdateEmployeeButton" id="btnUpdateEmployeeButton" class="me-3 ">Update</button>
                                                <button class="close-confirm me-3" >Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                ';
                                    }
                                    ;?>
                            </div>
                            
                            <!-- Confirm update form -->
                            <div class="update-employee-form col-md-6 position-absolute top-40 start-50 translate-middle text-center bg-white p-5">
                                <div class="close-confirm position-absolute top-0 end-0 m-3">
                                    <i class="fa-solid fa-xmark"></i>
                                </div>
                                <?php 
                                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btnUpdateEmployeeButton'])){
                                    $idEmployee = isset($_REQUEST['employeeId']) ? $_REQUEST['employeeId'] : '';
                                    $idDepartment = $_SESSION['idDepartment'];
                                    $position = isset($_POST['position']) ? $_POST['position'] : '';
                                    
                                    if(!empty($idEmployee)){
                                        $fullName = Employee::getEmployeeById($idEmployee)->get_name();

                                        echo '<span>Confirm update for '.$fullName.'</span>';
                                        echo '<br><div class="group-btn-confirm d-flex justify-content-center mt-5 ">
                                                <form method="post"> 
                                                    <input type="hidden" name="updateEmployeeId" value="' . $idEmployee . '">
                                                    <input type="hidden" name="position" value="' . $position . '">
                                                    <button type="submit" name="updateEmployeeButton" id="confirmUpdateEmployeeButton">OK</button>
                                                </form>
                                                <button class="close-confirm">Cancel</button>
                                            </div>';
                                    }
                                }

                                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['updateEmployeeButton'])){
                                    $idEmployee = isset($_POST['updateEmployeeId']) ? $_POST['updateEmployeeId'] : '';
                                    $position = isset($_POST['position']) ? $_POST['position'] : '';
                                    $updateProfileEmployee = Employee::updateEmployee($idEmployee, $position);
                                }
                                ?> 
                            </div>


                            <!-- Delete form -->
                            <div class="delete-employee-form col-md-6 position-absolute top-40 start-50 translate-middle text-center bg-white p-5">
                                <div class="close-confirm position-absolute top-0 end-0 m-3">
                                    <i class="fa-solid fa-xmark"></i>
                                </div>
                                <?php 
                                    $idEmployee = isset($_REQUEST['employeeId']) ? $_REQUEST['employeeId'] : '';
                                    $idDepartment = $_SESSION['idDepartment'];
                                    
                                    if(!empty($idEmployee)){
                                        $profileEmployee = Employee::getEmployeeById($idEmployee);
                                        $fullName = $profileEmployee->get_name();
                                        echo ' <span>Do you want to delete '.$fullName.' from your department ?</span>';
                                        echo '<br><div class="group-btn-confirm d-flex justify-content-center mt-5">
                                                <form method="post"> 
                                                    <input type="hidden" name="deleteEmployeeId" value="' . $idEmployee . '">
                                                    <button type="submit" name="deleteEmployeeButton" id="deleteEmployeeButton" class="close-confirm">OK</button>
                                                </form>
                                                <button class="close-confirm">Cancel</button>
                                            </div>';
                                    }

                                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['deleteEmployeeButton'])){
                                        $idEmployee = $_POST['deleteEmployeeId'];
                                        $deleteEmployee = Employee::deleteEmployee($idEmployee);
                                        if($deleteEmployee !== false){
                                            echo "Xóa nhân viên thành công";
                                            echo '<script>location.reload();</script>';
                                        }
                                        else{
                                            echo "Xóa nhân viên thất bại";
                                        }
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

        if (localStorage.getItem('displayDeleteEmployee') === 'true') {
            $('.delete-employee-form').show();
        } else {
            $('.delete-employee-form').hide();
        }

        if (localStorage.getItem('displayUpdateEmployee') === 'true') {
            $('.update-employee-form').show();
        } else {
            $('.update-employee-form').hide();
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
        // Display delete form employee
        $('.delete-employee-trigger').click(function(e) {
            e.stopPropagation(); 
            var employeeId = $(this).closest('.employee-row').find('.idEmployee').text();
            $('#employeeForm input[name="employeeId"]').val(employeeId);
            localStorage.setItem('overlayVisible', 'true');
            localStorage.setItem('displayDeleteEmployee', 'true');
            $('#employeeForm').submit(); 
        });
        $('.close-confirm').click(function () {
            $('.delete-employee-form').hide();
            $('.overlay').hide();
            localStorage.setItem('overlayVisible', 'false');
            localStorage.setItem('displayDeleteEmployee', 'false');
        }); 
        // Display update employee form
        $('#btnUpdateEmployeeButton').click(function(e) {
            e.stopPropagation(); 
            
            var employeeId = $('#employeeForm input[name="updateEmployeeId"]').val();
            $('#employeeForm input[name="employeeId"]').val(employeeId);
            localStorage.setItem('displayUpdateEmployee', 'true');
            localStorage.setItem('displayEmployeeForm', 'false');
            $('#employeeForm').submit(); 
        });
        $('.close-confirm').click(function () {
            $('.update-employee-form').hide();
            $('.overlay').hide();
            localStorage.setItem('overlayVisible', 'false');
            localStorage.setItem('displayUpdateEmployee', 'false');
        }); 
        $('#confirmUpdateEmployeeButton').click(function(e){
            localStorage.setItem('overlayVisible', 'false');
            localStorage.setItem('displayUpdateEmployee', 'false');
        })
    })
</script>
