<?php
require_once('../assets/database/ConnectToSql.php');

class TourDetail {
    public $Id;
    public $TourId;
    public $Name;
    public $TitleInfor;
    public $DescriptionInfo;
    public $TitleTravelPlan;
    public $DescriptionTravelPlan;
    public $DepartureTime;
    public $ReturnTime;
    public $Included;
    public $Excluded;
    public $Transport;
    public $Image;

    public function __construct( $Id ,$tourId, $name, $titleInfor, $descriptionInfo, $titleTravelPlan, $descriptionTravelPlan, $departureTime, $returnTime, $included, $excluded, $transport, $image) {
        $this->Id = $Id;
        $this->TourId = $tourId;
        $this->Name = $name;
        $this->TitleInfor = $titleInfor;
        $this->DescriptionInfo = $descriptionInfo;
        $this->TitleTravelPlan = $titleTravelPlan;
        $this->DescriptionTravelPlan = $descriptionTravelPlan;
        $this->DepartureTime = $departureTime;
        $this->ReturnTime = $returnTime;
        $this->Included = $included;
        $this->Excluded = $excluded;
        $this->Transport = $transport;
        $this->Image = $image;
    }

    public static function GetAll() {
        $dsTourDetails = array();
        $conn = DBConnection::Connect();

        $sql = "SELECT td.Id, td.TourId, td.Name, td.TitleInfor, td.DestinationInfor, td.TitleTravelPlan, td.DescriptionTravelPlan, td.DepartureTime, td.ReturnTime, td.Included, td.Excluded, td.Transport from tourdetail td";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $dsTourDetails[] = new TourDetail(
                $row["Id"],
                $row["TourId"],
                $row["Name"],
                $row["TitleInfor"],
                $row["DestinationInfor"],
                $row["TitleTravelPlan"],
                $row["DescriptionTravelPlan"],
                $row["DepartureTime"],
                $row["ReturnTime"],
                $row["Included"],
                $row["Excluded"],
                $row["Transport"],
                null
            );
        }
        $conn->close();
        return $dsTourDetails;
    }

    public static function GetTourDetailByTourId($id) {
        $conn = DBConnection::Connect();
        $dsTourDetails = array();
        $sql = "SELECT td.Id, td.TourId, td.Name, td.TitleInfor, td.DescriptionInfor, td.TitleTravelPlan, td.DescriptionTravelPlan, td.DepartureTime, td.ReturnTime, td.Included, td.Excluded, td.Transport, i.Image from tourdetail td join Images i on td.Id = i.TourDetailId where td.TourId = $id and i.Status = 1 limit    1";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $dsTourDetails[] = new TourDetail(
                $row["Id"],
                $row["TourId"],
                $row["Name"],
                $row["TitleInfor"],
                $row["DescriptionInfor"],
                $row["TitleTravelPlan"],
                $row["DescriptionTravelPlan"],
                $row["DepartureTime"],
                $row["ReturnTime"],
                $row["Included"],
                $row["Excluded"],
                $row["Transport"],
                $row["Image"]
            );
        }
        $conn->close();
        return $dsTourDetails;
    }
    
}


?>