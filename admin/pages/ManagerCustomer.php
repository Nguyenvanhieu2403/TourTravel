<?php 
    require(__DIR__. '\\include\\header-Links.html');
    require_once('../../admin/models/Customer.php');
    $customers;
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search']) ) {
        $search = $_POST['search'];
        $customers = Customer::Search($search, 1, '');
    }
    else {
        $customers = Customer::GetAllWait();
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
            <div class="row m-5">
                <div class="col-md-4">
                    <form action="" method="POST">
                        <div class="ManagerCustomer__search">
                            <input type="search" placeholder="Search..." id="search" class="ManagerCustomer__search--input" name="search">
                            <button type="submit">SEARCH</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row m-5">
                <!-- <div class="col-md-6">
                    <div class="container p-0">
                        <form class="filter">
                            <div class="item">
                                <label>Search by</label>
                                <select name="searchBy" id="searchBy">
                                    <option value="fullName">FullName</option>
                                    <option value="tourName">Tour Name</option>
                                    <option value="tourType">TourType</option>
                                    <option value="dateCreate">DateCreate</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div> -->
                <div class="col-md-6 text-start">
                    <h3 class="totalRecords">Total: <span><?php echo count($customers); ?></h3>
                </div>
            </div>
            <div class="row m-5">
                <form class="col-md-12 managerCustomer__table " action="updateManagerCustomer.php" method="POST">
                    <table class="col-md-12">
                        <thead class="managerCustomer__table-title">
                            <tr>
                                <th>STT</th>
                                <th>Full Name</th>
                                <th>Tour Name</th>
                                <th>TourType</th>
                                <th>DateCreate</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count= 1; foreach ($customers as $customer): ?>
                                <tr data-customer='<?php echo json_encode($customer); ?>'>
                                    <td><?php echo $count; ?></td>
                                    <td class="data-user" data-bs-toggle="modal" data-bs-target="#exampleModal" data-customer-id="<?php echo $customer->Id; ?>" name="<?php echo $customer->Id; ?>"><?php echo $customer->FullName; ?></td>
                                    <td><?php echo $customer->TourName; ?></td>
                                    <td><?php echo $customer->TourType; ?></td>
                                    <td><?php echo $customer->DateCreate; ?></td>
                                    <td class="action">
                                        <a class="text-decoration-none" href="confirmTour.php?idCustomer=<?php echo $customer->Id; ?>" onclick="return confirm(`Confirm this customer's trip?`)">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg mx-3" viewBox="0 0 16 16">
                                                <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/>
                                            </svg>
                                        </a>
                                        <a class="text-decoration-none" href="cancelTour.php?idCustomer=<?php echo $customer->Id; ?>" onclick="return confirm('Do you want to cancel this trip ?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg mx-3" viewBox="0 0 16 16">
                                                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            <?php $count++; endforeach; ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form class="modal-content" action="updateCustomer.php" method="POST">
                    <div class="modal-header">
                        <h1 class="modal-title text-center" id="exampleModalLabel" style="margin: auto;">Tour Information</h1>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="customerId" value="<?php echo $customer->Id; ?>">
                        <div class="row">
                            <div class="fullname text-center">
                                <p class="text-start">FullName</p>
                                <input type="text" placeholder="FullName" name="FullName" value="<?php echo $customer->FullName; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="email text-center">
                                <p class="text-start">Email</p>
                                <input type="text" placeholder="Email" name="Email" value="<?php echo $customer->Email; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="phonenumber text-center">
                                <p class="text-start">PhoneNumber</p>
                                <input type="text" placeholder="PhoneNumber" name="PhoneNumber" value="<?php echo $customer->PhoneNumber; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="tour d-flex justify-content-between text-center">
                                <div class="tour__tourtype">
                                    <p class="text-start">TourType</p>
                                    <input type="text" placeholder="TourType" name="TourType" value="<?php echo $customer->TourType; ?>" readonly style="background-color: #eeeeee;">
                                </div>
                                <div class="tour__price">
                                    <p class="text-start">Price</p>
                                    <input type="text" placeholder="Price" name="Price" value="<?php echo $customer->Price; ?>" readonly style="background-color: #eeeeee;">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="person d-flex justify-content-between text-center">
                                <div class="person__adult">
                                    <p class="text-start">Adult</p>
                                    <input type="text" placeholder="Adult" name="Adult" value="<?php echo $customer->Adult; ?>">
                                </div>
                                <div class="person__child">
                                    <p class="text-start">Child</p>
                                    <input type="text" placeholder="Child" name="Child" value="<?php echo $customer->Child; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="date text-center">
                                <p class="text-start">Date</p>
                                <input type="text" placeholder="Date" name="Date" value="<?php echo date('d-m-y', strtotime($customer->DateCreate)); ?>" readonly style="background-color: #eeeeee;">
                            </div>
                        </div>
                        <div class="row">
                            <div class="description text-center">
                                <p class="text-start">Description</p>
                                <input type="text" placeholder="Description" name="Description" value="<?php echo $customer->Description; ?>" readonly style="background-color: #eeeeee;">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php require(__DIR__. '\\include\\libraryJs-Links.html')?>

    <script>
    $(document).ready(function() {
        $('.data-user').click(function() {
            var customerId = $(this).data('customer-id');
            $.ajax({
                url: 'getCustomer.php',
                type: 'POST',
                data: { customerId: customerId },
                success: function(response) {
                    var customer = JSON.parse(response);
                    FillData(customer);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });

        function FillData(customer) {
            $('#exampleModal input[name="customerId"]').val(customer.Id);
            $('#exampleModal input[name="FullName"]').val(customer.FullName);
            $('#exampleModal input[name="Email"]').val(customer.Email);
            $('#exampleModal input[name="PhoneNumber"]').val(customer.PhoneNumber);
            $('#exampleModal input[name="TourType"]').val(customer.TourType);
            $('#exampleModal input[name="Price"]').val(customer.Price);
            $('#exampleModal input[name="Adult"]').val(customer.Adult);
            $('#exampleModal input[name="Child"]').val(customer.Child);
            $('#exampleModal input[name="Date"]').val(customer.DateCreate);
            $('#exampleModal input[name="Description"]').val(customer.Description);
        }
    });
    </script>


    <script src="../../../admin/assets/js/header.js"></script> 
    <script src="../../../admin/assets/js/slideBar.js"></script>
</body>