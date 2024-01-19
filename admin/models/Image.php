<?php
require_once('../assets/database/ConnectToSql.php');

class Image {
    public $Id;
    public $DestinationId;
    public $DestinationDetailId;
    public $TourId;
    public $TourDetailId;
    public $BlogsId;
    public $BlogDetailId;
    public $Image;
    public $Status;

    public function __construct( $Id ,$destinationId, $destinationDetailId, $tourId, $tourDetailId, $blogsId, $blogDetailId, $image, $status) {
        $this->Id = $Id;
        $this->DestinationId = $destinationId;
        $this->DestinationDetailId = $destinationDetailId;
        $this->TourId = $tourId;
        $this->TourDetailId = $tourDetailId;
        $this->BlogsId = $blogsId;
        $this->BlogDetailId = $blogDetailId;
        $this->Image = $image;
        $this->Status = $status;
    }

    public static function InsertTourImage($tourId, $image) {
        $conn = DBConnection::Connect();

        $sql = "INSERT INTO image (TourId, Image, Status) VALUES ('$tourId', '$image', 1)";
        $result = $conn->query($sql);

        $conn->close();
        return $result;
    }
}

?>