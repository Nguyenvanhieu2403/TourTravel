<?php
require_once('../assets/database/ConnectToSql.php');

class Account {
    public $Id;
    public $FullName;
    public $DOB;
    public $Sex;
    public $Position;
    public $Department;
    public $Password;
    public $Email;
    public $PhoneNumber;
    public $Status;
    public $CreateBy;
    public $CreateDate;
    public $ModifyBy;
    public $ModifyDate;

    public function __construct($id, $fullName, $email, $phoneNumber, $status, $modifyBy, $modifyDate , $createBy , $createDate, $dob, $sex, $position, $Department, $password) {
        $this->Id = $id;
        $this->FullName = $fullName;
        $this->Email = $email;
        $this->PhoneNumber = $phoneNumber;
        $this->Status = $status;
        $this->CreateBy = $createBy;
        $this->CreateDate = $createDate;
        $this->ModifyBy = $modifyBy;
        $this->ModifyDate = $modifyDate;
        $this->DOB = $dob;
        $this->Sex = $sex;
        $this->Position = $position;
        $this->Department = $Department;
        $this->Password = $password;

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
                null, // ModifyBy
                null, // ModifyDate
                null, // CreateBy
                $row["CreateDate"], // CreateDate
                null, // Department
                null, // Password
                null,
                null, // DOB
                null, // Sex
            
            );
        }

        $conn->close();
        return $dsAccounts;
    }


    public static function GetAllAccountLock($Status) {
        $dsAccounts = array();
        $conn = DBConnection::Connect();

        $sql = "SELECT e.Id, e.FullName, e.Email, e.PhoneNumber, e.Status, e1.FullName as ModifyBy , e.ModifyDate, e.CreateBy, e.CreateDate   FROM employees e left join employees e1 on e.ModifyBy = e1.Id where e.Status = $Status";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $dsAccounts[] = new Account(
                $row["Id"],
                $row["FullName"],
                $row["Email"],
                $row["PhoneNumber"],
                $row["Status"],
                null, // ModifyBy
                null, // ModifyDate
                null, // CreateBy
                $row["CreateDate"], // CreateDate
                null, // Department
                null, // Password
                null,
                null, // DOB
                null, // Sex
            );
        }

        $conn->close();
        return $dsAccounts;
    }
    
    public static function Search($position, $search) {
        $dsAccounts = array();
        $conn = DBConnection::Connect();
        $sql = "SELECT distinct e.Id, e.FullName, e.Email, e.PhoneNumber, e.Status,  e.CreateDate  FROM employees e left join employees e1 on e.Id = e1.ModifyBy ";
        if($position != null || $search != null){
            $sql .= " where ";
        }
        if($position == null && $search != null){
            $sql .= " e.FullName like '%$search%'";
        }
        if($search == null && $position != null){
            $sql .= " e.Position = '$position'";
        }
        if($search != null && $position != null){
            $sql .= " e.Position = '$position' and e.FullName like '%$search%'";
        }
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $dsAccounts[] = new Account(
                $row["Id"],
                $row["FullName"],
                $row["Email"],
                $row["PhoneNumber"],
                $row["Status"],
                null, // ModifyBy
                null, // ModifyDate
                null, // CreateBy
                $row["CreateDate"], // CreateDate
                null, // Department
                null, // Password
                null,
                null, // DOB
                null, // Sex
            );
        }

        $conn->close();
        return $dsAccounts;
    }

    public static function SearchAccountLock($search) {
        $dsAccounts = array();
        $conn = DBConnection::Connect();

        $sql = "SELECT e.Id, e.FullName, e.Email, e.PhoneNumber, e.Status, e1.FullName as ModifyBy , e.ModifyDate, e.CreateBy, e.CreateDate FROM employees e left join employees e1 on e.Id = e1.ModifyBy where e.Status = 5 ";
        
        if($search != null){
            $sql .= " and e.FullName like '%$search%'";
        }

        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $dsAccounts[] = new Account(
                $row["Id"],
                $row["FullName"],
                $row["Email"],
                $row["PhoneNumber"],
                $row["Status"],
                null, // ModifyBy
                null, // ModifyDate
                null, // CreateBy
                $row["CreateDate"], // CreateDate
                null, // Department
                null, // Password
                $row["Position"],
                null, // DOB
                null, // Sex
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

    public static function GetInforAccount($id) {
        $conn = DBConnection::Connect();
        $sql = "SELECT e.Id, e.FullName, e.DOB, e.Sex, e.Position , d.Name ,e.Email, e.PhoneNumber  FROM employees e left join departments d on e.IdDepartment = d.Id where e.Id = '$id'";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $InforAccount = new Account(
                $row["Id"],
                $row["FullName"],
                $row["Email"],
                $row["PhoneNumber"],
                $row["Status"] = null,
                $row["ModifyBy"] = null,
                $row["ModifyDate"] = null,
                $row["CreateBy"] = null,
                $row["CreateDate"] = null,
                $row["DOB"],
                $row["Sex"],
                $row["Position"],
                $row["Name"],
                null
            );
        }
        $conn->close();
        return $InforAccount;
    }

    public static function GrantPermissions($id, $position, $modifyBy) {
        $conn = DBConnection::Connect();

        $sql = "UPDATE employees SET Position = '$position', ModifyBy = '$modifyBy', ModifyDate = now() WHERE Id = '$id'";
        $result = $conn->query($sql);

        $conn->close();
        return $result;
    }

}
?>
