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
						<p>Tổng số tour trong 12 tháng</p>
						<span>
							<?php 
								$conn = DbConnection::Connect();
								$sqlTotalTours = "SELECT COUNT(IdTour) AS TotalTours
									FROM books
									WHERE YEAR(CreateDate) = YEAR(CURDATE())";
								$resultTotalTours = $conn->query($sqlTotalTours);
								if ($resultTotalTours->num_rows > 0) {
									$rowTotalTours = $resultTotalTours->fetch_assoc();
									$totalTours = $rowTotalTours["TotalTours"];
								} else {
									$totalTours = 0;
								}
								echo $totalTours;
							?>
						</span>
					</div>
                </div>
				<div class="col-md-4 ">
                    <div class="block-report block-1 d-flex flex-column justify-content-center align-items-center">
						<p>Những tháng có số lượng tour cao nhất</p>
						<span>
							<?php 
								$conn = DbConnection::Connect();
								$sqlMaxMonths = "SELECT MONTH(CreateDate) AS MaxMonth, COUNT(IdTour) AS ToursBooked
								FROM books
								WHERE YEAR(CreateDate) = YEAR(CURDATE())
								GROUP BY MONTH(CreateDate)
								HAVING COUNT(IdTour) = (
									SELECT COUNT(IdTour)
									FROM books
									WHERE YEAR(CreateDate) = YEAR(CURDATE())
									GROUP BY MONTH(CreateDate)
									ORDER BY COUNT(IdTour) DESC
									LIMIT 1
								)
								ORDER BY MaxMonth;";
								$resultMaxMonths = $conn->query($sqlMaxMonths);

								if ($resultMaxMonths->num_rows > 0) {
									$maxMonths = array();
									while ($rowMaxMonth = $resultMaxMonths->fetch_assoc()) {
										$maxMonths[] = $rowMaxMonth["MaxMonth"];
									}
									echo implode(", ", $maxMonths);
								} else {
									echo "Không có dữ liệu";
								}
							?>
						</span>
					</div>
                </div>
				<div class="col-md-4 ">
                    <div class="block-report block-1 d-flex flex-column justify-content-center align-items-center me-2">
						<p>Những tháng có số lượng tour thấp nhất</p>
						<span>
							<?php 
								$conn = DbConnection::Connect();
								$sqlMinMonths = "SELECT MONTH(CreateDate) AS MinMonth, COUNT(IdTour) AS ToursBooked
												FROM books
												WHERE YEAR(CreateDate) = YEAR(CURDATE())
												GROUP BY MONTH(CreateDate)
												HAVING COUNT(IdTour) = (
													SELECT COUNT(IdTour)
													FROM books
													WHERE YEAR(CreateDate) = YEAR(CURDATE())
													GROUP BY MONTH(CreateDate)
													ORDER BY COUNT(IdTour) ASC
													LIMIT 1
												)
												ORDER BY MinMonth;";

								$resultMinMonths = $conn->query($sqlMinMonths);

								if ($resultMinMonths->num_rows > 0) {
									$minMonths = array();
									while ($rowMinMonth = $resultMinMonths->fetch_assoc()) {
										$minMonths[] = $rowMinMonth["MinMonth"];
									}
									echo implode(", ", $minMonths);
								} else {
									echo "Không có dữ liệu";
								}

								// Đóng kết nối cơ sở dữ liệu
								$conn->close();
							?>
						</span>
					</div>
                </div>
				<!-- <div class="col-md-4">
                    <div class="block-report block-2"></div>
                </div>
				<div class="col-md-4">
                    <div class="block-report block-3"></div>
                </div> -->
            </div>
			<div class="row">
                <div class="col-md-12 report-chart">
					<?php
						$conn = DbConnection::Connect();
						$sql = "SELECT MONTH(CreateDate) AS Month, COUNT(IdTour) AS ToursBooked
								FROM books
								WHERE YEAR(CreateDate) = YEAR(CURDATE())
								GROUP BY MONTH(CreateDate)
								ORDER BY MONTH(CreateDate);";
						$result = $conn->query($sql);
						$dataPoints = array();
						while ($row = $result->fetch_assoc()) {
                            $dataPoints[] = array("label" => $row["Month"], "y" => $row["ToursBooked"]);
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
		window.onload = function () {
		
		var chart = new CanvasJS.Chart("chartContainer", {
			animationEnabled: true,
			//theme: "light2",
			title:{
				text: "Report booking tour in " + +  new Date().getFullYear()
			},
			axisX:{
				crosshair: {
					enabled: true,
					snapToDataPoint: true
				}
			},
			axisY:{
				title: "",
				includeZero: true,
				crosshair: {
					enabled: true,
					snapToDataPoint: true
				}
			},
			toolTip:{
				enabled: false
			},
			data: [{
				type: "area",
				dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
			}]
		});
		chart.render();
		
		}
	</script>
</body>
