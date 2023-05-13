<?php 
    require_once 'db_config.php';

    class AccountInfo extends DB{

        private $id;
        private $ownerid;
        private $username;
        private $password;
        private $email;
        private $type;
        private $profilepic;

        public function setId($id){
            $this->id = $id;
        }
        public function setOwnerid($ownerid){
            $this->ownerid = $ownerid;
        }
        public function setUsername($username){
            $this->username = $username;
        }
        public function setPassword($password){
            $this->password = $password;
        }
        public function setEmail($email){
            $this->email = $email;
        }
        public function setType($type){
            $this->type = $type;
        }
        public function setProfilepic($data){
            $this->profilepic = $data;
        }
        public function insert(){
            $sql = "INSERT INTO `accountinfo`(`owner_id`, `username`, `password`, `email`, `type`,`profile_pic`) VALUES (?,?,?,?,?,?)";
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->execute([
                $this->ownerid,
                $this->username,
                $this->password,
                $this->email,
                $this->type,
                $this->profilepic,
            ]);
        }

        public function login(){
            $sql = "SELECT * FROM `accountinfo` WHERE `username` = ? AND `password` = ?";
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->execute([
                $this->username,
                $this->password,
            ]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getImportantInfo($data){
            $sql = "SELECT userinfo.id, concat(userinfo.firstname , ' ', userinfo.lastname) as fullname, accountinfo.profile_pic,accountinfo.user_status FROM userinfo,accountinfo WHERE accountinfo.owner_id = userinfo.id and userinfo.id = ?";
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->execute([
                    $data
            ]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function updateStatus(){
           $sql = "UPDATE `accountinfo` SET `user_status`=? where owner_id = ?";
           $stmt = $this->getConnection()->prepare($sql);
            $stmt->execute([
                  date("Y-m-d H:i:s"),
                  $_SESSION['ownerid'],
            ]);
        }
    }
