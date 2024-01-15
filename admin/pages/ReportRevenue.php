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
								 
								if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['postQuarter'])) {
									$quarter = $_POST['postQuarter'];
									$sqlTotalRevenue = "SELECT COALESCE(SUM(tour.Price), 0) AS TotalRevenue
														FROM books
														LEFT JOIN tour ON books.IdTour = tour.Id
														WHERE YEAR(books.CreateDate) = YEAR(CURDATE())
														AND QUARTER(books.CreateDate) = $quarter";
								
									$resultTotalRevenue = $conn->query($sqlTotalRevenue);
								
									if ($resultTotalRevenue && $resultTotalRevenue->num_rows > 0) {
										$rowTotalRevenue = $resultTotalRevenue->fetch_assoc();
										$totalRevenue = $rowTotalRevenue['TotalRevenue'];
										?>
										<?php echo 'Quý ' .$quarter .': '. number_format($totalRevenue) . " $"; ?>
										<?php
									} else {
										?>
										<span>Không có dữ liệu</span>
										<?php
									}		
									$conn->close();
								}
								else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['postMonth'])) {
									$month = $_POST['postMonth'];
									$sqlTotalRevenue = "SELECT COALESCE(SUM(tour.Price), 0) AS TotalRevenue
														FROM books
														LEFT JOIN tour ON books.IdTour = tour.Id
														WHERE MONTH(books.CreateDate) = $month";
								
									$resultTotalRevenue = $conn->query($sqlTotalRevenue);
								
									if ($resultTotalRevenue && $resultTotalRevenue->num_rows > 0) {
										$rowTotalRevenue = $resultTotalRevenue->fetch_assoc();
										$totalRevenue = $rowTotalRevenue['TotalRevenue'];
										?>
										<?php echo 'Tháng ' .$month .': '. number_format($totalRevenue) . " $"; ?>
										<?php
									} else {
										?>
										<span>Không có dữ liệu</span>
										<?php
									}		
									$conn->close();
								}
								else{
									$sqlTotalRevenue = "SELECT COALESCE(SUM(tour.Price), 0) AS TotalRevenue
														FROM books
														LEFT JOIN tour ON books.IdTour = tour.Id
														WHERE books.CreateDate >= DATE_SUB(CURDATE(), INTERVAL 12 MONTH)";
								
									$resultTotalRevenue = $conn->query($sqlTotalRevenue);
								
									if ($resultTotalRevenue && $resultTotalRevenue->num_rows > 0) {
										$rowTotalRevenue = $resultTotalRevenue->fetch_assoc();
										$totalRevenue = $rowTotalRevenue['TotalRevenue'];
										?>
										<?php echo  '12 tháng: '. number_format($totalRevenue) . " $"; ?>
										<?php
									} else {
										?>
										<span>Không có dữ liệu</span>
										<?php
									}		
									$conn->close();
								}
							?>
						</span>
					</div>
                </div>
				<div class="col-md-4 ">
                    <div class="block-report block-1 d-flex flex-column justify-content-center align-items-center">
						<p> <?php 
									if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['postQuarter'])){
										echo 'Tháng trong quý ' . $_POST['postQuarter'] . ' có thu nhập cao nhất';
									}
									else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['postMonth'])){
										echo 'Ngày trong tháng ' . $_POST['postMonth'] . ' có thu nhập cao nhất';
									}
									else{
										echo 'Tháng có thu nhập cao nhất';
									}
								?></p>
						<span>
							<?php
								$conn = DbConnection::Connect();
								if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['postQuarter'])) {
									$quarter = $_POST['postQuarter'];
									$sqlTotalRevenue = "SELECT MONTH(books.CreateDate) AS Month, COALESCE(SUM(tour.Price), 0) AS MonthlyRevenue
														FROM books
														LEFT JOIN tour ON books.IdTour = tour.Id
														WHERE YEAR(books.CreateDate) = YEAR(CURDATE())
														AND QUARTER(books.CreateDate) = $quarter
														GROUP BY Month
														ORDER BY MonthlyRevenue DESC
														LIMIT 1";
								
									$resultTotalRevenue = $conn->query($sqlTotalRevenue);
								
									if ($resultTotalRevenue && $resultTotalRevenue->num_rows > 0) {
										$rowTotalRevenue = $resultTotalRevenue->fetch_assoc();
										$totalRevenue = $rowTotalRevenue['MonthlyRevenue'];
										$hightestMonth = $rowTotalRevenue['Month'];
										?>
										<?php echo 'Tháng ' .$hightestMonth .': '. number_format($totalRevenue) . " $"; ?>
										<?php
									} else {
										?>
										<span>Không có dữ liệu</span>
										<?php
									}		
									$conn->close();
								}
								else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['postMonth'])){
									$month = $_POST['postMonth'];
											$sqlTotalRevenue = "SELECT DAY(books.CreateDate) AS MaxRevenueDay, COALESCE(SUM(tour.Price), 0) AS TotalRevenue
											FROM books
											LEFT JOIN tour ON books.IdTour = tour.Id
											WHERE MONTH(books.CreateDate) = $month
											GROUP BY MaxRevenueDay
											ORDER BY TotalRevenue DESC
											LIMIT 1";
								
									$resultTotalRevenue = $conn->query($sqlTotalRevenue);
								
									if ($resultTotalRevenue && $resultTotalRevenue->num_rows > 0) {
										$rowTotalRevenue = $resultTotalRevenue->fetch_assoc();
										$totalRevenue = $rowTotalRevenue['TotalRevenue'];
										$maxRevenueDay = $rowTotalRevenue['MaxRevenueDay']
										?>
										<?php echo 'Ngày ' .$maxRevenueDay .': '. number_format($totalRevenue) . " $"; ?>
										<?php
									} else {
										?>
										<span>Không có dữ liệu</span>
										<?php
									}		
									$conn->close();
								}
								else{
									$sqlHighestRevenue = "SELECT MONTH(books.CreateDate) AS Month, COALESCE(SUM(tour.Price), 0) AS TotalRevenue
														FROM books
														LEFT JOIN tour ON books.IdTour = tour.Id
														WHERE books.CreateDate >= DATE_SUB(CURDATE(), INTERVAL 12 MONTH)
														GROUP BY MONTH(books.CreateDate)
														HAVING TotalRevenue = (
															SELECT COALESCE(SUM(tour.Price), 0) AS MaxRevenue
															FROM books
															LEFT JOIN tour ON books.IdTour = tour.Id
															WHERE books.CreateDate >= DATE_SUB(CURDATE(), INTERVAL 12 MONTH)
															GROUP BY MONTH(books.CreateDate)
															ORDER BY MaxRevenue DESC
															LIMIT 1
														)
														ORDER BY TotalRevenue DESC;";
								
									$resultHighestRevenue = $conn->query($sqlHighestRevenue);
								
									if ($resultHighestRevenue && $resultHighestRevenue->num_rows > 0) {
										$rowHigestRevenue = $resultHighestRevenue->fetch_assoc();
										$monthHighestRevenue = $rowHigestRevenue['Month'];
										$totalRevenue = $rowHigestRevenue['TotalRevenue'];
										?>
										<?php  echo "Tháng $monthHighestRevenue: " . number_format($totalRevenue) . " $<br>";?>
										
										<?php
									} else {
										?>
										<span>Không có dữ liệu</span>
										<?php
									}		
									$conn->close();
								}
							?>
						</span>
					</div>
                </div>
				<div class="col-md-4 ">
                    <div class="block-report block-1 d-flex flex-column justify-content-center align-items-center me-2">
						<p> <?php 
									if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['postQuarter'])){
										echo 'Tháng trong quý ' . $_POST['postQuarter'] . ' có thu nhập thấp nhất';
									}
									else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['postMonth'])){
										echo 'Ngày trong tháng ' . $_POST['postMonth'] . ' có thu nhập thấp nhất';
									}
									else{
										echo 'Tháng có thu nhập thấp nhất';
									}
								?></p>
						<span>
						<?php
							$conn = DbConnection::Connect();
							if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['postQuarter'])) {
								$quarter = $_POST['postQuarter'];
								$sqlLowestRevenue = "SELECT MONTH(books.CreateDate) AS Month, COALESCE(SUM(tour.Price), 0) AS MonthlyRevenue
													FROM books
													LEFT JOIN tour ON books.IdTour = tour.Id
													WHERE YEAR(books.CreateDate) = YEAR(CURDATE())
													AND QUARTER(books.CreateDate) = $quarter
													GROUP BY Month
													ORDER BY MonthlyRevenue ASC
													LIMIT 1";
							
								$resultLowestRevenue = $conn->query($sqlLowestRevenue);
							
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
							else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['postMonth'])){
								$month = $_POST['postMonth'];
								$sqlTotalRevenue = "SELECT DAY(books.CreateDate) AS MinRevenueDay, COALESCE(SUM(tour.Price), 0) AS TotalRevenue
													FROM books
													LEFT JOIN tour ON books.IdTour = tour.Id
													WHERE MONTH(books.CreateDate) = $month
													GROUP BY MinRevenueDay
													ORDER BY TotalRevenue ASC
													LIMIT 1";
								
								$resultTotalRevenue = $conn->query($sqlTotalRevenue);
								
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
								$sqlLowestRevenue = "SELECT MONTH(books.CreateDate) AS Month, COALESCE(SUM(tour.Price), 0) AS TotalRevenue
													FROM books
													LEFT JOIN tour ON books.IdTour = tour.Id
													WHERE books.CreateDate >= DATE_SUB(CURDATE(), INTERVAL 12 MONTH)
													GROUP BY MONTH(books.CreateDate)
													HAVING TotalRevenue = (
														SELECT COALESCE(SUM(tour.Price), 0) AS MinRevenue
														FROM books
														LEFT JOIN tour ON books.IdTour = tour.Id
														WHERE books.CreateDate >= DATE_SUB(CURDATE(), INTERVAL 12 MONTH)
														GROUP BY MONTH(books.CreateDate)
														ORDER BY MinRevenue ASC
														LIMIT 1
													)
													ORDER BY TotalRevenue ASC;";

								$resultLowestRevenue = $conn->query($sqlLowestRevenue);

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
								<option value="">
									<?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['postMonth'])){
											echo 'Tháng '.$_POST['postMonth'];
										}
										else{
											echo 'Chọn tháng';
										}
									?>
								</option>
								<option value="1">Tháng 1</option>
								<option value="2">Tháng 2</option>
								<option value="3">Tháng 3</option>
								<option value="4">Tháng 4</option>
								<option value="5">Tháng 5</option>
								<option value="6">Tháng 6</option>
								<option value="7">Tháng 7</option>
								<option value="8">Tháng 8</option>
								<option value="9">Tháng 9</option>
								<option value="10">Tháng 10</option>
								<option value="11">Tháng 11</option>
								<option value="12">Tháng 12</option>
							</select>
							<input type="hidden" name="postMonth" id="postMonth" value = "">
						</form>
					</div>
					<div class="report-quarter">
						<span>Báo cáo theo quý</span>
						<form id="quarterForm" method="post" class="mt-3">
							<select name="selectedQuarterForm" id="selectedQuarterForm" onchange="submitFormQuarter(this)">
								<option value="">
									<?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['postQuarter'])){
											echo 'Quý '.$_POST['postQuarter'];
										}
										else{
											echo 'Chọn Quý';
										}
									?>
								</option>
								<option value="1">Quý 1</option>
								<option value="2">Quý 2</option>
								<option value="3">Quý 3</option>
								<option value="4">Quý 4</option>
							</select>
							<input type="hidden" name="postQuarter" id="postQuarter" value = "">
						</form>
					</div>
					
				</div>
				<div class="col-md-4">
					
				</div>
			</div>
			<div class="row">
                <div class="col-md-12 report-revenue">
					<?php
						$conn = DbConnection::Connect();
						$sqlRevenue = "";
						if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['postMonth'])){
							$monthNumeric = $_POST['postMonth'];
    						$monthName = date("F", strtotime("2022-$monthNumeric-01"));
							echo "<h1 class='text-center mb-5 title-report'>Report in $monthName</h1>";
							$month = $_POST['postMonth'];
							$revenueInMonth = $_POST['postMonth'];
											$sqlRevenue = "SELECT DAY(books.CreateDate) AS DayOfMonth, COALESCE(SUM(tour.Price), 0) AS DailyRevenue
											FROM books
											LEFT JOIN tour ON books.IdTour = tour.Id
											WHERE YEAR(books.CreateDate) = YEAR(CURDATE())
											AND MONTH(books.CreateDate) = $month
											GROUP BY DAY(books.CreateDate)
											ORDER BY DayOfMonth;
									";
							$resultRevenue = $conn->query($sqlRevenue);
							$dataPoints = array();
							while ($rowRevenue = $resultRevenue->fetch_assoc()) {
								$dataPoints[] = array("y" => $rowRevenue["DailyRevenue"], "label" => $rowRevenue["DayOfMonth"]);
							}
							
						}
						else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['postQuarter'])){
							$quater = $_POST['postQuarter'];
							// echo "<h1 class='text-center mb-5 title-report'>Report in Quarter $quarter</h1>";
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
											ORDER BY DayOfMonth
									";

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
									ORDER BY Month;
									";
							$resultRevenue = $conn->query($sqlRevenue);
							$dataPoints = array();
							while ($rowRevenue = $resultRevenue->fetch_assoc()) {
								$dataPoints[] = array("y" => $rowRevenue["TotalRevenue"], "label" => $rowRevenue["Month"]);
							}
						}
						
					?>
					<div id="chartContainer" style="height: 370px; width: 100%;"></div>
                </div>
            </div>
			
        </div>
    </div>


    <?php require(__DIR__. '\\include\\libraryJs-Links.html')?>
    <script src="../../../admin/assets/js/header.js"></script> 
    <script src="../../../admin/assets/js/slideBar.js"></script>
	<!--  -->
	<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
	<script>
		window.onload = function() {
		
		var chart = new CanvasJS.Chart("chartContainer", {
			animationEnabled: true,
			theme: "light2",
			title:{
				text: ""
			},
			axisY: {
				title: ""
			},
			data: [{
				type: "column",
				yValueFormatString: "#,##0.## $",
				dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
				}]
			});
			chart.render();
		}
		// Handle not from template
		function submitFormMonth(selectElement) {
			var selectedMonthValue = selectElement.value;
			document.getElementById("postMonth").value = selectedMonthValue;
			// Access the form and submit it
			var form = document.getElementById("monthForm");
			form.submit();
		}

		function submitFormQuarter(selectElement) {
			var selectedQuaterValue = selectElement.value;
			document.getElementById("postQuarter").value = selectedQuaterValue;
			// Access the form and submit it
			var form = document.getElementById("quarterForm");
			form.submit();
		}

	</script>
</body>
