<?php
require_once('../assets/database/ConnectToSql.php');

class TravelPlan {
    public $Id;
    public $TourDetailId;
    public $Title;
    public $StartTime;
    public $EndTime;
    public $Description;

    public function __construct( $Id ,$tourDetailId, $title, $startTime, $endTime, $description) {
        $this->Id = $Id;
        $this->TourDetailId = $tourDetailId;
        $this->Title = $title;
        $this->StartTime = $startTime;
        $this->EndTime = $endTime;
        $this->Description = $description;
    }

    public static function GetAll() {
        $dsTravelPlans = array();
        $conn = DBConnection::Connect();

        $sql = "SELECT tp.Id, tp.TourDetailId, tp.Title, tp.StartTime, tp.EndTime, tp.Description from travelplan tp";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $dsTravelPlans[] = new TravelPlan(
                $row["Id"],
                $row["TourDetailId"],
                $row["Title"],
                $row["StartTime"],
                $row["EndTime"],
                $row["Description"]
            );
        }
        $conn->close();
        return $dsTravelPlans;
    }

    public static function GetTravelPlanByTourDetailId($tourDetailId) {
        $dsTravelPlans = array();
        $conn = DBConnection::Connect();

        $sql = "SELECT tp.Id, tp.TourDetailId, tp.Title, tp.StartTime, tp.EndTime, tp.Description from travelplan tp where tp.TourDetailId = $tourDetailId";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $dsTravelPlans[] = new TravelPlan(
                $row["Id"],
                $row["TourDetailId"],
                $row["Title"],
                $row["StartTime"],
                $row["EndTime"],
                $row["Description"]
            );
        }
        $conn->close();
        return $dsTravelPlans;
    }

    public static function GetTravelPlanById($id) {
        $conn = DBConnection::Connect();

        $sql = "SELECT tp.Id, tp.TourDetailId, tp.Title, tp.StartTime, tp.EndTime, tp.Description from travelplan tp where tp.Id = $id";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $travelPlan = new TravelPlan(
                $row["Id"],
                $row["TourDetailId"],
                $row["Title"],
                $row["StartTime"],
                $row["EndTime"],
                $row["Description"]
            );
        }
        $conn->close();
        return $travelPlan;
    }


    public static function InsertTravelPlan($tourDetailId, $title, $startTime, $endTime, $description) {
        $conn = DBConnection::Connect();

        $sql = "INSERT INTO travelplan (TourDetailId, Title, StartTime, EndTime, Description) VALUES ('$tourDetailId', '$title', '$startTime', '$endTime', '$description')";
        $result = $conn->query($sql);

        $conn->close();
        return $result;
    }
    
}

?>