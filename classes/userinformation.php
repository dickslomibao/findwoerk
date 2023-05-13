<?php 
    require_once 'db_config.php';

    class User extends DB{
        private $id;
        private $firstname;
        private $lastname;
        private $birthdate;
        private $sex;
        private $address;

        public function setID($id){
            $this->id= $id;
        }
        public function setFirstName($firstname){
            $this->firstname = $firstname;
        }
        public function setLastname($lastname){
            $this->lastname = $lastname;
        }
        public function setBirthdate($birthdate){
            $this->birthdate = $birthdate;
        }
        public function setSex($sex){
            $this->sex = $sex;
        }
        public function setAddress($address){
            $this->address = $address;
        }
        public function insert(){
            $sql = "INSERT INTO `userinfo`(`id`, `firstname`, `lastname`, `birthdate`, `sex`, `address`) VALUES (?,?,?,?,?,?)";
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->execute([
                $this->id,
                $this->firstname,
                $this->lastname,
                $this->birthdate,
                $this->sex,
                $this->address
            ]);
        }
    }

?>