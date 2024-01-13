<?php
require_once('../assets/database/ConnectToSql.php');

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

    public static function GetAll() {
        $dsTours = array();
        $conn = DBConnection::Connect();

        $sql = "SELECT t.Id, t.Title as TitleTour, t.Price, t.Day, t.Night, t.City, t.TourType, t.Status, e.FullName as CreateBy, t.CreateDate from tour t left join employees e on t.CreateBy = e.Id";
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

    public static function Search($name, $tourType) {
        $dsTours = array();
        $conn = DBConnection::Connect();
        $sql = "SELECT t.Id, t.Title as TitleTour, t.Price, t.Day, t.Night, t.City, t.TourType, t.Status, e.FullName as CreateBy, t.CreateDate from tour t left join employees e on t.CreateBy = e.Id";

        if ($name != null || $tourType != null) {
            $sql .= " WHERE";
        }

        if ($name != null) {
            $sql .= " t.Title LIKE N'%" . $name . "%'";
        }

        if ($name != null && $tourType != null) {
            $sql .= " AND";
        }

        if ($tourType != null) {
            $sql .= " t.TourType = '$tourType'";
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

    public static function DeleteTour($Id) {
        $conn = DBConnection::Connect();
        $sql = "Update tour set Status = 0 where Id = '$Id'";
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }

    public static function InsertTour($Tour, $TourDetail, $TravelPlan, $Image, $City) {
        $conn = DBConnection::Connect();
        $conn->autocommit(false);
        $sql = "INSERT INTO tour (Title, Price, Day, Night, City, TourType, Status, CreateBy, CreateDate) VALUES ('$Tour->TitleTour', '$Tour->Price', '$Tour->Day', '$Tour->Night', '$Tour->City', '$Tour->TourType', 1, '$Tour->CreateBy', '$Tour->CreateDate')";
        $result = $conn->query($sql);
        $tourId = $conn->insert_id;
        $sql = "INSERT INTO tourdetail (TourId, Name, TitleInfor, DestinationInfor, TitleTravelPlan, DescriptionTravelPlan, DepartureTime, ReturnTime, Included, Excluded, Transport) VALUES ('$tourId', '$TourDetail->Name', '$TourDetail->TitleInfor', '$TourDetail->DestinationInfor', '$TourDetail->TitleTravelPlan', '$TourDetail->DescriptionTravelPlan', '$TourDetail->DepartureTime', '$TourDetail->ReturnTime', '$TourDetail->Included', '$TourDetail->Excluded', '$TourDetail->Transport')";
        $result = $conn->query($sql);
        $sql = "INSERT INTO travelplan (TourId, Day, Title, Description) VALUES ('$tourId', '$TravelPlan->Day', '$TravelPlan->Title', '$TravelPlan->Description')";
        $result = $conn->query($sql);
        $sql = "INSERT INTO images (TourId, Image) VALUES ('$tourId', '$Image->Image')";
        $result = $conn->query($sql);
        $sql = "INSERT INTO city (TourId, City) VALUES ('$tourId', '$City->City')";
        $result = $conn->query($sql);
        $conn->commit();
        $conn->close();
        return $result;
    }
}

?>