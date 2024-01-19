<?php
  include_once('../assets/database/ConnectToSql.php');

  if (isset($_POST['customerId'])) {
    // Lấy ID của người dùng từ dữ liệu POST
    $customerId = $_POST['customerId'];

    // Thực hiện truy vấn để lấy thông tin chi tiết của người dùng từ cơ sở dữ liệu
    $conn = DBConnection::Connect();

    // Escape các giá trị để ngăn chặn SQL injection
    $customerId = $conn->real_escape_string($customerId);

    $sql = "SELECT
    u.*,
    t.TourType,
    t.Price,
    td.Name as TourName,
    td.DescriptionInfor as Description,
    b.CreateDate as DateCreate
    FROM
      books b
    JOIN
      users u ON b.IdUser = u.Id
    JOIN
      tourdetail td ON b.IdTour = td.TourId
    JOIN
      tour t ON td.TourId = t.Id where u.id = $customerId";
    $result = $conn->query($sql);

    if ($result) {
        // Chuyển kết quả truy vấn thành mảng
        $customerDetails = $result->fetch_assoc();
        // Trả về thông tin người dùng dưới dạng JSON
        echo json_encode($customerDetails);
    } else {
        echo "Error in query: " . $conn->error;
    }

    $conn->close();
  } else {
      // Trả về thông báo lỗi nếu không có dữ liệu POST
      echo "Invalid request.";
  }  
?>