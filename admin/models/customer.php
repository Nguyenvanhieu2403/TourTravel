<?php
require_once('../assets/database/ConnectToSql.php');

class Customer {

    public $Id;
    public $FullName;
    public $PhoneNumber;
    public $Email;
    public $TicketType;
    public $Adult;
    public $Child;
    public $DateOfDepartment;
    public $Message;
    public $Status;
    public $TourName;
    public $TourType;
    public $DateCreate;
    public $Price;
    public $Description;
    public $Confirm;
    public $DepartureTime;
    public $ReturnTime;

    public function __construct($id, $fullname, $phonenumber, $email, $tickettype, $adult, $child, $dateofdepartment, $message, $status, $tourname, $tourtype, $datecreate, $price, $description, $confirm, $departuretime, $returntime) {
        $this->Id = $id;
        $this->FullName = $fullname;
        $this->PhoneNumber = $phonenumber;
        $this->Email = $email;
        $this->TicketType = $tickettype;
        $this->Adult = $adult;
        $this->Child = $child;
        $this->DateOfDepartment = $dateofdepartment;
        $this->Message = $message;
        $this->Status = $status;
        $this->TourName = $tourname;
        $this->TourType = $tourtype;
        $this->DateCreate = $datecreate;
        $this->Price = $price;
        $this->Description = $description;
        $this->Confirm = $confirm;
        $this->DepartureTime = $departuretime;
        $this->ReturnTime = $returntime;
    }
    
    public static function GetAllWait() {
        $dsCustomers = array();
        $conn = DBConnection::Connect();

        $sql = "SELECT distinct
        u.Id,
        u.FullName,
        u.PhoneNumber,
        u.Email,
        u.TicketType,
        u.Adult,
        u.Child,
        u.DateOfDepartment,
        u.Message,
        b.Status,
        t.TourType,
        t.Price,
        td.Name as TourName,
        td.DescriptionInfor as Description,
        b.CreateDate as DateCreate,
        b.Confirm,
        td.DepartureTime,
        td.ReturnTime
        FROM
          books b
        JOIN
          users u ON b.IdUser = u.Id
        JOIN
          tourdetail td ON b.IdTour = td.TourId
        JOIN
          tour t ON td.TourId = t.Id where b.Status=1
        ORDER BY
          b.CreateDate ASC";
        $result = $conn->query($sql);

        while($row = $result->fetch_assoc()) {
            $dsCustomers[] = new Customer(
                $row['Id'],
                $row['FullName'],
                $row['PhoneNumber'],
                $row['Email'],
                $row['TourType'],
                $row['Adult'],
                $row['Child'],
                $row['DateOfDepartment'],
                $row['Message'],
                $row['Status'],
                $row['TourName'],
                $row['TourType'],
                $row['DateCreate'],
                $row['Price'],
                $row['Description'],
                $row['Confirm'],
                $row['DepartureTime'],
                $row['ReturnTime']
            );
        }

        $conn->close();
        return $dsCustomers;
    }

    public static function Search($search ,$status, $not) {
      $dsCustomers = array();
      $conn = DBConnection::Connect();

      $sql = "SELECT distinct
        t.Id,
        u.FullName,
        u.PhoneNumber,
        u.Email,
        u.TicketType,
        u.Adult,
        u.Child,
        u.DateOfDepartment,
        u.Message,
        b.Status,
        t.TourType,
        t.Price,
        td.Name as TourName,
        td.DescriptionInfor as Description,
        b.CreateDate as DateCreate,
        b.Confirm,
        td.DepartureTime,
        td.ReturnTime
      FROM
          books b
      JOIN
          users u ON b.IdUser = u.Id
      JOIN
          tourdetail td ON b.IdTour = td.TourId
      JOIN
          tour t ON td.TourId = t.Id
      WHERE
          b.Status = $status
          AND (
              u.FullName LIKE '%$search%'
              OR td.Name LIKE '%$search%'
              OR t.TourType LIKE '%$search%'
              OR b.CreateDate LIKE '%$search%'
          )
          AND (NOW() $not BETWEEN td.DepartureTime AND td.ReturnTime)";
      $result = $conn->query($sql);
        
      while($row = $result->fetch_assoc()) {
        $dsCustomers[] = new Customer(
            $row['Id'],
            $row['FullName'],
            $row['PhoneNumber'],
            $row['Email'],
            $row['TourType'],
            $row['Adult'],
            $row['Child'],
            $row['DateOfDepartment'],
            $row['Message'],
            $row['Status'],
            $row['TourName'],
            $row['TourType'],
            $row['DateCreate'],
            $row['Price'],
            $row['Description'],
            $row['Confirm'],
            $row['DepartureTime'],
            $row['ReturnTime']
        );
    }

    $conn->close();
    return $dsCustomers;
    }

    public static function GetAllConfirm() {
      $dsCustomers = array();
      $conn = DBConnection::Connect();

      $sql = "SELECT distinct
      u.*, 
      t.TourType,
      t.Price,
      td.Name as TourName,
      td.DescriptionInfor as Description,
      b.CreateDate as DateCreate,
      td.DepartureTime,
      td.ReturnTime,
      b.Confirm,
      td.DepartureTime,
      td.ReturnTime
      FROM
        books b
      JOIN
        users u ON b.IdUser = u.Id
      JOIN
        tourdetail td ON b.IdTour = td.TourId
      JOIN
        tour t ON td.TourId = t.Id where b.Status=2
      and (NOW() NOT BETWEEN td.DepartureTime AND td.ReturnTime)
      ORDER BY
        b.CreateDate ASC";
      $result = $conn->query($sql);
      while($row = $result->fetch_assoc()) {
          $dsCustomers[] = new Customer(
              $row['Id'],
              $row['FullName'],
              $row['PhoneNumber'],
              $row['Email'],
              $row['TourType'],
              $row['Adult'],
              $row['Child'],
              $row['DateOfDepartment'],
              $row['Message'],
              $row['Status'],
              $row['TourName'],
              $row['TourType'],
              $row['DateCreate'],
              $row['Price'],
              $row['Description'],
              $row['Confirm'],
              $row['DepartureTime'],
              $row['ReturnTime']
          );
      }

      $conn->close();
      return $dsCustomers;
    }

    public static function GetAllTraveling() {
      $dsCustomers = array();
      $conn = DBConnection::Connect();

      $sql = "SELECT distinct
      u.*,
      t.TourType,
      t.Price,
      td.Name as TourName,
      td.DescriptionInfor as Description,
      b.CreateDate as DateCreate,
      td.DepartureTime,
      td.ReturnTime,
      b.Confirm,
      td.DepartureTime,
      td.ReturnTime
      FROM
        books b
      JOIN
        users u ON b.IdUser = u.Id
      JOIN
        tourdetail td ON b.IdTour = td.TourId
      JOIN
        tour t ON td.TourId = t.Id where b.Status=2
      and (NOW() BETWEEN td.DepartureTime AND td.ReturnTime)
      ORDER BY
        b.CreateDate ASC";
      $result = $conn->query($sql);

      while($row = $result->fetch_assoc()) {
          $dsCustomers[] = new Customer(
              $row['Id'],
              $row['FullName'],
              $row['PhoneNumber'],
              $row['Email'],
              $row['TourType'],
              $row['Adult'],
              $row['Child'],
              $row['DateOfDepartment'],
              $row['Message'],
              $row['Status'],
              $row['TourName'],
              $row['TourType'],
              $row['DateCreate'],
              $row['Price'],
              $row['Description'],
              $row['Confirm'],
              $row['DepartureTime'],
              $row['ReturnTime']
          );
      }

      $conn->close();
      return $dsCustomers;
    }

    public static function GetAllCancel() {
      $dsCustomers = array();
      $conn = DBConnection::Connect();

      $sql = "SELECT distinct
      u.*,
      t.TourType,
      t.Price,
      td.Name as TourName,
      td.DescriptionInfor as Description,
      b.CreateDate as DateCreate,
      td.DepartureTime,
      td.ReturnTime,
      b.Confirm,
      td.DepartureTime,
      td.ReturnTime
      FROM
        books b
      JOIN
        users u ON b.IdUser = u.Id
      JOIN
        tourdetail td ON b.IdTour = td.TourId
      JOIN
        tour t ON td.TourId = t.Id where b.Status=0
      ORDER BY
        b.CreateDate ASC";
      $result = $conn->query($sql);

      while($row = $result->fetch_assoc()) {
          $dsCustomers[] = new Customer(
              $row['Id'],
              $row['FullName'],
              $row['PhoneNumber'],
              $row['Email'],
              $row['TourType'],
              $row['Adult'],
              $row['Child'],
              $row['DateOfDepartment'],
              $row['Message'],
              $row['Status'],
              $row['TourName'],
              $row['TourType'],
              $row['DateCreate'],
              $row['Price'],
              $row['Description'],
              $row['Confirm'],
              $row['DepartureTime'],
              $row['ReturnTime']
          );
      }

      $conn->close();
      return $dsCustomers;
    }

    public static function GetAllTraveled() {
      $dsCustomers = array();
      $conn = DBConnection::Connect();

      $sql = "SELECT distinct
      u.*,
      t.TourType,
      t.Price,
      td.Name as TourName,
      td.DescriptionInfor as Description,
      b.CreateDate as DateCreate,
      td.DepartureTime,
      td.ReturnTime,
      b.Confirm,
      td.DepartureTime,
      td.ReturnTime
      FROM
        books b
      JOIN
        users u ON b.IdUser = u.Id
      JOIN
        tourdetail td ON b.IdTour = td.TourId
      JOIN
        tour t ON td.TourId = t.Id where b.Status=2
      and (NOW() > td.ReturnTime)
      ORDER BY
        b.CreateDate ASC";
      $result = $conn->query($sql);

      while($row = $result->fetch_assoc()) {
          $dsCustomers[] = new Customer(
              $row['Id'],
              $row['FullName'],
              $row['PhoneNumber'],
              $row['Email'],
              $row['TourType'],
              $row['Adult'],
              $row['Child'],
              $row['DateOfDepartment'],
              $row['Message'],
              $row['Status'],
              $row['TourName'],
              $row['TourType'],
              $row['DateCreate'],
              $row['Price'],
              $row['Description'],
              $row['Confirm'],
              $row['DepartureTime'],
              $row['ReturnTime']
          );
      }

      $conn->close();
      return $dsCustomers;
    }
}

?>