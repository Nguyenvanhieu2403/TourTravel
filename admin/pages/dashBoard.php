<?php require(__DIR__. '\\include\\header-Links.html')?>
<?php include("../models/connection.php");?>
<?php 
    session_start();
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
                <div class="col-md-4 ">
                    <div class="block-report block-1 d-flex flex-column justify-content-center align-items-center ms-2">
						<p>Tổng thu nhập trong</p>
						<span>
							<?php
								$conn = DbConnection::Connect();
								if (isset($_POST['postQuarter'])) {
									$quarter = $_POST['postQuarter'];
									$stmt = $conn->prepare("call totalRevenueInQuater(?,@totalRevenue)");
									$stmt->bind_param("i",$quarter);
									$stmt-> execute();
									$stmt->close();
									$resultTotalRevenue = $conn->query("select @totalRevenue as TotalRevenue");
									if ($resultTotalRevenue && $resultTotalRevenue->num_rows > 0) {
										$rowTotalRevenue = $resultTotalRevenue->fetch_assoc();
										$totalRevenue = $rowTotalRevenue['TotalRevenue'];
										echo 'Quý ' .$quarter .': '. number_format($totalRevenue) . " $"; 	
									} else {
										echo "<span>Không có dữ liệu</span>";
									}		
									$conn->close();
								}
								else if (isset($_POST['postMonth'])) {
									$month = $_POST['postMonth'];
									$stmt = $conn->prepare("call totalRevenueInMonth(?,@totalRevenue)");
									$stmt->bind_param("i",$month);
									$stmt->execute();
									$stmt->close();
									$resultTotalRevenue = $conn->query("select @totalRevenue as TotalRevenue");
									if ($resultTotalRevenue && $resultTotalRevenue->num_rows > 0) {
										$rowTotalRevenue = $resultTotalRevenue->fetch_assoc();
										$totalRevenue = $rowTotalRevenue['TotalRevenue'];
										echo 'Tháng ' .$month .': '. number_format($totalRevenue) . " $"; 
									} else {
										echo "<span>Không có dữ liệu</span>";
									}		
									$conn->close();
								}
								else{
									$stmt =  $conn->prepare("call totalRevenueInYear(@totalRevenue)");
									$stmt-> execute();
									$stmt->close();
									$resultTotalRevenue = $conn->query("select @totalRevenue as TotalRevenue");
									if($resultTotalRevenue) {
										$rowTotalRevenue = $resultTotalRevenue->fetch_assoc();
										$totalRevenue = $rowTotalRevenue['TotalRevenue'];
										echo  '12 tháng: '. number_format($totalRevenue) . " $";
									}else {
										echo "<span>Không có dữ liệu</span>";
									}		
									$conn->close();
								}
							?>
						</span>
					</div>
                </div>
				<div class="col-md-4 ">
                    <div class="block-report block-1 d-flex flex-column justify-content-center align-items-center">
						<p> 
							<?php 
								if (isset($_POST['postQuarter'])){
									echo 'Tháng trong quý ' . $_POST['postQuarter'] . ' có thu nhập cao nhất';
								}else if (isset($_POST['postMonth'])){
									echo 'Ngày trong tháng ' . $_POST['postMonth'] . ' có thu nhập cao nhất';
								}else{
									echo 'Tháng có thu nhập cao nhất';
								}
							?>
						</p>
						<span>
							<?php
								$conn = DbConnection::Connect();
								if (isset($_POST['postQuarter'])) {
									$quarter = $_POST['postQuarter'];
									$stmt = $conn->prepare("call GetMaxRevenueMonthOfQuarter(?,@Month,@revenue)");
									$stmt->bind_param("i",$quarter);
									$stmt -> execute();
									$stmt -> close();
									$resultTotalRevenue = $conn->query("select @Month as Month, @revenue as MonthlyRevenue;");
									if ($resultTotalRevenue && $resultTotalRevenue->num_rows > 0) {
										$rowTotalRevenue = $resultTotalRevenue->fetch_assoc();
										$totalRevenue = $rowTotalRevenue['MonthlyRevenue'];
										$hightestMonth = $rowTotalRevenue['Month'];
										echo 'Tháng ' .$hightestMonth .': '. number_format($totalRevenue) . " $"; 
									} else {
										echo "<span>Không có dữ liệu</span>";
									}		
									$conn->close();
								}
								else if (isset($_POST['postMonth'])){
									$month = $_POST['postMonth'];
									$stmt =  $conn->prepare("call GetMaxRevenueDay(?,@MaxRevenueDay,@TotalRevenue)");
									$stmt ->bind_param("i",$month);
									$stmt->execute();
									$stmt->close();
									$resultTotalRevenue = $conn->query("select @MaxRevenueDay as MaxRevenueDay, @TotalRevenue as TotalRevenue;");
									if ($resultTotalRevenue) {
										$rowTotalRevenue = $resultTotalRevenue->fetch_assoc();
										$totalRevenue = $rowTotalRevenue['TotalRevenue'];
										$maxRevenueDay = $rowTotalRevenue['MaxRevenueDay'];
										echo 'Ngày ' .$maxRevenueDay .': '. number_format($totalRevenue) . " $";
									} else {
										echo "<span>Không có dữ liệu</span>";
									}		
									$conn->close();
								}
								else{
									$stmt = $conn->prepare( "call GetMaxRevenueMonthOfYear(@Month,@revenue)");
									$stmt->execute();
									$stmt->close();
									$resultHighestRevenue = $conn->query("select @Month as Month, @revenue as TotalRevenue;");
								
									if ($resultHighestRevenue && $resultHighestRevenue->num_rows > 0) {
										$rowHigestRevenue = $resultHighestRevenue->fetch_assoc();
										$monthHighestRevenue = $rowHigestRevenue['Month'];
										$totalRevenue = $rowHigestRevenue['TotalRevenue'];
										echo "Tháng $monthHighestRevenue: " . number_format($totalRevenue) . " $<br>";
									} else {
										echo "<span>Không có dữ liệu</span>";
									}		
									$conn->close();
								}
							?>
						</span>
					</div>
                </div>
				<div class="col-md-4 ">
                    <div class="block-report block-1 d-flex flex-column justify-content-center align-items-center me-2">
						<p> 
						<?php 
								if (isset($_POST['postQuarter'])){
									echo 'Tháng trong quý ' . $_POST['postQuarter'] . ' có thu nhập thấp nhất';
								}
								else if (isset($_POST['postMonth'])){
									echo 'Ngày trong tháng ' . $_POST['postMonth'] . ' có thu nhập thấp nhất';
								}
								else{
									echo 'Tháng có thu nhập thấp nhất';
								}
							?>
						</p>
						<span>
							<?php
								$conn = DbConnection::Connect();
								if (isset($_POST['postQuarter'])) {
									$quarter = $_POST['postQuarter'];
									$stmt = $conn->prepare("call GetMinRevenueMonthOfQuarter(?,@Month,@revenue)");
									$stmt->bind_param("i",$quarter);
									$stmt->execute();
									$stmt->close();
									$resultLowestRevenue = $conn->query("select @Month as Month, @revenue as MonthlyRevenue;");
								
									if ($resultLowestRevenue && $resultLowestRevenue->num_rows > 0) {
										$rowLowestRevenue = $resultLowestRevenue->fetch_assoc();
										$lowestMonth = $rowLowestRevenue['Month'];
										$totalRevenueLowest = $rowLowestRevenue['MonthlyRevenue'];
										echo "Tháng $lowestMonth: " . number_format($totalRevenueLowest) . " $";
									} else {
										echo "Không có dữ liệu";
									}        
									$conn->close();
								}
								else if (isset($_POST['postMonth'])){
									$month = $_POST['postMonth'];
									$stmt =$conn->prepare("call GetMinRevenueDayInMonth(?,@day, @revenue)");
									$stmt->bind_param("i",$month);
									$stmt->execute();
									$stmt->close();
									$resultTotalRevenue = $conn->query("select @day as MinRevenueDay, @revenue as TotalRevenue");
									if ($resultTotalRevenue && $resultTotalRevenue->num_rows > 0) {
										$rowTotalRevenue = $resultTotalRevenue->fetch_assoc();
										$totalRevenue = $rowTotalRevenue['TotalRevenue'];
										$minRevenueDay = $rowTotalRevenue['MinRevenueDay'];
										echo 'Ngày ' . $minRevenueDay . ': ' . number_format($totalRevenue) . " $";
									} else {
										echo '<span>Không có dữ liệu</span>';
									}
									$conn->close();
								}
								else{
									$stmt = $conn->prepare("call GetMinRevenueMonthOfYear(@month,@revenue)"); 
									$stmt -> execute();
									$stmt -> close();
									$resultLowestRevenue = $conn->query("select @month as Month, @revenue as TotalRevenue");
									if ($resultLowestRevenue && $resultLowestRevenue->num_rows > 0) {
										while ($rowLowestRevenue = $resultLowestRevenue->fetch_assoc()) {
											$monthLowestRevenue = $rowLowestRevenue['Month'];
											$totalRevenueLowest = $rowLowestRevenue['TotalRevenue'];
											echo "Tháng $monthLowestRevenue: " . number_format($totalRevenueLowest) . " $<br>";
										}
									} else {
										echo "Không có dữ liệu";
									}
									$conn->close();
								}
							?>
						</span>
					</div>
                </div>
            </div>
			<div class="row">
				<div class="col-md-8 d-flex report-form ms-2">
					<div class="report-month">
						<span >Báo cáo theo tháng</span>
						<form id="monthForm" method="post" class="mt-3">
							<select name="selectedMonth" id="selectedMonth" onchange="submitFormMonth(this)">
								<option value="">Chọn Tháng</option>
								<?php 
									$selectedMonth = isset($_POST['postMonth']) ? $_POST['postMonth'] : '';
									for ($i = 1; $i <= 12; $i++): 
								?>
									<option value="<?= $i ?>" <?= $selectedMonth == $i ? 'selected' : '' ?>>Tháng <?= $i ?></option>
								<?php endfor; ?>
							</select>
							<input type="hidden" name="postMonth" id="postMonth" value = "<?= $selectedMonth ?>">
						</form>
					</div>
					<div class="report-quarter">
						<span>Báo cáo theo quý</span>
						<form id="quarterForm" method="post" class="mt-3">
							<select name="selectedQuarterForm" id="selectedQuarterForm" onchange="submitFormQuarter(this)">
								<option value="">Chọn Quý</option>
								<?php 
									$selectedQuarter = isset($_POST['postQuarter']) ? $_POST['postQuarter'] : '';
									for ($i = 1; $i <= 4; $i++): 
								?>
									<option value="<?= $i ?>" <?= $selectedQuarter == $i ? 'selected' : '' ?>>Quý <?= $i ?></option>
								<?php endfor; ?>
							</select>
							<input type="hidden" name="postQuarter" id="postQuarter" value="<?= $selectedQuarter ?>">
						</form>
					</div>
				</div>
			</div>
			<div class="row">
                <div class="col-md-12 report-revenue">
                    <?php
						$conn = DbConnection::Connect();
						$sqlRevenue = "";
						if (isset($_POST['postMonth'])){
							$monthNumeric = $_POST['postMonth'];
    						$monthName = date("F", strtotime("2022-$monthNumeric-01"));
							echo "<h1 class='text-center mb-5 title-report'>Report in $monthName</h1>";
							$month = $_POST['postMonth'];
							$revenueInMonth = $_POST['postMonth'];
							$sqlRevenue = "	SELECT DAY(books.CreateDate) AS DayOfMonth, COALESCE(SUM(tour.Price), 0) AS DailyRevenue
											FROM books
											LEFT JOIN tour ON books.IdTour = tour.Id
											WHERE YEAR(books.CreateDate) = YEAR(CURDATE())
											AND MONTH(books.CreateDate) = $month
											GROUP BY DAY(books.CreateDate)
											ORDER BY DayOfMonth;";
							$resultRevenue = $conn->query($sqlRevenue);
							$dataPoints = array();
							while ($rowRevenue = $resultRevenue->fetch_assoc()) {
								$dataPoints[] = array("y" => $rowRevenue["DailyRevenue"], "label" => $rowRevenue["DayOfMonth"]);
							}
						}
						else if (isset($_POST['postQuarter'])){
							$quater = $_POST['postQuarter'];
							switch ($quarter) {
								case 1:
									$quarterName = "the First Quarter";
									break;
								case 2:
									$quarterName = "the Second Quarter";
									break;
								case 3:
									$quarterName = "the Third Quarter";
									break;
								case 4:
									$quarterName = "the Fourth Quarter";
									break;
								default:
									$quarterName = "Invalid Quarter";
									break;
							}
							echo "<h1 class='text-center mb-5 title-report'>Report in $quarterName</h1>";
							$revenueInquater = $_POST['postQuarter'];
							$sqlRevenue = "SELECT DAY(books.CreateDate) AS DayOfMonth, COALESCE(SUM(tour.Price), 0) AS DailyRevenue
											FROM books
											LEFT JOIN tour ON books.IdTour = tour.Id
											WHERE YEAR(books.CreateDate) = YEAR(CURDATE())
											AND (
												(MONTH(books.CreateDate) BETWEEN 1 AND 3 AND $revenueInquater = 1)
												OR (MONTH(books.CreateDate) BETWEEN 4 AND 6 AND $revenueInquater = 2)
												OR (MONTH(books.CreateDate) BETWEEN 7 AND 9 AND $revenueInquater = 3)
												OR (MONTH(books.CreateDate) BETWEEN 10 AND 12 AND $revenueInquater = 4)
											)
											GROUP BY DAY(books.CreateDate)
											ORDER BY DayOfMonth";
							$resultRevenue = $conn->query($sqlRevenue);
							$dataPoints = array();
							while ($rowRevenue = $resultRevenue->fetch_assoc()) {
								$dataPoints[] = array("y" => $rowRevenue["DailyRevenue"], "label" => $rowRevenue["DayOfMonth"]);
							}
						}
						else{
							$currentYear = date('Y');
							echo "<h1 class='text-center mb-5 title-report'>Report in $currentYear</h1>";
							$sqlRevenue = "SELECT MONTH(books.CreateDate) AS Month, COALESCE(SUM(tour.Price), 0) AS TotalRevenue
									FROM books
									LEFT JOIN tour ON books.IdTour = tour.Id
									WHERE YEAR(books.CreateDate) = YEAR(CURDATE())
									GROUP BY MONTH(books.CreateDate)
									ORDER BY Month;";
							$resultRevenue = $conn->query($sqlRevenue);
							$dataPoints = array();
							while ($rowRevenue = $resultRevenue->fetch_assoc()) {
								$dataPoints[] = array("y" => $rowRevenue["TotalRevenue"], "label" => $rowRevenue["Month"]);
							}
						}
					?>
                    <div id="chartContainer" style="height: 470px; width: 100%;"></div>
                </div>
            </div>
        </div>
    </div>
    <?php require(__DIR__. '\\include\\libraryJs-Links.html')?>
    <script src="../../../admin/assets/js/header.js"></script> 
    <script src="../../../admin/assets/js/slideBar.js"></script>
	<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
	<script>
		window.onload = function() {
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            title:{
                text: ""
            },
            axisY: {
                title: "",
                includeZero: true,
                prefix: "",
                suffix:  " $"
            },
            data: [{
                type: "bar",
                yValueFormatString: "#,##0 $",
                indexLabel: "{y}",
                indexLabelPlacement: "inside",
                indexLabelFontWeight: "bolder",
                indexLabelFontColor: "white",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();
        }
		// Handle not from template
		function submitFormMonth(selectElement) {
			var selectedMonthValue = selectElement.value;
			if (selectedMonthValue === "") {
				return;
			}
			document.getElementById("postMonth").value = selectedMonthValue;
			var form = document.getElementById("monthForm");
			form.submit();
		}
		function submitFormQuarter(selectElement) {
			var selectedQuaterValue = selectElement.value;
			if (selectedQuaterValue === "") {
				return;
			}
			document.getElementById("postQuarter").value = selectedQuaterValue;
			var form = document.getElementById("quarterForm");
			form.submit();
		}
	</script>
</body>
