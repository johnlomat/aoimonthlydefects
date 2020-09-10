<?php
    class headerConfig {
        private $title;
        private $style1;
        private $style2;

        public function __construct() {
            $get_arguments       = func_get_args();
            $number_of_arguments = func_num_args();
    
            if (method_exists($this, $method_name = '__construct'.$number_of_arguments)) {
                call_user_func_array(array($this, $method_name), $get_arguments);
            }
        }
        public function __construct1($title) {
            $this->title = $title;
        }
        public function __construct2($style1, $style2) {
            $this->style1 = $style1;
            $this->style2 = $style2;
        }
        public function Title() {
            return $this->title;
        }
        public function Style1() {
            return HOST_URL.'/'.$this->style1;
        }
        public function Style2() {
            return HOST_URL.'/'.$this->style2;
        }
    }

    class user {
        public $user;

        public function __construct() {
            $get_arguments       = func_get_args();
            $number_of_arguments = func_num_args();
    
            if (method_exists($this, $method_name = '__construct'.$number_of_arguments)) {
                call_user_func_array(array($this, $method_name), $get_arguments);
            }
        }
        public function __construct1($user) {
            $this->user = $user;
        }
        public function User() {
            $connect = new PDO("mysql:host=localhost;dbname=aoi_monthly_defects","root","root");
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $statement = $connect->prepare("SELECT * FROM user WHERE email = :email");
            $statement->bindValue(':email',$this->user);
            $statement->execute();
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            return $row['firstname'] . ' ' . $row['lastname'];
        }
        public function Firstname() {
            $connect = new PDO("mysql:host=localhost;dbname=aoi_monthly_defects","root","root");
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $statement = $connect->prepare("SELECT * FROM user WHERE email = :email");
            $statement->bindValue(':email',$this->user);
            $statement->execute();
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            return $row['firstname'];
        }
        public function Lastname() {
            $connect = new PDO("mysql:host=localhost;dbname=aoi_monthly_defects","root","root");
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $statement = $connect->prepare("SELECT * FROM user WHERE email = :email");
            $statement->bindValue(':email',$this->user);
            $statement->execute();
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            return $row['lastname'];
        }
    }

    class diskStatus {
        public $byte;
        public $disk_total;
        public $disk_free;

        public function __construct() {
            $get_arguments       = func_get_args();
            $number_of_arguments = func_num_args();
    
            if (method_exists($this, $method_name = '__construct'.$number_of_arguments)) {
                call_user_func_array(array($this, $method_name), $get_arguments);
            }
        }
        public function __construct1($byte) {
            $this->byte = $byte;
        }
        public function __construct2($disk_total, $disk_free) {
            $this->disk_total = $disk_total;
            $this->disk_free = $disk_free;
        }
        public function DiskSize() {
            $type=array("", "KB", "MB", "GB", "TB");
            $i=0;
            while($this->byte>=1024) {
                $this->byte/=1024;
                $i++;
            }
            return round($this->byte, 2)." ".$type[$i];
        }
        public function DiskUsed() {
            $disk_used = $this->disk_total - $this->disk_free;
            return sprintf('%.2f',($disk_used / $this->disk_total) * 100);
        }
    }
?>