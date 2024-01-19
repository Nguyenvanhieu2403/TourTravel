<?php
require_once('../assets/database/ConnectToSql.php');

require_once('TourDetail.php');

require_once('TravelPlan.php');

require_once('Image.php');

class Tour {
    public $Id;
    public $TitleTour;
    public $Price;
    public $Day;
    public $Night;
    public $City;
    public $TourType;
    public $Image;
    public $Status;
    public $CreateBy;
    public $CreateDate;
    public $ModifyBy;
    public $ModifyDate;

    public function __construct( $Id ,$titleTour, $price, $day, $night, $city, $tourType, $image, $status, $createBy, $createDate, $modifyBy, $modifyDate) {
        $this->Id = $Id;
        $this->TitleTour = $titleTour;
        $this->Price = $price;
        $this->Day = $day;
        $this->Night = $night;
        $this->City = $city;
        $this->TourType = $tourType;
        $this->Image = $image;
        $this->Status = $status;
        $this->CreateBy = $createBy;
        $this->CreateDate = $createDate;
        $this->ModifyBy = $modifyBy;
        $this->ModifyDate = $modifyDate;
    }

    public static function GetAll($status) {
        $dsTours = array();
        $conn = DBConnection::Connect();

        $sql = "SELECT t.Id, t.Title as TitleTour, t.Price, t.Day, t.Night, t.City, t.TourType, t.Status, e.FullName as CreateBy, t.CreateDate from tour t left join employees e on t.CreateBy = e.Id where t.Status = $status";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $dsTours[] = new Tour(
                $row["Id"],
                $row["TitleTour"],
                $row["Price"],
                $row["Day"],
                $row["Night"],
                $row["City"],
                $row["TourType"],
                null,
                $row["Status"],
                $row["CreateBy"],
                $row["CreateDate"],
                null,
                null
            );
        }
        $conn->close();
        return $dsTours;
    }

    public static function Search($name, $tourType, $status) {
        $dsTours = array();
        $conn = DBConnection::Connect();
        $sql = "SELECT t.Id, t.Title as TitleTour, t.Price, t.Day, t.Night, t.City, t.TourType, t.Status, e.FullName as CreateBy, t.CreateDate from tour t left join employees e on t.CreateBy = e.Id where t.Status = $status ";
        if ($name != null && $tourType != null) {
            $sql .= " and t.Title LIKE N'%" . $name . "%' and t.TourType = '$tourType'";
        }
        else if ($name != null && $tourType == null) {
            $sql .= " and t.Title LIKE N'%" . $name . "%'";
        }
        else if ($tourType != null && $name == null) {
            $sql .= " and t.TourType = '$tourType'";
        }
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $dsTours[] = new Tour(
                $row["Id"],
                $row["TitleTour"],
                $row["Price"],
                $row["Day"],
                $row["Night"],
                $row["City"],
                $row["TourType"],
                null,
                $row["Status"],
                $row["CreateBy"],
                $row["CreateDate"],
                null,
                null
            );
        }
        $conn->close();
        return $dsTours;
    }

    public static function GetAllTourType() {
        $dsTourType = array();
        $conn = DBConnection::Connect();

        $sql = "SELECT distinct TourType FROM tour where TourType is not null";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $dsTourType[] = new Tour(
                null,
                null,
                null,
                null,
                null,
                null,
                $row["TourType"],
                null,
                null,
                null,
                null,
                null,
                null
            );
        }
        $conn->close();
        return $dsTourType;
    }

    public static function GetTourById($Id) {
        $dsTours = array();
        $conn = DBConnection::Connect();
        $sql = "SELECT distinct t.Id, t.Title as TitleTour, t.Price, t.Day, t.Night, t.City, t.TourType, i.Image from tour t join Images i on t.Id = i.TourId where t.Id = $Id and i.Status = 1";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $dsTours[] = new Tour(
                $row["Id"],
                $row["TitleTour"],
                $row["Price"],
                $row["Day"],
                $row["Night"],
                $row["City"],
                $row["TourType"],
                $row["Image"],
                null,
                null,
                null,
                null,
                null
            );
        }
        $conn->close();
        return $dsTours;
    }

    public static function CancelTour($Id, $Status) {
        $conn = DBConnection::Connect();
        $idUserValue = $_COOKIE['IdUser'];
        $sql = "Update tour set Status = $Status, ModifyDate = now(), ModifyBy = $idUserValue where Id = '$Id'";
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }

    public static function InsertTour($Tour, $img, $TourDetail, $TravelPlan, $ImageDetail) {
        $conn = DBConnection::Connect();
        
        // Bắt đầu giao dịch
        $conn->autocommit(false);
    
        try {
            $idUserValue = null;
            if (isset($_COOKIE['IdUser'])) {
                // Lấy giá trị của cookie 'IdUser'
                $idUserValue = $_COOKIE['IdUser'];
            }

            $date = date("Y-m-d H:i:s");

            // Chèn dữ liệu vào bảng 'tour' sử dụng prepared statement
            $stmt = $conn->prepare("INSERT INTO tour (Title, Price, Day, Night, City, TourType, Status, CreateBy, CreateDate) VALUES (?, ?, ?, ?, ?, ?, 1, ?, ?)");
            $stmt->bind_param("siiissis", $Tour['titleTour'], $Tour['price'], $Tour['day'], $Tour['night'], $Tour['city'], $Tour['tourType'], $idUserValue, $date);
            echo $stmt->error;
            $stmt->execute();
            $tourId = $stmt->insert_id;

            // Chèn dữ liệu vào bảng 'tourdetail' sử dụng prepared statement

            $stmt1 = $conn->prepare("INSERT INTO tourdetail (TourId, Name, TitleInfor, DescriptionInfor, TitleTravelPlan, DescriptionTravelPlan, DepartureTime, ReturnTime, Included, Excluded, Transport) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt1->bind_param("issssssssss", $tourId, $TourDetail['Name'], $TourDetail['TitleInfor'], $TourDetail['DestinationInfor'], $TourDetail['TitleTravelPlan'], $TourDetail['DestinationInfor'], $TourDetail['DepartureTime'], $TourDetail['ReturnTime'], $TourDetail['Included'], $TourDetail['Excluded'], $TourDetail['Transport']);
            $stmt1->execute();
            $tourDetailId = $stmt1->insert_id;
            // Chèn dữ liệu vào bảng 'travelplan' cho mỗi mục trong $TravelPlan
            foreach ($TravelPlan as $item) {
                $startTimeString = DateTime::createFromFormat('H:i', $item[1])->format('H:i:s');
                $endTimeString = DateTime::createFromFormat('H:i', $item[2])->format('H:i:s');
                $stmt4 = $conn->prepare("INSERT INTO travelplan (TourDetailId, Title, StartTime, EndTime, Description) VALUES (?, ?, ?, ?, ?)");
                $stmt4->bind_param("iisss", $tourDetailId, $item[0], $startTimeString, $endTimeString, $item[3]);
                $stmt4->execute();
            }
    
            // Chèn dữ liệu vào bảng 'image' cho ảnh tour

            $imageData = is_array($img['img']) ? json_encode($img['img']) : $img['img'];

            $stmt2 = $conn->prepare("INSERT INTO images (TourId, Image, Status) VALUES (?, ?, 1)");
            $stmt2->bind_param("is", $tourId, $imageData);
            $stmt2->execute();
    
            // Chèn dữ liệu vào bảng 'image' cho mỗi mục trong $ImageDetail
            foreach ($ImageDetail as $item) {

                $imageData = is_array($item) ? json_encode($item) : $item;

                $stmt3 = $conn->prepare("INSERT INTO images (TourDetailId, Image, Status) VALUES (?, ?, 1)");
                $stmt3->bind_param("is", $tourDetailId, $imageData);
                $stmt3->execute();
            }
    
            // Commit giao dịch nếu mọi thứ thành công
            $conn->commit();
            $conn->autocommit(true);
            $conn->close();
            return true;
        } catch (Exception $e) {
            // Rollback giao dịch nếu có lỗi
            $conn->rollback();
            $conn->autocommit(true);
            $conn->close();
            return false    ;
        }
    }

    public static function UpdateTour($Tour, $img, $TourDetail, $TravelPlan, $ImageDetail, $TourId, $TourDetailId) {
        $conn = DBConnection::Connect();
    
        // Bắt đầu giao dịch
        $conn->autocommit(false);
    
        try {
            $idUserValue = isset($_COOKIE['IdUser']) ? $_COOKIE['IdUser'] : null;
    
            $date = date("Y-m-d H:i:s");
    
            // Cập nhật thông tin trong bảng 'tour' sử dụng prepared statement
            $stmt = $conn->prepare("UPDATE tour SET Title=?, Price=?, Day=?, Night=?, City=?, TourType=?, Status=1, CreateBy=?, CreateDate=? WHERE Id = ? ");
            $stmt->bind_param("siiissisi", $Tour['titleTour'], $Tour['price'], $Tour['day'], $Tour['night'], $Tour['city'], $Tour['tourType'], $idUserValue, $date, $TourId);
            $stmt->execute();
    
            // Cập nhật thông tin trong bảng 'tourdetail' sử dụng prepared statement
            $stmt1 = $conn->prepare("UPDATE tourdetail SET Name=?, TitleInfor=?, DescriptionInfor=?, TitleTravelPlan=?, DescriptionTravelPlan=?, DepartureTime=?, ReturnTime=?, Included=?, Excluded=?, Transport=? WHERE Id = ?");
            $stmt1->bind_param("ssssssssssi", $TourDetail['Name'], $TourDetail['TitleInfor'], $TourDetail['DestinationInfor'], $TourDetail['TitleTravelPlan'], $TourDetail['DestinationInfor'], $TourDetail['DepartureTime'], $TourDetail['ReturnTime'], $TourDetail['Included'], $TourDetail['Excluded'], $TourDetail['Transport'], $TourDetailId);
            $stmt1->execute();
    
            // Xóa kế hoạch du lịch cũ để cập nhật lại
            $stmt2 = $conn->prepare("DELETE FROM travelplan WHERE TourDetailId=?");
            $stmt2->bind_param("i", $TourDetailId);
            $stmt2->execute();
    
            // Chèn dữ liệu vào bảng 'travelplan' cho mỗi mục trong $TravelPlan
            foreach ($TravelPlan as $item) {
                $startTimeString = DateTime::createFromFormat('H:i', $item[1])->format('H:i:s');
                $endTimeString = DateTime::createFromFormat('H:i', $item[2])->format('H:i:s');
                $stmt4 = $conn->prepare("INSERT INTO travelplan (TourDetailId, Title, StartTime, EndTime, Description) VALUES (?, ?, ?, ?, ?)");
                $stmt4->bind_param("issss", $TourDetailId, $item[0], $startTimeString, $endTimeString, $item[3]);
                $stmt4->execute();
            }
    
            // Xóa hình ảnh cũ của tour để cập nhật lại
            $stmt3 = $conn->prepare("DELETE FROM images WHERE TourId=?");
            $stmt3->bind_param("i", $TourId);
            $stmt3->execute();
    
            // Chèn dữ liệu vào bảng 'image' cho ảnh tour
            $imageData = is_array($img['img']) ? json_encode($img['img']) : $img['img'];
            $stmt5 = $conn->prepare("INSERT INTO images (TourId, Image, Status) VALUES (?, ?, 1)");
            $stmt5->bind_param("is", $TourId, $imageData);
            $stmt5->execute();
    
            // Xóa hình ảnh cũ của chi tiết tour để cập nhật lại
            $stmt6 = $conn->prepare("DELETE FROM images WHERE TourDetailId=?");
            $stmt6->bind_param("i", $TourDetailId);
            $stmt6->execute();
    
            // Chèn dữ liệu vào bảng 'image' cho mỗi mục trong $ImageDetail
            foreach ($ImageDetail as $item) {
                $imageData = is_array($item) ? json_encode($item) : $item;
                $stmt7 = $conn->prepare("INSERT INTO images (TourDetailId, Image, Status) VALUES (?, ?, 1)");
                $stmt7->bind_param("is", $TourDetailId, $imageData);
                $stmt7->execute();
            }
    
            // Commit giao dịch nếu mọi thứ thành công
            $conn->commit();
            $conn->autocommit(true);
            $conn->close();
            return true;
        } catch (Exception $e) {
            // Rollback giao dịch nếu có lỗi
            // $conn->rollback();
            $conn->autocommit(true);
            $conn->close();
            return false;
        }
    }
    
    public static function DeleteTour($Id) {
        $conn = DBConnection::Connect();
        $stmt = null; // Khởi tạo biến $stmt
    
        try {
            // Bắt đầu giao dịch
            $conn->begin_transaction();
    
            // Lấy Id của TourDetail dựa trên TourId sử dụng prepared statement
            $sql = "SELECT Id FROM TourDetail WHERE TourId = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $Id);
            $stmt->execute();
            $result = $stmt->get_result();
    
            // Kiểm tra xem có kết quả hay không
            if ($result && $row = $result->fetch_assoc()) {
                $tourDetailId = $row["Id"];
    
                // Xóa dữ liệu từ bảng books sử dụng prepared statement
                $sql1 = "DELETE FROM books WHERE IdTour = ?";
                $stmt1 = $conn->prepare($sql1);
                $stmt1->bind_param("i", $Id);
                $result1 = $stmt1->execute();
    
                // Xóa dữ liệu từ bảng citytourdestination sử dụng prepared statement
                $sql2 = "DELETE FROM citytourdestination WHERE IdTour = ?";
                $stmt2 = $conn->prepare($sql2);
                $stmt2->bind_param("i", $Id);
                $result2 = $stmt2->execute();
    
                // Xóa dữ liệu từ bảng travelplan sử dụng prepared statement
                $sql3 = "DELETE FROM travelplan WHERE TourDetailId = ?";
                $stmt3 = $conn->prepare($sql3);
                $stmt3->bind_param("i", $tourDetailId);
                $result3 = $stmt3->execute();
    
                // Xóa dữ liệu từ bảng tourdetail sử dụng prepared statement
                $sql4 = "DELETE FROM tourdetail WHERE TourId = ?";
                $stmt4 = $conn->prepare($sql4);
                $stmt4->bind_param("i", $Id);
                $result4 = $stmt4->execute();
    
                // Xóa dữ liệu từ bảng tour sử dụng prepared statement
                $sql5 = "DELETE FROM tour WHERE Id = ?";
                $stmt5 = $conn->prepare($sql5);
                $stmt5->bind_param("i", $Id);
                $result5 = $stmt5->execute();  
    
                // // Kiểm tra kết quả của tất cả các truy vấn
                if ($result1 && $result2 && $result3 && $result4 && $result5) {
                    // Nếu tất cả thành công, commit giao dịch
                    $conn->commit();
                    return true;
                } else {
                    // Nếu có bất kỳ truy vấn nào thất bại, rollback giao dịch
                    $conn->rollback();
                    return false;
                }
            } else {
                // Đóng kết nối và trả về false nếu truy vấn không thành công hoặc không có dữ liệu
                $conn->close();
                return false;
            }
        } catch (Exception $e) {
            // Nếu có lỗi xảy ra, rollback giao dịch
            // $conn->rollback();
            return false;
        } 
        // finally {
        //     // Đóng kết nối và kiểm tra trước khi đóng statement
        //     if ($stmt !== null) {
        //         $stmt->close();
        //     }
        //     $conn->close();
        // }
    }
    
}

?>