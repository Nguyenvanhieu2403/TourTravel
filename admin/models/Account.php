<?php
require_once('../assets/database/ConnectToSql.php');

class Account {
    public $Id;
    public $FullName;
    public $Email;
    public $PhoneNumber;
    public $Status;
    public $CreateBy;
    public $CreateDate;
    public $ModifyBy;
    public $ModifyDate;

    public function __construct($id, $fullName, $email, $phoneNumber, $status, $modifyBy, $modifyDate , $createBy , $createDate) {
        $this->Id = $id;
        $this->FullName = $fullName;
        $this->Email = $email;
        $this->PhoneNumber = $phoneNumber;
        $this->Status = $status;
        $this->CreateBy = $createBy;
        $this->CreateDate = $createDate;
        $this->ModifyBy = $modifyBy;
        $this->ModifyDate = $modifyDate;
    }

    public static function GetAll() {
        $dsAccounts = array();
        $conn = DBConnection::Connect();

        $sql = "SELECT e.Id, e.FullName, e.Email, e.PhoneNumber, e.Status, e1.FullName as ModifyBy , e.ModifyDate, e.CreateBy, e.CreateDate  FROM employees e left join employees e1 on e.ModifyBy = e1.Id";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $dsAccounts[] = new Account(
                $row["Id"],
                $row["FullName"],
                $row["Email"],
                $row["PhoneNumber"],
                $row["Status"],
                $row["ModifyBy"],
                $row["ModifyDate"],
                $row["CreateBy"],
                $row["CreateDate"]
            );
        }

        $conn->close();
        return $dsAccounts;
    }


    public static function GetAllAccountLock($Status) {
        $dsAccounts = array();
        $conn = DBConnection::Connect();

        $sql = "SELECT e.Id, e.FullName, e.Email, e.PhoneNumber, e.Status, e1.FullName as ModifyBy , e.ModifyDate, e.CreateBy, e.CreateDate  FROM employees e left join employees e1 on e.ModifyBy = e1.Id where e.Status = $Status";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $dsAccounts[] = new Account(
                $row["Id"],
                $row["FullName"],
                $row["Email"],
                $row["PhoneNumber"],
                $row["Status"],
                $row["ModifyBy"],
                $row["ModifyDate"],
                $row["CreateBy"],
                $row["CreateDate"]
            );
        }

        $conn->close();
        return $dsAccounts;
    }
    
    public static function Search($position, $search) {
        $search==null?$search="":$search=$search;
        $dsAccounts = array();
        $conn = DBConnection::Connect();

        $sql = "SELECT e.Id, e.FullName, e.Email, e.PhoneNumber, e.Status, e1.FullName as ModifyBy , e.ModifyDate, e.CreateBy, e.CreateDate  FROM employees e left join employees e1 on e.Id = e1.ModifyBy where e.Position = '$position' and e.FullName like '%$search%'";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $dsAccounts[] = new Account(
                $row["Id"],
                $row["FullName"],
                $row["Email"],
                $row["PhoneNumber"],
                $row["Status"],
                $row["ModifyBy"],
                $row["ModifyDate"],
                $row["CreateBy"],
                $row["CreateDate"]
            );
        }

        $conn->close();
        return $dsAccounts;
    }

    public static function SearchAccountLock( $search) {
        $search==null?$search="":$search=$search;
        $dsAccounts = array();
        $conn = DBConnection::Connect();

        $sql = "SELECT e.Id, e.FullName, e.Email, e.PhoneNumber, e.Status, e1.FullName as ModifyBy , e.ModifyDate, e.CreateBy, e.CreateDate  FROM employees e left join employees e1 on e.Id = e1.ModifyBy where e.Status = 5 and e.FullName like '%$search%'";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $dsAccounts[] = new Account(
                $row["Id"],
                $row["FullName"],
                $row["Email"],
                $row["PhoneNumber"],
                $row["Status"],
                $row["ModifyBy"],
                $row["ModifyDate"],
                $row["CreateBy"],
                $row["CreateDate"]
            );
        }

        $conn->close();
        return $dsAccounts;
    }

    public static function LockAccount($id, $Status, $modifyBy) {
        $conn = DBConnection::Connect();

        $sql = "UPDATE employees SET Status = $Status, ModifyBy = '$modifyBy', ModifyDate = now() WHERE Id = '$id'";
        $result = $conn->query($sql);

        $conn->close();
        return $result;
    }

}
?>
