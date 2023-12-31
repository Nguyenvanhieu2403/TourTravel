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

        public static function getEmployee($idEmployee){
            $conn = DbConnection::Connect();
            $sql = 'select * from employees where id = ?';
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
               
                $stmt->close();
            }
            else{
                echo "Error: ". $stmt->error;
            }
            $conn->close();
            return $employee;
        }
    } 
    
?>