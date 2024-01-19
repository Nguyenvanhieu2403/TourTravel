<?php 
    include 'connection.php';
    abstract class Person{
        public $id;
        public $name;
        public $dob;
        public $sex;
    }
    class Employee extends Person{
        public $position;
        public $phoneNumber;
        public $email;
        public $address;
        public $status;
        public $password;
        public $department;

        function __construct($name='',$phoneNumber = '',$email='',$dob='',$password=''){
            $this->name = $name;
            $this->dob = $dob;
            $this->phoneNumber = $phoneNumber;
            $this->email = $email;
            $this->password = $password;
        }
        function __destruct(){

        }
        function get_id(){
            return $this->id;
        }
        function get_name(){
            return $this->name;
        }
        function set_name($name){
            return $this->name=$name;
        }
        function get_dob(){
            return $this->dob;
        }
        function set_dob($dob){
            return $this->dob = $dob;
        }
        function get_sex(){
            return $this->sex;
        }
        function set_sex($sex){
            return $this->sex = $sex;
        }
        function get_position(){
            return $this->position;
        }
        function set_position($position){
            return $this->position = $position;
        }
        function get_phoneNumber(){
            return $this->phoneNumber;
        }
        function set_phoneNumber($phoneNumber){
            return $this->phoneNumber = $phoneNumber;
        }
        function get_email(){
            return $this->email;
        }
        function set_email($email){
            return $this->email=$email;
        }
        function get_address(){
            return $this->address;
        }
        function set_address($address){
            return $this->address = $address;
        }
        function get_status(){
            return $this->status;
        }
        function set_status($status){
            return $this->status=$status;
        }
        function get_password(){
            return $this->password;
        }
        function set_password($password){
            return $this->password=$password;
        }
        function get_department(){
            return $this->department;
        }
        function set_department($department){
            return $this->department=$department;
        }

        public static function getEmployeesWithoutDept(){
            $listEmloyee = array();
            $conn = DbConnection::Connect();
            $sql = 'select Id, FullName , PhoneNumber,Email from employees where idDepartment is NULL and status = ?';
            $stmt = $conn->prepare($sql);
            $status = 0;
            $stmt->bind_param('i',$status);

            if($stmt->execute()){
                $result = $stmt->get_result();
                while($row = $result->fetch_assoc()){
                    $employee = new Employee(
                        $row['FullName'],
                        $row['PhoneNumber'],
                        $row['Email']
                    );
                    $employee->id = $row['Id'];
                    $listEmloyee[] = $employee;
                }
                $stmt->close();
            }
            else{
                echo "Error: ". $stmt->error;
            }
            $conn->close();
            return $listEmloyee;
        }

        public static function getEmployeeInDepartment($idDepartment){
            $listEmloyee = array();
            $conn = DbConnection::Connect();
            $sql = 'select Id, FullName , PhoneNumber,Email from employees where idDepartment = ? and status = ?';
            $stmt = $conn->prepare($sql);
            $status = 1;
            $stmt->bind_param('ii',$idDepartment,$status);

            if($stmt->execute()){
                $result = $stmt->get_result();
                while($row = $result->fetch_assoc()){
                    $employee = new Employee(
                        $row['FullName'],
                        $row['PhoneNumber'],
                        $row['Email']
                    );
                    $employee->id = $row['Id'];
                    
                    // $employee->status = $row['Status'];
                    $listEmloyee[] = $employee;
                }
                $stmt->close();
            }
            else{
                echo "Error: ". $stmt->error;
            }
            $conn->close();
            return $listEmloyee;
        }

        public static function getEmployeeById($idEmployee){
            $conn = DbConnection::Connect();
            $sql = 'SELECT e.*, d.name AS nameDepartment
                    FROM employees e
                    LEFT JOIN departments d ON e.idDepartment = d.id
                    WHERE e.id = ?';
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('i',$idEmployee);

            $employee = null;
            if($stmt->execute()){
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();

                $employee = new Employee(
                    $row['FullName'],
                    $row['PhoneNumber'],
                    $row['Email'],
                    $row['DOB']
                );
                $employee->id = $row['Id'];
                $employee->position = $row['Position'];
                $employee->sex = $row['Sex'];
                $employee->status = $row['Status'];
                $employee->address = $row['Address'];
                $employee->department = $row['nameDepartment'];
                
                $stmt->close();
            }
            else{
                echo "Error: ". $stmt->error;
            }
            $conn->close();
            return $employee;
        }
        
        // Search employee without dept
        public static function searchEmployeeWithouDept($nameEmployee){
            $conn = DbConnection::Connect();
            $sql = "SELECT * FROM employees WHERE FullName LIKE ? and  idDepartment is NULL and Status = ?";
            $stmt = $conn->prepare($sql);
            $searchName = "%" . $nameEmployee . "%";
            $status = 0;
            $stmt->bind_param("si", $searchName,$status);
            $listEmployee = array();

            if($stmt->execute()){
                $result = $stmt->get_result();
                if(mysqli_num_rows($result) > 0) {
                    while($row = $result->fetch_assoc()){
                        $employee = new Employee(
                            $row['FullName'],
                            $row['PhoneNumber'],
                            $row['Email']
                        );
                        $employee->id = $row['Id'];
                        // $employee->status = $row['Status'];
                        $listEmployee[] = $employee;
                    }
                }
                else{
                    echo "Không tìm thấy nhân viên trên";
                }
                $stmt->close();
            }
            else {
                echo "Error executing the query: " . $stmt->error;
            }
            $conn->close();
            return $listEmployee;
        }

        // Search employee without dept
        public static function searchEmployeeWithDept($nameEmployee){
            $conn = DbConnection::Connect();
            $sql = "SELECT * FROM employees WHERE FullName LIKE ? and  idDepartment is not NULL and Status = ?";
            $stmt = $conn->prepare($sql);
            $searchName = "%" . $nameEmployee . "%";
            $status = 1;
            $stmt->bind_param("si", $searchName,$status);
            $listEmployee = array();

            if($stmt->execute()){
                $result = $stmt->get_result();
                if(mysqli_num_rows($result) > 0) {
                    while($row = $result->fetch_assoc()){
                        $employee = new Employee(
                            $row['FullName'],
                            $row['PhoneNumber'],
                            $row['Email']
                        );
                        $employee->id = $row['Id'];
                        // $employee->status = $row['Status'];
                        $listEmployee[] = $employee;
                    }
                }
                else{
                    echo "Không tìm thấy nhân viên trên";
                }
                $stmt->close();
            }
            else {
                echo "Error executing the query: " . $stmt->error;
            }
            $conn->close();
            return $listEmployee;
        }

        // Count employee
        public static function totalEmployee($listEmployee){
            return count($listEmployee);
        }
        public static function confirmEmployee($idEmployee,$idDepartment){
            $conn = DbConnection::Connect();
            $sql = "UPDATE EMPLOYEES SET Status = 1, idDepartment = ? WHERE Id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ii', $idDepartment, $idEmployee);
            $stmt->execute();
            
            $affectedRows = $stmt->affected_rows;
            if($affectedRows >0){
                return true;
            }
            else{
                return false;
            }
        }

        public static function updateEmployee($idEmployee,$position){
            $conn = DbConnection::Connect();
            $sql = "UPDATE EMPLOYEES SET Position = ? WHERE Id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('si',$position,$idEmployee);
            $stmt->execute();
            
            $affectedRows = $stmt->affected_rows;
            if($affectedRows >0){
                return true;
            }
            else{
                return false;
            }
        }
        public static function deleteEmployee($idEmployee){
            $conn = DbConnection::Connect();
            $sql = "UPDATE EMPLOYEES SET Status = 0, idDepartment = NULL WHERE Id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('i', $idEmployee);
            $stmt->execute();
            
            $affectedRows = $stmt->affected_rows;
            if($affectedRows >0){
                return true;
            }
            else{
                return false;
            }
        }
    } 
?>