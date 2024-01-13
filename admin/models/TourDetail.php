<?php
require_once('../assets/database/ConnectToSql.php');

class TourDetail {
    public $Id;
    public $TourId;
    public $Name;
    public $TitleInfor;
    public $DestinationInfor;
    public $TitleTravelPlan;
    public $DescriptionTravelPlan;
    public $DepartureTime;
    public $ReturnTime;
    public $Included;
    public $Excluded;
    public $Transport;

    public function __construct( $Id ,$tourId, $name, $titleInfor, $destinationInfor, $titleTravelPlan, $descriptionTravelPlan, $departureTime, $returnTime, $included, $excluded, $transport) {
        $this->Id = $Id;
        $this->TourId = $tourId;
        $this->Name = $name;
        $this->TitleInfor = $titleInfor;
        $this->DestinationInfor = $destinationInfor;
        $this->TitleTravelPlan = $titleTravelPlan;
        $this->DescriptionTravelPlan = $descriptionTravelPlan;
        $this->DepartureTime = $departureTime;
        $this->ReturnTime = $returnTime;
        $this->Included = $included;
        $this->Excluded = $excluded;
        $this->Transport = $transport;
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
                $row["Transport"]
            );
        }
        $conn->close();
        return $dsTourDetails;
    }
    
}


?>